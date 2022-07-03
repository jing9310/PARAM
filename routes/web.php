<?php

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
    return view('top');
})->name('top');

// player
Route::namespace('User')->prefix('user')->name('user.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset'    => true,
        'verify'   => false
    ]);

    // ログイン認証後
    Route::middleware('auth:user')->group(function () {
        // TOPページ
        Route::resource('home', 'HomeController', ['only' => 'index']);
        // mypage
        Route::get('mypage/{id}/edit', 'HomeController@edit')->name('mypage.edit');
        Route::post('mypage/{id}/edit', 'HomeController@update');
        // 退会
        Route::get('quit/{id}', 'HomeController@destroy')->name('quit');
        // 医師情報
        Route::get('doctor_info/{id}', 'HomeController@info')->name('doctor_info');
    });
});

// doctor
Route::namespace('Doctor')->prefix('doctor')->name('doctor.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset'    => true,
        'verify'   => false
    ]);

    // ログイン認証後
    Route::middleware('auth:doctor')->group(function () {

        // toppage
        Route::resource('home', 'HomeController', ['only' => 'index']);
        // mypage
        Route::get('mypage/{id}/edit', 'HomeController@edit')->name('mypage.edit');
        Route::post('mypage/{id}/edit', 'HomeController@update');
        // 退会
        Route::get('quit/{id}', 'HomeController@destroy')->name('quit');
        // 投稿検索
        Route::post('search/result', 'HomeController@search')->name('search');

    });

});

// content
Route::prefix('content')->name('content.')->group(function () { 
    // playerログイン認証後
    Route::middleware('auth:user')->group(function () {
        // 投稿フォーム
        Route::get('form', 'ContentController@create')->name('form');
        Route::post('form', 'ContentController@store');
        // 投稿詳細
        Route::get('userdetail/{id}', 'ContentController@show')->name('userdetail');
        // 投稿編集
        Route::get('edit/{id}', 'ContentController@edit')->name('edit');
        Route::post('edit/{id}', 'ContentController@update');
        // 論理削除
        Route::post('delflg/{id}', 'ContentController@delflg')->name('delflg');
        // 投稿削除
        Route::get('delete/{id}', 'ContentController@destroy')->name('destroy');
        
    });
    // doctorログイン認証後
    Route::middleware('auth:doctor')->group(function () {  
        // 投稿詳細
        Route::get('detail/{id}', 'CommentController@show')->name('detail');
    });
});

// reply
Route::prefix('reply')->name('reply.')->group(function () { 
    // playerログイン認証後
    Route::middleware('auth:user')->name('user.')->group(function () {
        // 返信投稿
        Route::post('post/{id}', 'UserReplyController@store')->name('post');
        // 返信詳細
        Route::get('list/{id}', 'UserReplyController@show')->name('list');
        // 返信編集
        Route::get('useredit/{id}', 'UserReplyController@edit')->name('edit');
        Route::post('useredit/{id}', 'UserReplyController@update');
        // 投稿削除
        Route::get('userdelete/{id}', 'UserReplyController@destroy')->name('destroy');
    });
    // doctorログイン認証後
    Route::middleware('auth:doctor')->group(function () {     
        // 返信投稿
        Route::post('create', 'CommentController@store')->name('create');
        // 返信編集
        Route::get('edit/{id}', 'CommentController@edit')->name('edit');
        Route::post('edit/{id}', 'CommentController@update');
        // 返信削除
        Route::get('delete/{id}', 'CommentController@destroy')->name('destroy');
        // 返信一覧
        Route::get('list', 'CommentController@index')->name('list');
    });
});