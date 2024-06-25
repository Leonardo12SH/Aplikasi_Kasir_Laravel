<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    use HasFactory;

    protected $table = 'login';
    protected $primaryKey = 'userid';
    public $timestamps = false;
    public $logo = false;


    protected $fillable = [
        'username',
        'password',
        'toko',
        'alamat',
        'telepon',
        'role'

    ];
    protected $attributes = [
        'logo' => 'default_logo.jpg',
    ];



    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
