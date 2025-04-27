<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;


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

// routes/web.php

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

Route::post('logout', [AdminController::class, 'logout'])->name('logout');

route::get('/',[AdminController::class,'home']);


route::get('/home',[AdminController::class,'index'])->name('home');

route::get('/create_event',[AdminController::class,'create_event']);


route::post('/add_event',[AdminController::class,'add_event']);

route::get('/view_event',[AdminController::class,'view_event']);

route::get('/event_delete/{id}',[AdminController::class,'event_delete']);

route::get('/event_update/{id}',[AdminController::class,'event_update']);

route::post('/edit_event/{id}',[AdminController::class,'edit_event']);


route::get('/event_details/{id}',[HomeController::class,'event_details']);

route::post('/add_booking/{id}',[HomeController::class,'add_booking']);


route::get('/bookings',[AdminController::class,'bookings'])->middleware(['auth','admin']);


route::get('/delete_booking/{id}',[AdminController::class,'delete_booking']);

route::get('/approve_book/{id}',[AdminController::class,'approve_book']);

route::get('/reject_booking/{id}',[AdminController::class,'reject_booking']);

route::get('/view_gallary',[AdminController::class,'view_gallary']);

route::post('/upload_gallary',[AdminController::class,'upload_gallary']);

route::get('/delete_gallary/{id}',[AdminController::class,'delete_gallary']);


route::post('/contact',[HomeController::class,'contact']);


route::get('/all_messages',[AdminController::class,'all_messages']);

route::get('/send_mail/{id}',[AdminController::class,'send_mail']);


route::post('/mail/{id}',[AdminController::class,'mail']);

