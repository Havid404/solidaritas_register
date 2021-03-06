<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberOrganitation extends Model
{
    protected $table = 'member_organitations';
    protected $guarded = [];
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
