<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';

    protected $guarded = [];

    public function education(){

        return $this->hasOne(JobEducation::class);
    }

    public function kelurahan(){
        return $this->belongsTo(Kelurahan::class);
    }

    public function family(){
        return $this->hasOne(Family::class);
    }

    public function organitation(){
        return $this->hasOne(MemberOrganitation::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function jobsEducation(){
        return $this->hasOne(JobEducation::class);
    }

}
