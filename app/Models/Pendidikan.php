<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    protected $fillable = [
        'user_id',
        'nama_instansi',
        'tingkat',
        'tahun',
        'deskripsi',
        'fokus_pembelajaran',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
