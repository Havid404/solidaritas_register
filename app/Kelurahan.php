<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table='kelurahans';

    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class);
    }
}
