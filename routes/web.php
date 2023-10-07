<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\IdeaLikeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('feed', FeedController::class)->name('feed');
Route::group(['prefix' => 'ideas', 'as' => 'idea.', 'middleware' => 'auth'], function () {

    //profile
    Route::get('profile', [UserController::class, 'profile'])->name('profile');

    //idea rotue
    Route::post('', [IdeaController::class, 'store'])->name('create');
    Route::delete('/{idea}', [IdeaController::class, 'destroy'])->name('destroy');
    Route::get('{idea}', [IdeaController::class, 'show'])->name('show');
    Route::get('/{idea}/edit', [IdeaController::class, 'edit'])->name('edit');
    Route::put('/{idea}/update', [IdeaController::class, 'update'])->name('update');

    //comment route
    Route::post('/{idea}/comments', [CommentController::class, 'store'])->name('comment.store');

    //User
    Route::resource('users', UserController::class)->only('show')->withoutMiddleware('auth');
    Route::resource('users', UserController::class)->only('edit', 'update');
});

Route::post('users/{user}/follow', [FollowerController::class, 'follow'])->middleware('auth')->name('user.follow');
Route::post('users/{user}/unfollow', [FollowerController::class, 'unfollow'])->middleware('auth')->name('user.unfollow');


Route::post('ideas/{idea}/like', [IdeaLikeController::class, 'like'])->middleware('auth')->name('ideas.like');
Route::post('ideas/{idea}/unlike', [IdeaLikeController::class, 'unlike'])->middleware('auth')->name('ideas.unlike');



Route::get('/terms', function () {
    return view('terms');
})->name('terms');

Route::get('admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware(['auth','can:admin']);
