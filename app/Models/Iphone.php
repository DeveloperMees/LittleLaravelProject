<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iphone extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'message'
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }


}

