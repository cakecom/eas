<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Awobaz\Compoships\Compoships;
class Request extends Model
{
    use Compoships;
    //
    protected $fillable=['user_id','status','quarter_id'];
}
