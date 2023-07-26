<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $guarded =['id'];

    public function rombel()
    {
        return $this->belongsTo(Rombel::class);
    }

    public function guru()
    {
        return $this->belongsTo(User::class);
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
}
