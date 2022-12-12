<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\BooksshowController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\StudentController;
use App\Models\Books;
use Illuminate\Support\Facades\Route;

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

// edit book
Route::get('/edit/{id}',[BooksController::class,'editbook'])->name('edit.book');
// update book
Route::put('update/{id}',[BooksController::class,'updatebook'])->name('update.book');
// delete book
Route::get('/delete/{id}',[BooksController::class,'deletebook'])->name('delete.book');
// get books of the category to users
Route::get('getbooks/{id}',[BooksshowController::class,'getbooks'])->name('get.books');


 // add cart to cart || controller to all book
Route::post('add_to_cart\{id}',[CartController::class,'caddCart'])->name('cart.add');

// Render all category panel
Route::get('all-categories',[BooksController::class,'allcate'])->name('all-categories');

// delete category
Route::get('delete/{id}',[BooksController::class,'deletecate'])->name('delete-cate');


// Unauthenticated group
Route::group(array('before' => 'guest'), function() {

	// CSRF protection
	Route::group(array('before' => 'csrf'), function() {

		// Create an account (POST)
        Route::post('/create', [AccountController::class, 'postCreate'])->name('account-create-post');

		// Sign in (POST)
        Route::post('/sign-in', [AccountController::class, 'postSignIn'])->name('account-sign-in-post');

	
	});

	// Sign in (GET)
    Route::get('/', [AccountController::class, 'getSignIn'])->name('account-sign-in');

	// Create an account (GET)
    Route::get('/create', [AccountController::class, 'getCreate'])->name('account-create');

    // Render search books panel
    Route::get('/book', [BooksController::class, 'searchBook'])->name('search-book');

});

// Main books Controlller left public so that it could be used without logging in too
Route::resource('/books', BooksController::class);

// Authenticated group
// Route::group(array('before' => 'auth'), function() {
Route::group(['middleware' => ['auth']] , function() {

	// Home Page of Control Panel
    Route::get('/home', [HomeController::class, 'home'])->name('home');

	// Render Add Books panel
    Route::get('/add-books', [BooksController::class, 'renderAddBooks'])->name('add-books');
    Route::post('/books', [BooksController::class, 'store'])->name('books.store');

    Route::get('/add-book-category', [BooksController::class, 'renderAddBookCategory'])->name('add-book-category');

    Route::post('/bookcategory', [BooksController::class, 'BookCategoryStore'])->name('bookcategory.store');


	// Render All Books panel
    Route::get('/all-books', [BooksController::class, 'renderAllBooks'])->name('all-books');


    Route::get('/bookBycategory/{cat_id}', [BooksController::class, 'BookByCategory'])->name('bookBycategory');

    // Issue Logs
    Route::get('/issue-return', [LogController::class, 'renderIssueReturn'])->name('issue-return');

    // Render logs panel
    Route::get('/currently-issued', [LogController::class, 'renderLogs'])->name('currently-issued');

    Route::resource('/issue-log', LogController::class);

	// Sign out (GET)
    Route::get('/sign-out', [AccountController::class, 'getSignOut'])->name('account-sign-out');

});
