<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pengirim',
        'alamat_pengirim',
        'nama_barang',
        'nama_penerima',
        'alamat_penerima',
        'expedisi',
        'harga'
    ];
}
