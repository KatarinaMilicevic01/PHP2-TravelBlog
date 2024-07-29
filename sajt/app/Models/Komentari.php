<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentari extends Model
{
    use HasFactory;

    protected $table = 'komentar';
    protected $primaryKey = 'idKomentar';
    public $timestamps = false;

    public function komOsoba(){
        return $this->belongsTo(Osoba::class,'idOsoba','idOsoba');
    }

    public function komBlog(){
        return $this->belongsTo(Blog::class,'idBlog','idBlog');
    }
}
