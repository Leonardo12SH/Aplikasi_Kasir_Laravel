<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laporan extends Model
{
    protected $table = 'laporan';

    public static function getTotalTerjual($mulai = null, $selesai = null)
    {
        $query = self::query()->selectRaw('SUM(qty) as totqty');

        if ($mulai !== null && $selesai !== null) {
            $query->whereIn('invoice', function ($q) use ($mulai, $selesai) {
                $q->select('invoice')
                    ->from('inv')
                    ->where('status', 'selesai')
                    ->whereBetween('tgl_inv', [$mulai, date('Y-m-d', strtotime($selesai . ' +1 day'))]);
            });
        }

        return $query->first();
    }

    public static function removeData($nona)
    {
        DB::table('laporan')->where('invoice', $nona)->delete();
        DB::table('inv')->where('invoice', $nona)->delete();
    }
}
