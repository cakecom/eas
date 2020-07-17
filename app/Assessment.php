<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Awobaz\Compoships\Compoships;
class Assessment extends Model
{
    use Compoships;
    //
    protected $fillable = ['user_id', 'time_management',
        'quality_of_work', 'creativity', 'team_work', 'discipline', 'score','quarter_id'];

    public function users(){
        return $this->belongsTo('App\User','user_id','id');
    }
    public function request(){
        return $this->belongsTo('App\Request',['user_id','quarter_id'],['user_id','quarter_id']);
    }
}

