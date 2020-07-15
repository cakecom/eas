<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
        $a= \App\Assessment::select('user_id')->get()->toarray();
        $array=array();
        foreach ($a as $data){
            $array[]=$data['user_id'];
        }
 $e =DB::table('users')->where('id','!=',3)
     ->whereRaw('id  NOT IN('.implode(',',($array)).')')
     ->get();
// dd($e);
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route for normal user
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index');
});
//Route for admin
Route::group(['prefix' => 'director'], function(){
    Route::group(['middleware' => ['director']], function(){
        Route::get('/dashboard', 'director\DirectorController@index')->name('director');
    });
});
Route::group(['prefix' => 'manager'], function(){
    Route::group(['middleware' => ['manager']], function(){
        Route::get('/dashboard', 'manager\ManagerController@index');
    });
});
