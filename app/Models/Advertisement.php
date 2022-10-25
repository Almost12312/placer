<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;

    protected $fillable = ['author_id', 'title', 'content', 'location', 'delete_at', 'price', 'category_id' , 'status'];

    public function category()
    {
        return $this->belongsTo(Category::class);

    }

    public function file()
    {
        return $this->belongsToMany(File::class);
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function report()
    {
        return $this->hasMany(Report::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
//
//    public function file()
//    {
//        return $this->belongsTo(Advertisement::class);
//    }

}
