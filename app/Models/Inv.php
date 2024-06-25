<?php

namespace App\Models;

use App\Models\Laporan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inv extends Model
{
    use HasFactory;
    protected $table = 'inv';
    protected $primaryKey = 'invid';
    public $timestamps = false;
    protected $fillable = ['invoice', 'tgl_inv', 'pembayaran', 'kembalian', 'status'];
}
