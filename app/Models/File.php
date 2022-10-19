<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class File extends Model
{
    use HasFactory;

    protected $fillable = ['original_name', 'size_bytes', 'location', 'new_hash_name', 'extension'];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function advertisement()
    {
        return $this->belongsToMany(Advertisement::class);
    }

    public function getUrl()
    {
        return "$this->location/$this->new_hash_name" ;
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
