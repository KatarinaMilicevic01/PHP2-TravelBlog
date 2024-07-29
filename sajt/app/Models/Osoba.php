<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Osoba extends Model
{
    use HasFactory;

    protected $table = 'osoba';
    protected $primaryKey = 'idOsoba';
    public $timestamps = false;

    public function akcije(){
        return $this->belongsTo(Akcije::class,'idOsoba','idOsoba');
    }
}
