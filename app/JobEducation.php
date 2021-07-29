<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobEducation extends Model
{
    protected $table = 'jobs_educations';
    protected $guarded = [];
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
