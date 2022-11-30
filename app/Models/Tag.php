<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name',
        'created_by'
    ];

    public function advertisement()
    {
        return $this->belongsToMany(Advertisement::class);
    }
}
