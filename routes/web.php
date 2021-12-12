<?php
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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
    return view('welcome');
});

//email verificacion
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');



Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['verify' => true]);

Route::group(['middleware' => 'auth'], function () {

    Route::get('/estudiantes','EstudiantesController@index')->name('estudiantes.index')->middleware('verified');;
    Route::post('/estudiantes/store','EstudiantesController@store')->name('estudiantes.store')->middleware('verified');;
    Route::delete('/estudiantes/{id}','EstudiantesController@destroy')->name('estudiantes.destroy')->middleware('verified');;
    Route::put('/estudiantes/{estudiantes}/update','EstudiantesController@update')->name('estudiantes.update')->middleware('verified');;
//     Route::get('/categories/{id}/edit','CategoryController@edit');

    Route::get('/salones','SalonesController@index')->name('salones.index')->middleware('verified');;
    Route::post('/salones/store','SalonesController@store')->name('salones.store')->middleware('verified');;
    Route::delete('/salones/{id}','SalonesController@destroy')->name('salones.destroy')->middleware('verified');;
    Route::put('/salones/{salones}/update','SalonesController@update')->name('salones.update')->middleware('verified');;

   Route::get('/materias','MateriasController@index')->name('materias.index')->middleware('verified');
      Route::post('/materias/store','MateriasController@store')->name('materias.store')->middleware('verified');
      Route::delete('/materias/{id}','MateriasController@destroy')->name('materias.destroy')->middleware('verified');
      Route::put('/materias/{materias}/update','MateriasController@update')->name('materias.update')->middleware('verified');



	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

