<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BandController;
use App\Http\Controllers\BackofficeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');;

Route::get('/',
[HomeController::class, 'index']
)->name('home');




Route::post('/register',
[UserController::class, 'register']
)->name('register');


Route::get(
    '/view_band/id={id}',
    [BandController::class, 'viewBand']
)->name('show_band');

Route::get('/bandas',[BandController::class, 'all_bands'])->name('bands');




Route::get('/delete_band{id}',[BandController::class, 'deleteBand'])->name('delete_band');
Route::get('/delete_album{id}',[BandController::class, 'deleteAlbum'])->name('delete_album');
Route::get('/add_band',   [BackofficeController::class, 'addBand'])->name('add_Band');
Route::get('/add_album',   [BackofficeController::class, 'addAlbum'])->name('add_Album');
Route::get('/edit_band/id={id}', [BackofficeController::class, 'editarBanda'])->name('editBand');
Route::post('/editar_banda',[BackofficeController::class, 'editBand'])->name('editarBanda');
Route::post('/create_banda',[BackofficeController::class, 'createBand'])->name('create_band');
Route::post('/create_album',[BackofficeController::class, 'createAlbum'])->name('create_album');
Route::get('/backoffice',[BackofficeController::class, 'index'])->name('backoffice');

Route::get('/edit_album/id={id}', [BackofficeController::class, 'editarAlbum'])->name('editAlbum');
Route::post('/editar_album',[BackofficeController::class, 'editAlbum'])->name('editarAlbum');
