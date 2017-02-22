<?php

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
Route::group(['prefix'=>'/','namespace' => 'client'],function(){
	Route::get('/','MainController@getIndex')->name('getIndex');
	Route::get('chi-tiet-tin/{id}/{slug}','MainController@getDetail')->name('getDetail')->where(['id','[0-9]+']);
	Route::get('the-loai/{id}/{slug}','MainController@getCate')->name('getCate')->where(['id','[0-9]+']);
});







Route::get('mt_login','LoginController@getLogin')->name('getLogin');
Route::post('mt_login','LoginController@postLogin')->name('postLogin');
Route::get('logout','LoginController@getLogout')->name('getLogout');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix'=>'mt_admin','namespace' => 'admin'],function(){
    	Route::get('', function(){
    		$stt_users = DB::table('mt95_users')->count();
    		$stt_news = DB::table('mt95_news')->count();
    		$stt_category = DB::table('mt95_category')->count();
    		return view('admin.modules.dashboard.main',['stt_user'=>$stt_users,'stt_news'=>$stt_news,'stt_category'=>$stt_category]);
    	});
	    Route::group(['prefix'=>'category'],function(){
	    	Route::get('add','CateController@getAdd')->name('getAddCate');
	    	Route::post('add','CateController@postAdd')->name('postAddCate');
	    	Route::get('list-cate','CateController@listCate')->name('listCate');
	    	Route::get('del/{id}','CateController@delCate')->name('delCate')->where('id','[0-9]+');
	    	Route::get('edit/{id}','CateController@getEdit')->name('getEditCate')->where('id','[0-9]+');
	    	Route::post('edit/{id}','CateController@postEdit')->name('postEditCate')->where('id','[0-9]+');
	    });
	    Route::group(['prefix'=>'user'], function(){
	    	Route::get('add','UserController@getAdd')->name('getAddUser');
	    	Route::post('add','UserController@postAdd')->name('postAddUser');
	    	Route::get('list','UserController@getList')->name('ListUser');
	    	Route::get('del/{id}','UserController@getDel')->name('delUser')->where('id','[0-9]+');
	    	Route::get('edit/{id}','UserController@getEdit')->name('getEditUser')->where('id','[0-9]+');
	    	Route::post('edit/{id}','UserController@postEdit')->name('postEditUser')->where('id','[0-9]+');
	    });
	    Route::group(['prefix'=>'news'], function(){
	    	Route::get('add','NewsController@getAdd')->name('getAddNews');
	    	Route::post('add','NewsController@postAdd')->name('postAddNews');
	    	Route::get('list','NewsController@getList')->name('ListNews');
	    	Route::get('del/{id}','NewsController@getDel')->name('delNews')->where('id','[0-9]+');
	    	Route::get('edit/{id}','NewsController@getEdit')->name('getEditNews')->where('id','[0-9]+');
	    	Route::post('edit/{id}','NewsController@postEdit')->name('postEditNews')->where('id','[0-9]+');
	    });
    });
});