<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggota';

    protected $fillable = [
        'nama',
        'email',
        'nomor_telepon',
        'alamat',
    ];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}