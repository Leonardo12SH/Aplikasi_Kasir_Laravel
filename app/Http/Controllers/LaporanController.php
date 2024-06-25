<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\Login;
use App\Models\Inv;

class LaporanController extends Controller
{
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
        $laporan = Laporan::all();

        $mulai = $request->input('tgl_mulai');
        $selesai = $request->input('tgl_selesai');

        if ($mulai != null || $selesai != null) {
            $data_laporan = Inv::where('status', 'selesai')
                ->whereBetween('tgl_inv', [$mulai, date('Y-m-d', strtotime($selesai . ' +1 day'))])
                ->orderByDesc('invid')
                ->get();

            $terjual = Laporan::selectraw('SUM(qty) as totqty')
                ->whereIn('invoice', function ($query) use ($mulai, $selesai) {
                    $query->select('invoice')
                        ->from('inv')
                        ->where('status', 'selesai')
                        ->whereBetween('tgl_inv', [$mulai, date('Y-m-d', strtotime($selesai . ' +1 day'))]);
                })
                ->first();
            $pendapatan = Laporan::selectRaw('SUM(subtotal - qty * harga_modal) as totdpt1')
                ->whereIn('invoice', function ($query) use ($mulai, $selesai) {
                    $query->select('invoice')
                        ->from('inv')
                        ->where('status', 'selesai')
                        ->whereBetween('tgl_inv', [$mulai, date('Y-m-d', strtotime($selesai . ' +1 day'))]);
                })
                ->first();

            $penjualan = Laporan::selectRaw('SUM(qty * harga_modal) as totdpt')
                ->whereIn('invoice', function ($query) use ($mulai, $selesai) {
                    $query->select('invoice')
                        ->from('inv')
                        ->where('status', 'selesai')
                        ->whereBetween('tgl_inv', [$mulai, date('Y-m-d', strtotime($selesai . ' +1 day'))]);
                })
                ->first();

            $total = Laporan::selectRaw('SUM(subtotal) as isub')
                ->whereIn('invoice', function ($query) use ($mulai, $selesai) {
                    $query->select('invoice')
                        ->from('inv')
                        ->where('status', 'selesai')
                        ->whereBetween('tgl_inv', [$mulai, date('Y-m-d', strtotime($selesai . ' +1 day'))]);
                })
                ->first();

            // ... sisa kueri untuk pendapatan, penjualan, dan total
        } else {
            $data_laporan = Inv::where('status', 'selesai')->orderByDesc('invid')->get();
            $terjual = Laporan::selectRaw('SUM(qty) as totqty')->first();
            $pendapatan = Laporan::selectRaw('SUM(subtotal - qty * harga_modal) as totdpt1')->first();
            $penjualan = Laporan::selectRaw('SUM(qty * harga_modal) as totdpt')->first();
            $total = Laporan::selectRaw('SUM(subtotal) as isub')->first();
        }

        return view('laporan', [
            'data_laporan' => $data_laporan,
            'username' => $username,
            'toko' => $toko,
            'Laporan' => $laporan,
            'terjual' => $terjual,
            'pendapatan' => $pendapatan,
            'penjualan' => $penjualan,
            'total' => $total,
            'mulai' => $mulai,
            'selesai' => $selesai,
        ]);
    }

    public function removeData($nona)
    {
        Laporan::removeData($nona);
        return redirect()->back();
    }

    public function invoice(Request $request)
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
        $noinv = $request->detail;
        $dataInv = Inv::where('invoice', $noinv)->first();
        $laporan = Laporan::where('invoice', $noinv)->get();
        $total = Laporan::where('invoice', $noinv)->selectRaw('SUM(subtotal) as isub')->first();

        if (!$dataLogin) {
            return redirect()->route('index');
        }

        if (!empty($dataInv)) {
            // Lakukan sesuatu dengan nilai $noinv
            $DataInv = Inv::where('invoice', $noinv)->first();
            $Dbayar = $DataInv->pembayaran;
            $Dkembali = $DataInv->kembalian;
            $Datee = $DataInv->tgl_inv;

            // Misalnya, tampilkan dalam sebuah view
            return view('invoice', compact('Dbayar', 'Dkembali', 'Datee', 'username', 'toko', 'laporan', 'dataInv', 'total', 'alamat', 'telepon'));
        } else {
            return redirect()->back();
        }
    }
}
