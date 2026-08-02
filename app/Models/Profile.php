<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    // Paksa Model menggunakan nama tabel 'profil'
    protected $table = 'profil';

    protected $fillable = [
        'user_id',
        'nama',
        'email',
        'foto',
        'prodi',
        'nim',
        'alamat',
        'tgl_lahir',
        'hobi',
        'jenis_kelamin',
        'telp',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
