<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\KaulkulatorsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Using controler

//welcome lapas
Route::get('/',[WelcomeController::class, 'index'])->name('welcome.index');

//bloga lapa main
Route::get('/blog',[BlogController::class, 'index'])->name('blog.index');

//atseviska bloga lapa
Route::get('/blog/single-blog-post',[BlogController::class, 'show'])->name('blog.show');

//about lapa
Route::get('/about',function(){
    return view('about');
})->name('about');

//kontaktu lapa - stradajos epasta aizsutisana - lai nakotne varetu citas valodas pievienot rakstam beigas name
Route::get('/contact', [ContactController::class,'index'])->name('contact.index');

//autentifikacija
Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    Route::get('/', 'WelcomeController@index')->name('welcome.index');

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });
});

//cukura dienasgramatas izveide, redigesana, dzesana, pievienosana

Route::group(['middleware' => ['auth']], function() {
    Route::Resource('dienasgramata', NoteController::class);
    Route::delete('/dienasgramata/{id}', 'NoteController@destroy')->name('dienasgramata.destroy');
    Route::get('/kaulkulators',[KaulkulatorsController::class, 'index'])->name('kaulkulators.index');
});

//pdf faili pa laikiem- 3, 7, un 30 dienas
Route::get('/export', [ExportController::class, 'exportToPDF'])->name('pdf.export');








