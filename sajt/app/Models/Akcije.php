<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akcije extends Model
{
    use HasFactory;
    protected $table = 'akcija';
    protected $primaryKey = 'idAkcija';
    public $timestamps = false;

    public function osoba(){
        return $this->belongsTo(Osoba::class,'idOsoba','idOsoba');
    }

    public function blog(){
        return $this->belongsTo(Blog::class, 'idBlog','idBlog');
    }

    public function poruka(){
        return $this->belongsTo(Poruka::class,'idPoruka', 'idPoruka');
    }
    public function komentar(){
        return $this->belongsTo(Komentari::class,'idKomentar','idKomentar');
    }
}
