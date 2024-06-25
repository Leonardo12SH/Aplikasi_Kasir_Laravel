<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;
    protected $table = 'cart';
    protected $primaryKey = 'idcart';
    public $timestamps = false;
    protected $fillable = ['invoice', 'kode_produk', 'nama_produk', 'harga', 'harga_modal', 'qty', 'subtotal'];
}
