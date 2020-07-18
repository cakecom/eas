<?php

namespace App\Http\Controllers\director;

use App\Http\Controllers\Controller;
use App\Quarter;
use App\Request;


class DirectorController extends Controller
{
    public function index()
    {
        $request=Request::where('status','Pending')->get();
        return view('director/dashboard',compact('request'));
    }
    public function updateDirector(Request $request){
        $request=Request::find($_POST['id']);
        $request->update(['status'=>$_POST['status']]);
        return redirect(route('indexDirector'));
    }
    public function getRequest(){
        $id=$_GET['id'];
       $request=Request::find($id);
        return response()->json($request);
    }
}
