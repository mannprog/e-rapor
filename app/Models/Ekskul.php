<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekskul extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function raporsiswa()
    {
        return $this->belongsTo(RaporSiswa::class);
    }
}
