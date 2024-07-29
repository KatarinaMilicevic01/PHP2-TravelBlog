<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Podnaslov extends Model
{
    use HasFactory;

    protected $table = 'podnaslov';
    protected $primaryKey = 'idPodnaslov';
    public $timestamps = false;

    public function slikaPodnaslov(){
        return $this->belongsTo(Slika::class, 'idSlika','idSlika');
    }

    public function blogPodnaslov(){
        return $this->belongsTo(Blog::class,'idBlog','idBlog');
    }
}
