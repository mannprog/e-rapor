<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaporSiswa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function walas()
    {
        return $this->belongsTo(User::class, 'walas_id');
    }

    public function siswa()
    {
        return $this->belongsTo(User::class, 'siswa_id');
    }

    public function rapor()
    {
        return $this->hasMany(Rapor::class);
    }
}
