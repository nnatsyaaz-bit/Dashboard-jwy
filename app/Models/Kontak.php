<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;

    protected $table = 'tbl_kontak'; // Sesuaikan nama tabel kontak di MySQL jika berbeda

    protected $fillable = [
        'user_id',
        'nama',
        'link',
        'icon',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
