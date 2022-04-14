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


// Admin Login Routes ***
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'login'])->name('admin.login');
    Route::get('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    Route::post('/login', [AdminLoginController::class, 'loginAdmin'])->name('admin.login.submit');
    Route::get('cms', [AdminController::class, 'adminIndex'])->name('cms.index');
});


Route::prefix('cms')->group(function () {
    Route::get('site-settings', [AdminController::class, 'site_configuration'])->name('cms.site.settings');
    Route::put('site-settings', [AdminController::class, 'site_configuration_update'])->name('cms.site-settings.update');



//    ***pages routes***
    Route::get('home-intro', [AdminController::class, 'Homeintro'])->name('cms.homeintro');
    Route::get('ready-to-vote-images', [AdminController::class, 'RTV'])->name('cms.rtvimages');
    Route::get('about', [AdminController::class, 'AdminAbout'])->name('cms.about');
    Route::get('sliders', [AdminController::class, 'AdminSliders'])->name('cms.sliders');
    Route::get('volunteers', [AdminController::class, 'AdminVolunteer'])->name('cms.volunteers');
    Route::get('pending-volunteers', [AdminController::class, 'AdminPendingVolunteer'])->name('cms.pendingvolunteers');
    Route::get('faqs', [AdminController::class, 'AdminFaq'])->name('cms.faqs');
    Route::get('gallery', [AdminController::class, 'AdminGallery'])->name('cms.gallery');
    Route::get('privacy-policy', [AdminController::class, 'AdminPrivacy'])->name('cms.privacy');
    Route::get('Terms-of-use', [AdminController::class, 'AdminTermsofUse'])->name('cms.terms');
    Route::get('feedbacks', [AdminController::class, 'AdminFeedback'])->name('cms.feedbacks');
    Route::get('pending-feedbacks', [AdminController::class, 'AdminPendingFeedback'])->name('cms.pendingfeedbacks');
    Route::get('clients', [AdminController::class, 'AdminClients'])->name('cms.clients');
    Route::get('contact', [AdminController::class, 'AdminContact'])->name('cms.contact');
    Route::get('donations', [AdminController::class, 'AdminDonations'])->name('cms.donations');
    Route::get('programs', [AdminController::class, 'AdminEvents'])->name('cms.programs');
    Route::get('projects', [AdminController::class, 'AdminProjects'])->name('cms.projects');
    Route::put('team/{id}', [AdminController::class, 'teamupdate'])->name('cms.team.update');
    Route::get('team/{id}', [AdminController::class, 'teamshow']);
    Route::put('creed-update', [AdminController::class, 'Updatecreed'])->name('cms.aboutmore.update');
    Route::put('homesub-update', [AdminController::class, 'UpdateHomeSub'])->name('cms.homesub.update');

    // **action routes


    Route::put('pendingvolunteer/{id}', [AdminController::class, 'Pendingvolunteerupdate'])->name('cms.pendingvolunteer.update');
    Route::get('pendingvolunteer/{id}', [AdminController::class, 'pendingvolunteerShow']);
    Route::put('pendingfeedbacks/{id}', [AdminController::class, 'Pendingfeedbacksupdate'])->name('cms.pendingfeedbacks.update');
    Route::get('pendingfeedbacks/{id}', [AdminController::class, 'pendingfeedbacksShow']);
    Route::put('upcomingevent/{id}', [AdminController::class, 'UpcomingEventUpdate'])->name('cms.upcoming.update');
    Route::get('upcomingevent/{id}', [AdminController::class, 'UpcomingEventshow']);
    Route::put('faqs/{id}', [AdminController::class, 'FaqUpdate'])->name('cms.faqs.update');
    Route::get('faqs/{id}', [AdminController::class, 'Faqshow']);

    Route::put('projects/{id}', [AdminController::class, 'ProjectUpdate'])->name('cms.projects.update');
    Route::get('projects/{id}', [AdminController::class, 'projectShow']);
    Route::get('about/{page}/{id}', [AdminController::class, 'show'])->name('cms.show');
    Route::post('about/{page}', [AdminController::class, 'store'])->name('cms.store');

    Route::get('delete/{page}/{id}', [AdminController::class, 'destroy'])->name('cms.destroy');



    Route::get('sitesettings', [AdminController::class, 'site_configuration'])->name('cms.settings');
    Route::put('site-settings', [AdminController::class, 'site_configuration_update'])->name('cms.site-settings.update');
    Route::put('slider/{slider}', [AdminController::class,'sliders'])->name('admin.slider.update');
    Route::get('delete/{slider}', [AdminController::class, 'deleteslider'])->name('admin.slider.delete');

    Route::put('explore/{page}/{id}', [AdminController::class, 'update'])->name('cms.update');


});

        //create user routes ***
        Route::redirect('users', 'users/index', 301);
        Route::get('all/roles', [AdminController::class, 'roles'])->name('cms.user.roles');
        Route::post('roles', [AdminController::class, 'createRole'])->name('cms.roles.store');
        Route::post('roles/roles/permissions/update', [AdminController::class, 'permissionUpdate'])->name('cms.roles.permissions.update');
        Route::get('users/index', [AdminController::class, 'allUsers'])->name('cms.users.index');
        Route::post('users/store', [AdminController::class, 'createAccount'])->name('cms.users.store');
        Route::get('users/edit/{id}', [AdminController::class, 'editAccount'])->name('cms.users.edit');
        Route::put('users/update', [AdminController::class, 'updateAccount'])->name('cms.users.update');
        Route::get('users/delete/{id}', [AdminController::class, 'deleteAccount'])->name('cms.users.delete');
        Route::get('roles/delete/{id}', [AdminController::class, 'roleDestroy'])->name('roles.delete');
