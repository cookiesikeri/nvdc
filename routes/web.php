<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminLoginController;

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

Route::post('/stripe/checkout', [StripeController::class, 'initialize'])->name('stripe.pay');
Route::post('/stripe/success', [StripeController::class, 'callback'])->name('stripe.callback');

Route::get('/', [HomeController::class, 'index']);
Route::get('/donate', [HomeController::class, 'Donate'])->name('donate');
Route::get('/partners', [HomeController::class, 'Partner'])->name('partners');
Route::get('/volunteers', [HomeController::class, 'Volunteers'])->name('volunteers');
Route::post('/submit-feedback', [HomeController::class, 'posFeedback'])->name('feedback.post');

Route::post('/contact-us-post', [HomeController::class, 'postMessage'])->name('site.contact.post');
Route::post('/become-a-volunteer', [HomeController::class, 'postVolunteer'])->name('become.volunteer.post');
Route::post('/become-a-partner', [HomeController::class, 'postPartner'])->name('become.partner.post');
Route::post('/newsletter-post', [HomeController::class, 'postNews'])->name('news.letter.post');
