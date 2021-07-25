<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamiliesRelation extends Model
{
    protected $table='family_relations';
    public function family()
    {
        return $this->hasOne(Family::class);
    }
}
