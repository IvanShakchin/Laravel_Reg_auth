<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Address; 
use App\Http\Controllers\AddressController;
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


// посредник после авторизации запускает verified 
// для проверки веррификации email
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// создаем страницу для авторизованного пользователя с повтроным вводом пароля
Route::get('/sendpayment', function () {
    return 'send payment';

// })->middleware(['auth', 'verified']); // просто авторизован

})->middleware(['password.confirm', 'verified']); // доп ввод пароля


Route::get('/profile', function () {
    return 'profile';
    // необходимо базовая авторизация
})->middleware('auth.basic'); 


Route::get('/createaddress', function () {
    return 'Можно созать новый адрес';
    // use App\Models\Address; 
    // проверка пользователя на доступ к модели
})->middleware('can:create,App\Models\Address'); 


Route::get('/viewaddress/{address}', function (Address $address) {
    return 'Можно посмотреть этот адресс: '.$address->id;
    // проверка пользователя на доступ к модели
})->middleware('can:view,address'); 


Route::resource('addresses', AddressController::class);



require __DIR__.'/auth.php';
