<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    //
    protected $fillable = ['user_id', 'time_management',
        'quality_of_work', 'creativity', 'team_work', 'discipline', 'score','quarter_id'];

    public function users(){
        return $this->belongsTo('App\User','user_id','id');
    }
    public function request(){
        return $this->belongsTo('App\Request','user_id','user_id');
    }
}

