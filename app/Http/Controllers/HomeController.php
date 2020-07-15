<?php

namespace App\Http\Controllers;

use App\Assessment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->Director()) {
            return view('director/dashboard');
        }elseif (auth()->user()->Manager()){
            return view('manager/dashboard');
        } else {
            $assessed= Assessment::select('user_id')->get()->toarray();
            $array=array();
            foreach ($assessed as $data){
                $array[]=$data['user_id'];
            }
            $not_assessed =DB::table('users')->where('id','!=',3)
                ->whereRaw('id  NOT IN('.implode(',',($array)).')')
                ->get();

            return view('home',compact('not_assessed'));
        }
    }
}
