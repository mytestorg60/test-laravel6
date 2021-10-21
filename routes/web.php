 <?php

 use App\Http\Controllers\MailSender;
 use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;

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

Route::get('/dashboard', [Dashboard::class, 'index'] )->middleware(['auth'])->name('dashboard');

Route::get('mail', [MailSender::class, 'index'])->middleware(['auth'])->name('mail');

require __DIR__.'/auth.php';
