<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $table = 'families';
    protected $guarded = [];
    public function relation()
    {
        return $this->belongsTo(FamiliesRelation::class);
    }
}
