<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $primaryKey = 'idproduk';
    public $timestamps = false;
    protected $fillable = ['kode_produk', 'nama_produk', 'harga_modal', 'harga_jual'];
}
