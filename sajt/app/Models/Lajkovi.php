<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lajkovi extends Model
{
    use HasFactory;

    protected $table = 'lajk';
    protected $primaryKey = 'idLike';
    public $timestamps = false;

    public function lajkOsoba(){
        return $this->belongsTo(Osoba::class, 'idOsoba', 'idOsoba');
    }
    public function lajkBlog(){
        return $this->belongsTo(Blog::class, 'idBlog', 'idBlog');
    }
}
