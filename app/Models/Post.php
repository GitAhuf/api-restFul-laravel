<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    const BORRADOR = 1;
    const PUBLICADO = 2;

    // Relacion unoa muchos inversa

    public function user(){
        $this->belongsTo(User::class);
    }

    public function category(){
        $this->belongsTo(Category::class);
    }

    // Relacion muchos a muchos

    public function tags(){
        $this->belongsToMany(Tag::class);
    }

    // Relacion uno a muchos polimorfica
    public function images(){
        return $this->morphMany(Image::class, 'imageable');
    }
}
