<?php
use App\Models\Message;
use App\Http\Controllers\TutorialController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GuestMessage;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
// Homepage
Route::get('/', [HomeController::class, 'home'])->name('home.index');
Route::get('/about', [HomeController::class, 'about'])->name('home.about');
// Message
Route::resource('message', GuestMessage::class)->only('index', 'show' ,'store', 'create');
// Authentication
Auth::routes();
// Tutorial
Route::resource('tutorial', TutorialController::class);

// Route::resource('contact', ContactFormController::class)->only('index','show', 'store', 'create');
