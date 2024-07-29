<?php

use Illuminate\Support\Facades\Route;

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

Route::get('', function () {

});

Route::get('/',[\App\Http\Controllers\HomeController::class,'index'])->name('home');
Route::get('/blog/{id}',[\App\Http\Controllers\BlogController::class, 'blog'])->name('blog');
Route::view('/autor', 'pages.autor')->name('autor');


Route::middleware(['notAuth'])->group(function (){
    Route::get('/logInForm',[\App\Http\Controllers\KorisnikController::class, 'logInForm'])->name('logInForm');
    Route::post('/logIn',[\App\Http\Controllers\KorisnikController::class, 'logIn'])->name('logIn');
    Route::get('/registerForm',[\App\Http\Controllers\KorisnikController::class, 'registerForm'])->name('registerForm');
    Route::post('/register',[\App\Http\Controllers\KorisnikController::class, 'register'])->name('register');
});
Route::get('/logOut',[\App\Http\Controllers\KorisnikController::class,'logOut'])->name('logOut');
Route::get('/like', [\App\Http\Controllers\BlogController::class, 'like'])->name('like');
Route::get('/unlike', [\App\Http\Controllers\BlogController::class, 'unlike'])->name('unlike');
Route::get('/dodajKomentar',[\App\Http\Controllers\BlogController::class, 'dodajKomentar'])->name('dodajKomentar');
Route::get('/editKom', [\App\Http\Controllers\BlogController::class, 'editKom'])->name('editKom');
Route::get('/blogovi',[\App\Http\Controllers\BlogController::class, 'blogovi'])->name('blogovi');
Route::get('/filter',[\App\Http\Controllers\BlogController::class, 'filterBlogovi'])->name('filterBlogovi');
Route::view('/kontakt','pages.kontakt')->name('kontakt');
Route::get('/posaljiPoruku',[\App\Http\Controllers\KorisnikController::class,'posaljiPoruku'])->name('posaljiPoruku');
Route::get('/obrisiKom',[\App\Http\Controllers\BlogController::class, 'deleteCom'])->name('deleteKom');
//ADMIN
Route::prefix('admin')->middleware('isAdmin')->group(function (){
    Route::get('/home',[\App\Http\Controllers\HomeController::class,'adminHome'])->name('adminHome');
    Route::get('/navNotification',[\App\Http\Controllers\HomeController::class,'adminNavNot']);
    Route::get('/procitanaPoruka',[\App\Http\Controllers\HomeController::class, 'procitanaPoruka'])->name('procitanaPoruka');
    Route::get('/procitanaAkcija',[\App\Http\Controllers\HomeController::class, 'procitanaAkcija'])->name('procitanaAkcija');
    Route::resource('/blogovi',\App\Http\Controllers\AdminBlogController::class);
    Route::resource('/poruke', \App\Http\Controllers\AdminPorukeController::class);
    Route::resource('/korisnici',\App\Http\Controllers\AdminUserController::class);
    Route::resource('/podnaslov',\App\Http\Controllers\AdminPodnaslovController::class);
    Route::resource('/aktivnosti',\App\Http\Controllers\AdminAktivnostController::class);
    Route::get('/filterAktivnosti',[\App\Http\Controllers\AdminAktivnostController::class,'filter']);
    Route::get('/dodajKategoriju',[\App\Http\Controllers\AdminController::class,'dodajKategoriju'])->name('dodajKat');
    Route::get('/obrisiKom/{id}',[\App\Http\Controllers\AdminController::class,'deleteCom'])->name('deleteCom');
});

