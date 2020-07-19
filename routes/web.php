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

//Route::resource('/home', 'HomeController');
//Route for normal user
Route::get('/',function (){
return redirect(Route('login'));
});
Route::group(['middleware' => ['auth']], function () {
    Route::resource('/home', 'HomeController');
    Route::post('/countAssessment','HomeController@count_assessment')->name('countAssessment');
});
//Route for admin
Route::group(['prefix' => 'director'], function(){
    Route::group(['middleware' => ['director']], function(){
        Route::get('/dashboard', 'director\DirectorController@index')->name('indexDirector');
        Route::get('/getRequest', 'director\DirectorController@getRequest')->name('getRequest');
        Route::post('/updateDirector','director\DirectorController@updateDirector')->name('updateDirector');
    });
});
Route::group(['prefix' => 'manager'], function(){
    Route::group(['middleware' => ['manager']], function(){
        Route::get('/dashboard', 'manager\ManagerController@index');
        Route::resource('assessment','manager\AssessmentFormController');
        Route::get('/getDetails','manager\ManagerController@details')->name('details');
        Route::post('/sendDirector','manager\ManagerController@sendDirector')->name('sendDirector');
        Route::get('/getAssessment', 'manager\ManagerController@getAssessment')->name('getAssessment');
    });
});
