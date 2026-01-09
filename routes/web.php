<?php

use Illuminate\Support\Facades\Route;


// Public controllers  (pages everyone can access)
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ProductController;

// Admin controllers
use App\Http\Controllers\Admin\FaqCategoryController;
use App\Http\Controllers\Admin\FaqItemController;

/*
Public pages (no login required)

These routes are open for everyone (guests + logged-in users).
They show public content like the shop home page, news, FAQ, and profiles.
*/

// Home page (IT web shop main page)
Route::get('/', [ProductController::class, 'home'])->name('home');
// Product details page
// This route is used by the product card link: route('products.show', $product->slug)
Route::get('/products/{product:slug}', [ProductController::class, 'show'])
    ->name('products.show');

// FAQ page
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

// News pages
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

// Public user profile page
Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');

// Contact form
Route::get('/contact', [ContactController::class, 'create'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.send');

// Admin dashboard home page
Route::get('/dashboard', fn () => view('dashboard'))->name(name: 'dashboard');





/*
Logged-in users only

These routes require authentication.
 If a user is not logged in, Laravel will redirect them to the login page.

*/
Route::middleware('auth')->group(function () {

// User dashboard (after login)
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');

    // Own profile (Breeze-style) OR  Edit own profile (authenticated user)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //  Add a comment to a news item (only logged-in users can comment)
    Route::post('/news/{news}/comments', [CommentController::class, 'store'])->name('comments.store');
    //Delete a comment (usually you check permission in controller/policy)
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});


/*
Admin area  (admins only)
------------
These routes require:
- auth middleware: user must be logged in
- admin middleware: user must be admin

prefix('admin') means all URLs start with /admin/...
name('admin.') means route names start with admin....

*/


Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {


    // Admin landing page (admin dashboard)
        Route::get('/', fn () => view('admin.dashboard'))->name('dashboard');

    // Admin news management (CRUD)
    // Admin can create, edit, and delete news items

        // Admin news management (CRUD)
        Route::get('/news', [NewsController::class, 'adminIndex'])->name('news.index');
        Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
        Route::post('/news', [NewsController::class, 'store'])->name('news.store');
        Route::get('/news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
        Route::put('/news/{news}', [NewsController::class, 'update'])->name('news.update');
        Route::delete('/news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');

        // Admin FAQ management
        Route::resource('faq-categories', FaqCategoryController::class)->except('show');
        Route::resource('faq-items', FaqItemController::class)->except('show');
    });

    // Authentication routes (Laravel Breeze / Auth)
require __DIR__ . '/auth.php';
