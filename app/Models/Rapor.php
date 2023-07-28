<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapor extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function raporsiswa()
    {
        return $this->belongsTo(RaporSiswa::class, 'rapor_id');
    }

    public function nilai()
    {
        return $this->belongsTo(Nilai::class, 'nilai_id');
    }
}
