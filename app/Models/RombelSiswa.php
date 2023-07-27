<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RombelSiswa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function rombel()
    {
        return $this->belongsTo(Rombel::class);
    }

    public function siswa()
    {
        return $this->belongsTo(User::class);
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }
}
