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

// Home routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [AdminController::class, 'index'])->name('index');

// Admin dashboard
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Logout
Route::post('logout', [AdminController::class, 'logout'])->name('logout');

// Event management
Route::get('/create_event', [AdminController::class, 'create_event'])->name('create_event');
Route::post('/add_event', [AdminController::class, 'add_event'])->name('add_event');
Route::get('/view_event', [AdminController::class, 'view_event'])->name('view_event');
Route::get('/event_delete/{id}', [AdminController::class, 'event_delete'])->name('event_delete');
Route::get('/event_update/{id}', [AdminController::class, 'event_update'])->name('event_update');
Route::post('/edit_event/{id}', [AdminController::class, 'edit_event'])->name('edit_event');

// Event details and bookings
Route::get('/event_details/{id}', [HomeController::class, 'event_details'])->name('event_details');
Route::post('/add_booking/{id}', [HomeController::class, 'add_booking'])->name('add_booking');

// Bookings management
Route::get('/bookings', [AdminController::class, 'bookings'])->middleware(['auth', 'admin'])->name('bookings');
Route::get('/delete_booking/{id}', [AdminController::class, 'delete_booking'])->name('delete_booking');
Route::get('/approve_book/{id}', [AdminController::class, 'approve_book'])->name('approve_book');
Route::get('/reject_booking/{id}', [AdminController::class, 'reject_booking'])->name('reject_booking');

// Gallery management
Route::get('/view_gallary', [AdminController::class, 'view_gallary'])->name('view_gallary');
Route::post('/upload_gallary', [AdminController::class, 'upload_gallary'])->name('upload_gallary');
Route::get('/delete_gallary/{id}', [AdminController::class, 'delete_gallary'])->name('delete_gallary');

// Contact and messages
Route::post('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/all_messages', [AdminController::class, 'all_messages'])->name('all_messages');
Route::get('/send_mail/{id}', [AdminController::class, 'send_mail'])->name('send_mail');
Route::post('/mail/{id}', [AdminController::class, 'mail'])->name('mail');

// Comments
Route::post('/events/{event}/comments', [CommentController::class, 'store'])->name('events.comments.store');

// Notifications
Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
Route::get('/notifications/unread-count', [NotificationController::class, 'unreadCount'])->name('notifications.unread_count');
Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.mark_as_read');
Route::post('/notifications/mark-all-read', [NotificationController::class, 'markAllAsRead'])->name('notifications.mark_all_as_read');

// User profile
Route::get('/profile', [ProfileUserController::class, 'show'])->middleware('auth')->name('user.profile');