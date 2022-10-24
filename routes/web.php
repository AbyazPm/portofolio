<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;

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
    return view('login');
});
// Route::get('/', function () {
//     return view('coba1.login');
// });

// Route::get('/mastersiswa', function () {
//     return view('mastersiswa');
// });
// Route::get('/masterproject', function () {
//     return view('masterproject');
// });
// Route::get('/mastercontact', function () {
//     return view('mastercontact');
// });
// Route::get('/admin', function () {
//     return view('dashboard');
// });

Route::get('/1', function () {
    return view('coba');
});

Route::get('/home', function () {
    return view('coba1.home');
});

Route::get('/about', function () {
    return view('coba1.about');
});

Route::get('/project', function () {
    return view('coba1.project');
});

Route::get('/contact', function () {
    return view('coba1.contact');
});


Route::middleware('auth')->group(function() {
    Route::resource('dashboard', DashboardController::class);
    Route::get('mastersiswa/{id_siswa}/hapus', [SiswaController::class, 'hapus'])->name('mastersiswa.hapus');
    Route::get('masterproject/{id_siswa}/hapus', [ProjectController::class, 'hapus'])->name('masterproject.hapus');
    Route::resource('mastersiswa', SiswaController::class);
    Route::resource('masterproject', ProjectController::class);
    Route::resource('mastercontact', ContactController::class);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
