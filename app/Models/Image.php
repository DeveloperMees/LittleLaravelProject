<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_path'
    ];

    //An image model belongs to the iphone
    public function iphone()
    {
        return $this->belongsTo(Iphone::class);
    }
}
