<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StripeController;

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

Route::post('/stripe/checkout', [StripeController::class, 'initialize'])->name('stripe.pay');
Route::post('/stripe/success', [StripeController::class, 'callback'])->name('stripe.callback');


Route::get('/', [HomeController::class, 'index']);
Route::get('/states', [HomeController::class, 'State'])->name('states');
Route::get('/partners', [HomeController::class, 'Partner'])->name('partners');
Route::get('/volunteers', [HomeController::class, 'Volunteers'])->name('volunteers');
Route::get('/donate', [HomeController::class, 'Donate'])->name('donate');
Route::get('/ready-to-vote-abia', [HomeController::class, 'ReadyToVote'])->name('readytovote');
Route::get('/frequently-asked-questions', [HomeController::class, 'FAQ'])->name('faqs');

Route::get('/galleries', [HomeController::class, 'gallery'])->name('galleries');
Route::get('/about-us', [HomeController::class, 'AboutUs'])->name('aboutus');
Route::get('/privacy-policy', [HomeController::class, 'Privacy'])->name('privacy');
Route::get('/terms-of-use', [HomeController::class, 'Terms'])->name('terms');
Route::get('/contact-us', [HomeController::class, 'ContactUs'])->name('contact');
Route::post('/contact-us-post', [HomeController::class, 'postMessage'])->name('site.contact.post');
Route::post('/become-a-volunteer', [HomeController::class, 'postVolunteer'])->name('become.volunteer.post');
Route::post('/become-a-partner', [HomeController::class, 'postPartner'])->name('become.partner.post');
