<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function advertisement()
    {
        return $this->belongsToMany(Advertisement::class);
    }

//    public function user() {
//        return $this->hasMany(User::class);
//    }
//
//    public function advertisement()
//    {
//        return $this->hasMany(Advertisement::class);
//    }
}
