<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Inv;
use App\Models\Login;
use App\Models\Produk;
use App\Models\Laporan;
use App\Models\Keranjang;
use Illuminate\Http\Request;

class TransaksiController extends Controller
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
        $dataselect = Produk::all();
        $tot_bayar = 0;
        $data_cart = Keranjang::all();
        $noinv = ' - ';
        $itungTrans3 = 0;
        $dataInv = Keranjang::first();

        if ($dataInv) {
            $noinv = $dataInv->invoice;
            $itungTrans = Keranjang::selectRaw('SUM(subtotal) as jumlahtrans')->first();
            $itungTrans3 = $itungTrans->jumlahtrans;
        }

        return view('transaksi', [
            'username' => $username,
            'toko' => $toko,
            'dataselect' => $dataselect,
            'data_cart' => $data_cart,
            'tot_bayar' => $tot_bayar,
            'noinv' => $noinv,
            'itungTrans3' => $itungTrans3,
        ]);
    }

    public function input_keranjang(Request $request)
    {
        $Input1 = $request->input('Ckdproduk');
        $Input2 = $request->input('Cnproduk');
        $Input3 = $request->input('Charga');
        $Input5 = $request->input('Csubs');
        $hrg_m = $request->input('harga_modal');
        $ii = $request->input('Cqty');
        $uid = $request->session()->get('userid');
        $dataLogin = Login::where('userid', $uid)->first();
        $username = $dataLogin->username;
        $alamat = $dataLogin->alamat;
        $telepon = $dataLogin->telepon;
        $toko = $dataLogin->toko;

        $inv_c = 'Nilai Default';
        $cartCount = Keranjang::count();

        if ($cartCount > 0) {
            $cekbrg = Keranjang::where('kode_produk', $Input1)->where('invoice', $inv_c)->first();
            $dataInv = Keranjang::first();
            if ($dataInv) {
                $inv_c = $dataInv->invoice;
            }
            if ($cekbrg) {
                $i = $request->input('Cqty');
                $baru = $cekbrg->qty + $i;
                $baru1 = $cekbrg->harga * $baru;

                $updateaja = Keranjang::where('invoice', $inv_c)->where('kode_produk', $Input1)
                    ->update(['qty' => $baru, 'subtotal' => $baru1]);

                if ($updateaja) {
                    return redirect()->route('transaksi');
                } else {
                    return redirect()->route('transaksi');
                }
            } else {
                $tambahdata = new Keranjang();
                $tambahdata->invoice = $inv_c;
                $tambahdata->kode_produk = $Input1;
                $tambahdata->nama_produk = $Input2;
                $tambahdata->harga = $Input3;
                $tambahdata->harga_modal = $hrg_m;
                $tambahdata->qty = $ii;
                $tambahdata->subtotal = $Input5;

                if ($tambahdata->save()) {
                    return redirect()->route('transaksi');
                } else {
                    return redirect()->route('transaksi');
                }
            }
        } else {
            $kodeTerbesar = Inv::max('invoice');
            $urutan = (int)substr($kodeTerbesar, 8, 2);
            $urutan++;
            $huruf = "AD";
            $oi = $huruf . date("jnyGi") . sprintf("%02s", $urutan);

            $bikincart = new Inv();
            $bikincart->invoice = $oi;
            $bikincart->pembayaran = 0;
            $bikincart->kembalian = 0;
            $bikincart->status = 'proses';

            if ($bikincart->save()) {
                $tambahuser = new Keranjang();
                $tambahuser->invoice = $oi;
                $tambahuser->kode_produk = $Input1;
                $tambahuser->nama_produk = $Input2;
                $tambahuser->harga = $Input3;
                $tambahuser->harga_modal = $hrg_m;
                $tambahuser->qty = $ii;
                $tambahuser->subtotal = $Input5;

                if ($tambahuser->save()) {
                    return redirect()->route('transaksi');
                } else {
                    return redirect()->route('transaksi');
                }
            } else {
                // Handle jika gagal membuat invoice baru
            }
        }
    }

    public function hapus($hapus)
    {
        $hapus = Keranjang::find($hapus);
        $hapus->delete();
        if ($hapus) {
            return redirect()->back();
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus data keranjang');
        }
    }

    public function hapusSemua(Request $request)
    {
        $noinvoicenya = $request->input('hapusAll');
        $hapus_data_Cart_all = Keranjang::where('invoice', $noinvoicenya)->delete();
        $hapus_data_Cart_all1 = Inv::where('invoice', $noinvoicenya)->delete();

        if ($hapus_data_Cart_all && $hapus_data_Cart_all1) {
            return redirect()->back();
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus data keranjang');
        }
    }

    public function simpanTransaksi(Request $request)
    {
        $Dbayar = $request->input('pembayaran');
        $Dkembali = $request->input('kembalian');
        $noinv = $request->input('noinv');
        $uid = $request->session()->get('userid');
        $dataLogin = Login::where('userid', $uid)->first();
        $username = $dataLogin->username;
        $alamat = $dataLogin->alamat;
        $telepon = $dataLogin->telepon;
        $toko = $dataLogin->toko;
        $dataInv = $noinv;

        $invoice = Inv::where('invoice', $noinv)->first();
        $Datee = $invoice->tgl_inv;


        if ($invoice) {
            $invoice->pembayaran = $Dbayar;
            $invoice->kembalian = $Dkembali;
            $invoice->status = 'selesai';

            if ($invoice->save()) {
                $laporan = Keranjang::where('invoice', $noinv)->get();

                if ($laporan->count() > 0) {
                    $laporanData = [];
                    foreach ($laporan as $item) {
                        $laporanData[] = [
                            'invoice' => $item->invoice,
                            'kode_produk' => $item->kode_produk,
                            'nama_produk' => $item->nama_produk,
                            'harga' => $item->harga,
                            'harga_modal' => $item->harga_modal,
                            'qty' => $item->qty,
                            'subtotal' => $item->subtotal,
                        ];
                    }

                    Laporan::insert($laporanData);
                    Keranjang::where('invoice', $noinv)->delete();
                    $total = Laporan::where('invoice', $noinv)->selectRaw('SUM(subtotal) as isub')->first();

                    return view('invoice', compact('Dbayar', 'Dkembali', 'Datee', 'username', 'toko', 'laporan', 'dataInv', 'alamat', 'telepon', 'total'));
                } else {
                    return redirect()->back()->with('error', 'Tidak ada data keranjang untuk disimpan');
                }
            } else {
                return redirect()->back()->with('error', 'Gagal menyimpan data pembayaran dan kembalian');
            }
        } else {
            return redirect()->back()->with('error', 'Invoice tidak ditemukan');
        }
    }
}
