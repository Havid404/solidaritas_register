<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $table='kabupatens';

    public function kecamatan()
    {
        return $this->hasMany(Kecamatan::class);
    }
    
    public function province(){
        return $this->belongsTo(Province::class);
    }
}
