<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poruka extends Model
{
    use HasFactory;
    protected $table = 'poruka';
    protected $primaryKey = 'idPoruka';
    public $timestamps = false;

    public function osoba(){
        return $this->belongsTo(Osoba::class, 'idOsoba', 'idOsoba');
    }
}
