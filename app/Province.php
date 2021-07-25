<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table='provinces';

    public function kabupaten()
    {
        // memberi tahu bahwa provinsi memiliki banyak kabupaten
        return $this->hasMany(Kabupaten::class);
    }


}
