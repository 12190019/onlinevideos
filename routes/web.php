<?php

use Illuminate\Support\Facades\Route;
use App\Event;
use App\News;
use App\Videos;

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
    return view('auth.register');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/gcitnews', function () {
    $news = News::orderBy('id', 'desc')->get();
    $events = Event::orderBy('id', 'desc')->get();
    return view('public.index')->with('news',$news)->with('events',$events);
});

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('postevent', 'PostEventsController');
//Route::resource('postvideos', 'VideoControllers');

Route::resource('postnews', 'NewsController');
