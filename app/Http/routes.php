<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => ['web']], function () {
    //Route::get('/', function() {

		// dd(auth()->guard('admin')->check());
		// dd(auth()->guard('admin')->user()->username);
		
		// dd(DB::table('Products')->get());
		
		// dd(DB::table('Products')->where('RowID', '3')->get());

		/*$guid = getGUID();
		DB::statement("INSERT INTO 
			Products (Name, RowAddDateTime, RowAddUserNo, RowEditDateTime, RowEditUserNo, ID, Status, _SynchronizationID_)
			VALUES ('testttts224', '2016-09-28 15:31:38.000', 1, '2016-09-28 15:31:38.000', 1, '614', 0, '$guid')");*/
	//});

    Route::get('/', ['as' => 'homepage', 'uses' => 'HomeController@homepage']);
	Route::get('dealer-login', ['as' => 'dealer.login', 'uses' => 'DealerController@login']);
	Route::post('dealer-login/{id}', ['as' => 'dealer.login.p', 'uses' => 'DealerController@loginP']);
});
