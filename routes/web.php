<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileUserController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

Route::post('logout', [AdminController::class, 'logout'])->name('logout');

//Route::get('/', [AdminController::class, 'home']);


Route::get('/create_event', [AdminController::class, 'create_event']);
Route::post('/add_event', [AdminController::class, 'add_event']);

Route::get('/view_event', [AdminController::class, 'view_event']);
Route::get('/event_delete/{id}', [AdminController::class, 'event_delete']);
Route::get('/event_update/{id}', [AdminController::class, 'event_update']);
Route::post('/edit_event/{id}', [AdminController::class, 'edit_event']);

Route::get('/event_details/{id}', [HomeController::class, 'event_details'])->name('event_details');
Route::post('/add_booking/{id}', [HomeController::class, 'add_booking']);

Route::get('/bookings', [AdminController::class, 'bookings'])->middleware(['auth','admin']);
Route::get('/delete_booking/{id}', [AdminController::class, 'delete_booking']);
Route::get('/approve_book/{id}', [AdminController::class, 'approve_book']);
Route::get('/reject_booking/{id}', [AdminController::class, 'reject_booking']);

Route::get('/view_gallary', [AdminController::class, 'view_gallary']);
Route::post('/upload_gallary', [AdminController::class, 'upload_gallary']);
Route::get('/delete_gallary/{id}', [AdminController::class, 'delete_gallary']);

Route::post('/contact', [HomeController::class, 'contact']);
Route::get('/all_messages', [AdminController::class, 'all_messages']);
Route::get('/send_mail/{id}', [AdminController::class, 'send_mail']);
Route::post('/mail/{id}', [AdminController::class, 'mail']);

Route::post('/events/{event}/comments', [CommentController::class, 'store'])->name('events.comments.store');

Route::get('/notifications', [NotificationController::class, 'index']);
Route::get('/notifications/unread-count', [NotificationController::class, 'unreadCount']);
Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead']);
Route::post('/notifications/mark-all-read', [NotificationController::class, 'markAllAsRead']);

Route::get('/profile', [ProfileUserController::class, 'show'])->middleware('auth')->name('user.profile');

