<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Login;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->session()->has('userid') || $request->session()->get('role') != 'karyawan') {
            return redirect()->route('index');
        }

        $uid = $request->session()->get('userid');
        $dataLogin = Login::where('userid', $uid)->first();

        if (!$dataLogin) {
            return redirect()->route('index');
        }

        $username = $dataLogin->username;
        $toko = $dataLogin->toko;
        $data_barang = Produk::orderBy('idproduk', 'ASC')->get();


        return view('produk', [
            'username' => $username,
            'toko' => $toko,
            'data_barang' => $data_barang,
        ]);
    }

    public function tambah_produk(Request $request)
    {
        $kodeproduk = htmlspecialchars($request->input('Tambah_Kode_Produk'));
        $namaproduk = htmlspecialchars($request->input('Tambah_Nama_Produk'));
        $harga_modal = htmlspecialchars($request->input('Tambah_Harga_Modal'));
        $harga_jual = htmlspecialchars($request->input('Tambah_Harga_Jual'));

        $cekkode = Produk::where('kode_produk', $kodeproduk)->count();

        if ($cekkode > 0) {
            return redirect()->back()->with('error', 'Maaf! Kode produk sudah ada');
        } else {
            $inputProduk = Produk::create([
                'kode_produk' => $kodeproduk,
                'nama_produk' => $namaproduk,
                'harga_modal' => $harga_modal,
                'harga_jual' => $harga_jual,
            ]);

            if ($inputProduk) {
                return redirect()->back();
            } else {
                return redirect()->back()->with('error', 'Gagal Menambahkan Data');
            }
        }
    }

    public function edit_produk(Request $request)
    {
        $idproduk = $request->input('idproduk');
        $kodeproduk = $request->input('Edit_Kode_Produk');
        $namaproduk = $request->input('Edit_Nama_Produk');
        $harga_modal = $request->input('Edit_Harga_Modal');
        $harga_jual = $request->input('Edit_Harga_Jual');

        $CariProduk = Produk::where('kode_produk', $kodeproduk)
            ->where('idproduk', '!=', $idproduk)
            ->count();

        if ($CariProduk > 0) {
            return redirect()->back()->with('error', 'Maaf! Kode produk sudah ada');
        } else {
            $produk = Produk::find($idproduk);
            if ($produk) {
                $produk->kode_produk = $kodeproduk;
                $produk->nama_produk = $namaproduk;
                $produk->harga_modal = $harga_modal;
                $produk->harga_jual = $harga_jual;

                if ($produk->save()) {
                    return redirect()->back();
                } else {
                    return redirect()->back()->with('error', 'Gagal Edit Data Produk');
                }
            } else {
                return redirect()->back()->with('error', 'Produk tidak ditemukan');
            }
        }
    }

    public function hapus_produk($hapus_produk)
    {
        $hapus = Produk::find($hapus_produk);
        $hapus->delete();
        return redirect('hapus');
    }
}
