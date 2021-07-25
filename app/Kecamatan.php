<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table='kecamatans';

    public function kelurahan(){
        return $this->hasMany(Kelurahan::class);
    }

    public function kabupaten(){
        return $this->belongsTo(Kabupaten::class);
    }
}
