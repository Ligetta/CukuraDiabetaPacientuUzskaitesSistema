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
use App\Http\Controllers\RecepteController;
use App\Http\Controllers\ArstsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\BlogListController;

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

//bloga lapas main
Route::group(['middleware' => ['auth']], function() {
    Route::resource('blog', BlogController::class);
    Route::get('/blog/{blogpost}/edit', [BlogController::class, 'edit'])->name('blog.edit');
    Route::get('/blog/{id}', 'BlogController@show')->name('blog.show');
});

//bloga lapas kopejai apskatei
Route::get('/bloglist', [BlogListController::class, 'index'])->name('bloglist.index');

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
//lietotajs:
Route::group(['middleware' => ['auth']], function() {
    Route::Resource('dienasgramata', NoteController::class);
    Route::delete('/dienasgramata/{id}', 'NoteController@destroy')->name('dienasgramata.destroy');
    Route::get('/kaulkulators', [KaulkulatorsController::class, 'index'])->name('kal.index');
});
//arsts:
Route::group(['middleware' => ['auth']], function() {
    Route::get('/arsts', [ArstsController::class, 'index'])->name('arsts.index'); 
    Route::get('/arsts/{id}', [ArstsController::class, 'show'])->name('arsts.show');

    Route::Resource('receptes', RecepteController::class);
    Route::get('/receptes/{id}/edit', [RecepteController::class, 'edit'])->name('receptes.edit');
});

//pdf faili pa laikiem- 3, 7, un 30 dienas
Route::get('/export', [ExportController::class, 'exportToPDF'])->name('pdf.export');

//admins:
Route::group(['middleware' => ['auth']], function() {
    Route::get('/users', [RolesController::class, 'index'])->name('admin.index');
    Route::get('/users/{user}', [RolesController::class, 'show'])->name('admin.show');
    Route::get('/users/{user}/edit', [RolesController::class, 'edit'])->name('admin.edit');
    Route::put('/users/{user}', [RolesController::class, 'update'])->name('admin.update');
});







