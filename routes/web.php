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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profileEdit');
Route::post('/profile/edit', [App\Http\Controllers\ProfileController::class, 'update'])->name('profileeditor');

Route::get('/mypets', [App\Http\Controllers\PetController::class, 'index'])->name('mypets');
Route::get('/mypets/add', [App\Http\Controllers\PetController::class, 'addnew'])->name('mypetsaddnew');
Route::post('/mypets', [App\Http\Controllers\PetController::class, 'store'])->name('mypetsstorenew');
Route::get('/mypets/edit/{petid}', [App\Http\Controllers\PetController::class, 'edit'])->name('petedit');
Route::delete('/mypets/remove/{petid}', [App\Http\Controllers\PetController::class, 'remove'])->name('remove');
Route::post('/mypets/edit', [App\Http\Controllers\PetController::class, 'update'])->name('peteditpost');
Route::get('/myphotos',[App\Http\Controllers\ProfileController::class, 'editphotos'])->name('editphotos');
Route::post('/photodelete', [App\Http\Controllers\ProfileController::class, 'photodelete'])->name('photodelete');


Route::get('/findpet', [App\Http\Controllers\FindPetController::class, 'index'])->name('findpet');
Route::post('/findpet/show', [App\Http\Controllers\FindPetController::class, 'showresults'])->name('findpetshow');
Route::post('findpet/details', [App\Http\Controllers\FindPetController::class, 'showpet'])->name('showpet');


Route::get('/organization', [App\Http\Controllers\ShelterController::class, 'index'])->name('organizations');



