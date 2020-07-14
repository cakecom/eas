<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    //
    protected $fillable = ['user_id', 'time_management',
        'quality_of_work', 'creativity', 'team_work', 'discipline', 'score'];
}
