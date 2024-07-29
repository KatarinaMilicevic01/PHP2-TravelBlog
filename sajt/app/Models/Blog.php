<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blog';
    protected $primaryKey = 'idBlog';
    public $timestamps = false;

    public function slikaBlog(){
        return $this -> belongsTo(Slika::class, 'idSlika', 'idSlika');
    }

    public function blogPodnaslov(){
        return $this->hasMany(Podnaslov::class, 'idBlog', 'idBlog');
    }

    public function lajkBlog(){
        return $this->hasMany(Lajkovi::class, 'idBlog', 'idBlog');
    }

    public function komBlog(){
        return $this->hasMany(Komentari::class,'idBlog','idBlog');
    }

    public function katBlog(){
        return $this->belongsToMany(Kategorije::class, 'kategorija_blog', 'idBlog', 'idKategorija');
    }

    public function akcije(){
        return $this->belongsTo(Akcije::class, 'idBlog', 'idBlog');
    }
}
