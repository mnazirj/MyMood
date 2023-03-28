<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesViewController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SingerController;
use App\Http\Controllers\SongController;
use App\Models\Follow;
use App\Models\Singer;
use App\Models\Song;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::get('/', [PagesViewController::class,'HomePageIndex'])->name('home');
Route::get('/search', [PagesViewController::class,'SearchIndex'])->name('search');
Route::post('/search', [SearchController::class,'Search'])->name('search');
Route::get('{id}/like',[SongController::class,'LikeSong'])->name('like');
Route::get('{id}/unlike',[SongController::class,'UnLikeSong'])->name('unlike');




Route::get('/test', function () {
    // echo md5('Demo');
    session()->remove('Id');
});


Route::middleware(['isUser'])->group(function(){
    Route::group(['prefix'=>'auth'],function(){
        Route::get('sign-in',[PagesViewController::class,'SignInIndex'])->name('auth.signin');
        Route::post('sign-in',[AuthController::class,'LogMeIn'])->name('auth.signinPOST');
        Route::get('sign-up',[PagesViewController::class,'SignUpIndex'])->name('auth.signup');
        Route::get('control',[PagesViewController::class,'AdminLogIn'])->name('admin.signin')->excludedMiddleware();
        Route::post('control',[AuthController::class,'LogAsAdmin'])->name('admin.signinPOST')->excludedMiddleware();
    });
});


Route::middleware('isAdmin')->group(function(){
    Route::group(['prefix'=>'dashboard'],function(){
        Route::get('home',[PagesViewController::class,'DashboardIndex'])->name('dashboard.home');
        Route::get('singers',[PagesViewController::class,'ArtistsIndex'])->name('dashboard.ListSinger');
        Route::group(['prefix'=>'singer'], function(){
            Route::post('create',[SingerController::class,'Create'])->name('singer.create');
            Route::post('{id}/edit',[SingerController::class,'Edit'])->name('singer.edit');
            Route::get('{id}/delete',[SingerController::class,'Delete'])->name('singer.delete');
        });
        Route::group(['prefix'=>'song'], function(){
            Route::post('create',[SongController::class,'Create'])->name('song.create');
            Route::get('list',[PagesViewController::class,'SongIndex'])->name('song.list');
            Route::get('{id}/delete',[SongController::class,'Delete'])->name('song.delete');
            Route::post('{id}/edit',[SongController::class,'Edit'])->name('song.edit');
        });
    });
});



Route::group(['prefix'=>'singer'],function(){
    Route::get('{Name}/profile',[PagesViewController::class,'ProfileIndex'])->name('singer.view.profile');
});


