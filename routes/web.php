<?php
use App\Http\Controllers\IphoneController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use \App\Mail\WelcomeMail;

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
Route::get('/home', [IphoneController::class, 'index1']);


Route::get('/', [IphoneController::class, 'index1']);


Route::get('/register', [RegisterController::class, 'create'])->middleware('auth');
Route::post('/register', [RegisterController::class, 'store'])->middleware('auth');

//login
Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('session', [SessionController::class, 'store'])->name('login');

//logout
Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');

//users crud
Route::get('/users/index', [RegisterController::class, 'index']);
Route::get('/users/{user}/edit', [RegisterController::class, 'edit'])->name('users.edit');
Route::get('/users/{user}/delete', [RegisterController::class, 'destroy'])->name('users.delete');
Route::get('/users/{user}/update', [RegisterController::class, 'update'])->name('users.update');


//iphone crud
Route::get('/admin/index', [IphoneController::class, 'index']);
Route::get('/admin/create', [IphoneController::class, 'create']);
Route::get('/admin/{iphone}/show', [IphoneController::class, 'show'])->name('admin.show');
Route::post('/admin/store', [IphoneController::class, 'store']);
Route::get('/admin/{iphone}/delete', [IphoneController::class, 'destroy'])->name('admin.delete');
Route::get('/admin/{iphone}/edit', [IphoneController::class, 'edit'])->name('admin.edit');
Route::get('/admin/{iphone}/update', [IphoneController::class, 'update'])->name('admin.update');


//route for mailing

Route::get('/email', function () {
    return new WelcomeMail();
});

Route::get('/send-email', [\App\Http\Controllers\MailController::class, 'sendEmail']);
