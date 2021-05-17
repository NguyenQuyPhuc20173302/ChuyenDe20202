<?php

use App\Http\Controllers\FrontEndController;
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
//Home
// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', 'FrontEndController@getHome');

Route::get('/detail/{id}', 'FrontEndController@getDetail');

Route::get('/contact', 'FrontEndController@getContact');

Route::get('/achievements', 'FrontEndController@getAchievements');

Route::get('/race', 'FrontEndController@getRace');

Route::get('/join', 'FrontEndController@getJoin');

Route::post('/join', 'FrontEndController@postJoin');

Route::get('/login', 'FrontEndController@getLogin');
Route::post('/login', 'FrontEndController@postLogin');
Route::get('/register', 'FrontEndController@getRegister');
Route::post('/register', 'FrontEndController@postRegister');
Route::post('/feedback', 'FrontEndController@postFeedback');
Route::get('/logout', 'FrontEndController@getLogout');

// Route::get('/about', function() {
//     return view('about');
// });

// Route::get('/contact', function() {
//     return view('contact');
// });

// Route::get('/member', function() {
//     return view('member');
// });

// Route::get('/race', function() {
//     return view('race');
// });
//Admin

Route::get('/admin/add-race', 'BackEndController@addRace');
Route::post('/admin/add-race', 'BackEndController@postAddRace');
Route::get('/admin/edit-race/{id}', 'BackEndController@editRace');
Route::post('/admin/edit-race/{id}', 'BackEndController@postEditRace');
Route::get('/admin/get-race', 'BackEndController@getRace');
Route::get('/admin/delete-race/{id}', 'BackEndController@deleteRace');

Route::get('/admin/add-track', 'BackEndController@addTrack');
Route::post('/admin/add-track', 'BackEndController@postAddTrack');
Route::get('/admin/edit-track/{id}', 'BackEndController@editTrack');
Route::post('/admin/edit-track/{id}', 'BackEndController@postEditTrack');
Route::get('/admin/get-track', 'BackEndController@getTrack');
Route::get('/admin/delete-track/{id}', 'BackEndController@deleteTrack');
Route::get('/admin/get-member', 'BackEndController@getMember');
Route::get('/admin/get-feedback', 'BackEndController@getFeedBack');


Route::get('/admin/edit-member/{member_id}/{race_id}/{id}', 'BackEndController@editMember');
Route::post('/admin/edit-member/{member_id}/{race_id}/{id}', 'BackEndController@postEditMember');
Route::get('/admin/data', 'BackEndController@getData');