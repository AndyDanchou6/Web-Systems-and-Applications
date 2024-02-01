<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;


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
    return view('landing_page');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login_post'])->name('login.post');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'register_post'])->name('register.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')->middleware('auth', 'isAdmin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'admin_dashboard'])->name('admin.dashboard');
    Route::get('/publish', [AdminController::class, 'publish'])->name('admin.publish');
    Route::post('/publish', [AdminController::class, 'publish_post'])->name('admin.publish_post');
    Route::get('/action', [AdminController::class, 'admin_action'])->name('admin.action');
    Route::get('/romcom', [AdminController::class, 'admin_romcom'])->name('admin.romcom');
    Route::get('/horror', [AdminController::class, 'admin_horror'])->name('admin.horror');
    Route::get('/other', [AdminController::class, 'admin_other'])->name('admin.other');
    Route::get('/isekai', [AdminController::class, 'admin_isekai'])->name('admin.isekai');
    Route::get('/edit{data}', [AdminController::class, 'admin_edit'])->name('admin.edit');
    Route::put('/update{data}', [AdminController::class, 'admin_update'])->name('admin.update');
    Route::get('/delete{id}', [AdminController::class, 'admin_delete'])->name('admin.delete');
    Route::get('/manage_account', [AdminController::class, 'manage'])->name('admin.manage');
    Route::post('/update_account', [AuthController::class, 'admin_change_pass'])->name('admin.change_pass');
    Route::get('/requests', [AdminController::class, 'requests'])->name('admin.requests');
    Route::get('/requests_edit{data}', [AdminController::class, 'edit_req'])->name('admin.edit_request');
    Route::put('/requests_publish{id}', [AdminController::class, 'pub_req'])->name('admin.publish_req');
    Route::get('/details{data}', [AdminController::class, 'details'])->name('admin.details');
    Route::get('/request_details{data}', [AdminController::class, 'req_details'])->name('admin.req_details');
    Route::get('/request_deny{data}', [AdminController::class, 'req_deny'])->name('admin.req_deny');
    Route::get('/chapter_single{data}', [AdminController::class, 'admin_viewchaps'])->name('admin.single_chap');
    
    Route::get('/chapter_updates', [AdminController::class, 'new_chaps'])->name('admin.chapter_updates');
    Route::get('/chapter_view{data}', [AdminController::class, 'view_chaps'])->name('admin.view_chapters');
    Route::post('/release_chapter', [AdminController::class, 'chap_release'])->name('admin.release_chapter');

    Route::get('/chapter_news', [AdminController::class, 'chapter_list'])->name('admin.chap_update');
    Route::get('/chapter_add{data}', [AdminController::class, 'add_chap'])->name('admin.add_chapter');
    Route::post('/chapter_post', [AdminController::class, 'chap_post'])->name('admin.chapter_post');

    Route::get('/get_chapters{data}', [AdminController::class, 'chapters'])->name('chapters');
});

Route::prefix('user')->middleware('auth', 'isUser')->group(function () {
    Route::get('/dashboard', [UserController::class, 'user_dashboard'])->name('user.dashboard');
    Route::get('/action', [UserController::class, 'user_action'])->name('user.action');
    Route::get('/romcom', [UserController::class, 'user_romcom'])->name('user.romcom');
    Route::get('/horror', [UserController::class, 'user_horror'])->name('user.horror');
    Route::get('/other', [UserController::class, 'user_other'])->name('user.other');
    Route::get('/isekai', [UserController::class, 'user_isekai'])->name('user.isekai');
    Route::get('/manage_account', [UserController::class, 'manage'])->name('user.manage');
    Route::post('/update_account', [AuthController::class, 'user_update'])->name('user.update');
    Route::get('/publish', [UserController::class, 'user_publish'])->name('user.publish');
    Route::post('/publish', [UserController::class, 'user_publish_post'])->name('user.publish_post');
    Route::get('/manga_details{data}', [UserController::class, 'manga_details'])->name('user.manga_details');
    Route::get('/mylibrary', [UserController::class, 'library'])->name('user.library');
    Route::get('/mylibrarydelete{data}', [UserController::class, 'librarydelete'])->name('user.request_details_delete');
    Route::get('/request_details{data}', [UserController::class, 'request_details'])->name('user.request_details');
    Route::get('/approved_requests', [UserController::class, 'approved_req'])->name('user.approved_requests');
    Route::get('/denied_requests', [UserController::class, 'denied_req'])->name('user.denied_requests');
    Route::get('/pending_requests', [UserController::class, 'pending_req'])->name('user.pending_requests');
    Route::get('/update_manga{data}', [UserController::class, 'manga_update'])->name('user.update_manga');
    Route::post('/chapter_post', [UserController::class, 'chapter_post'])->name('user.chapter_post');
    Route::get('/user_chapters{data}', [UserController::class, 'view_chapter'])->name('user.chapter_view');
    Route::get('/chapter_lists{data}', [UserController::class, 'chap_lists'])->name('user.chapter_lists');
    Route::get('/chapter_item{data}', [UserController::class, 'view_chapter'])->name('user.user_chapview');
});

