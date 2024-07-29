<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategorije extends Model
{
    use HasFactory;

    protected $table = 'kategorija';
    protected $primaryKey = 'idKategorija';
    public $timestamps = false;

    public function blogKat(){
        return $this->belongsToMany(Blog::class, 'kategorija_blog', 'idKategorija', 'idBlog');    }
}
