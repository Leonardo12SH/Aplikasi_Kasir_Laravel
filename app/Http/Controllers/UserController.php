<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $user = Login::where('username', $username)->first(); // Menggunakan model Login

        if ($user && password_verify($password, $user->password)) {
            // Tambahkan informasi role ke session
            Session::put('userid', $user->userid);
            Session::put('username', $user->username);
            Session::put('role', $user->role);

            // Kirim respon JSON sesuai dengan role
            if ($user->role == 'pimpinan') {
                return response()->json('pimpinan');
            } elseif ($user->role == 'karyawan') {
                return response()->json('karyawan');
            }
        }

        // Kirim respon kegagalan jika login gagal
        return response()->json(['success' => false]);
    }

    public function logout()
    {
        Auth::logout();
        Session::flush(); // Menghapus semua data dari session
        return redirect()->route('index');
    }

    public function updateProfile(Request $request)
    {
        if (!$request->session()->has('userid')) {
            return redirect()->route('index');
        }

        $uid = $request->session()->get('userid');
        $dataLogin = Login::where('userid', $uid)->first();
        $username = $dataLogin->username;
        $alamat = $dataLogin->alamat;
        $telepon = $dataLogin->telepon;
        $toko = $dataLogin->toko;


        if (!$dataLogin) {
            return redirect()->route('index');
        }


        if ($request->has('SimpanEdit')) {
            $uname = htmlspecialchars($request->input('username'));
            $ntoko = htmlspecialchars($request->input('nama_toko'));
            $telp = htmlspecialchars($request->input('telepon'));
            $addr = htmlspecialchars($request->input('alamat'));
            $pass = $request->input('password');

            $user = Login::where('userid', $uid)->first();

            if (password_verify($pass, $user->password)) {
                $cekDataUpdate = Login::where('userid', $uid)
                    ->update([
                        'username' => $uname,
                        'toko' => $ntoko,
                        'telepon' => $telp,
                        'alamat' => $addr
                    ]);

                if ($cekDataUpdate) {
                    return redirect()->back()->with('success', 'Data berhasil diperbarui!');
                } else {
                    return redirect()->back()->with('error', 'Gagal Edit Data');
                }
            } else {
                return redirect()->back()->with('error', 'Maaf password salah');
            }
        }

        if ($request->has('UpdatePass')) {
            $pass1 = $request->input('pswd1');

            $user = Login::where('userid', $uid)->first();

            if (password_verify($pass1, $user->password)) {
                $pass2 = $request->input('pswd2');
                $pass3 = bcrypt($request->input('pswd3'));

                if (password_verify($pass2, $pass3)) {
                    $cekPass = Login::where('userid', $uid)
                        ->update(['password' => $pass3]);

                    if ($cekPass) {
                        return redirect()->back()->with('success', 'Password Berhasil di update');
                    } else {
                        return redirect()->back()->with('error', 'Gagal update password');
                    }
                } else {
                    return redirect()->back()->with('error', 'Password yang Anda Masukan Tidak Sama');
                }
            } else {
                return redirect()->back()->with('error', 'Maaf password salah');
            }
        }

        return view('profile', compact('username', 'toko', 'alamat', 'telepon'));
    }

    public function index(Request $request)
    {
        if (!$request->session()->has('userid') || $request->session()->get('role') != 'pimpinan') {
            return redirect()->route('index');
        }

        $uid = $request->session()->get('userid');
        $dataLogin = Login::where('userid', $uid)->first();

        if (!$dataLogin) {
            return redirect()->route('index');
        }
        $username = $dataLogin->username;
        $toko = $dataLogin->toko;
        $user = Login::orderBy('userid', 'ASC')->get();

        return view('user', [
            'username' => $username,
            'toko' => $toko,
            'DataLogin' => $dataLogin,
            'user' => $user,
        ]);
    }

    public function delete($hapus)
    {

        $user = Login::find($hapus);
        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully');
    }

    public function tambah_user(Request $request)
    {

        $username =  htmlspecialchars($request->input('username'));
        $password =  htmlspecialchars($request->input('password'));
        $toko =  htmlspecialchars($request->input('toko'));
        $alamat =  htmlspecialchars($request->input('alamat'));
        $telepon =  htmlspecialchars($request->input('telepon'));
        $role =  htmlspecialchars($request->input('role'));

        $inputuser = Login::create([
            'username' => $username,
            'password' => $password,
            'toko' => $toko,
            'alamat' => $alamat,
            'telepon' => $telepon,
            'role' => $role,
        ]);

        if ($inputuser) {
            return redirect()->back();
        } else {
            return redirect()->back()->with('error', 'Gagal Menambahkan Data');
        }
    }


    public function edit_user(Request $request)
    {
        $username = $request->input('username');
        $toko = $request->input('toko');
        $alamat = $request->input('alamat');
        $telepon = $request->input('telepon');
        $userid = $request->input('userid');

        // Memeriksa apakah ada pengguna lain dengan ID yang sama


        $user = Login::find($userid);
        if ($user) {
            $user->username = $username;
            $user->toko = $toko;
            $user->alamat = $alamat;
            $user->telepon = $telepon;

            // Contoh penggunaan bcrypt() untuk menyimpan password yang dienkripsi
            if ($request->has('password')) {
                $password = $request->input('password');
                $user->password = bcrypt($password);
            }

            if ($user->save()) {
                return redirect()->back()->with('success', 'Data user berhasil diubah');
            } else {
                return redirect()->back()->with('error', 'Gagal Edit Data User');
            }
        } else {
            return redirect()->back()->with('error', 'User tidak ditemukan');
        }
    }
}
