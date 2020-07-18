<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Awobaz\Compoships\Compoships;

class Request extends Model
{
    use Compoships;
    //
    protected $fillable = ['user_id', 'status', 'quarter_id',
        'time_manage',
        'quality',
        'creativity',
        'team_work',
        'discipline',
        'score',
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
