<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'user_id',
        'nama_project',
        'kategori',
        'teknologi',
        'deskripsi',
        'gambar',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
