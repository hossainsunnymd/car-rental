<?php

use App\Http\Controllers\Admin\AdminCarController;
use App\Http\Controllers\Admin\AdminCustomerController;
use App\Http\Controllers\Admin\AdminRentalController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\CarController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\RentalController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\TokenVerificationMiddleware;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//cars
Route::get('/car-list',[CarController::class,'carList'])->name('carList');
Route::get('/car-list-by-type/{type}',[CarController::class,'carListByType'])->name('carListByType');
Route::get('/car-list-by-brand/{brand}',[CarController::class,'carListByBrand'])->name('carListByBrand');
Route::get('/car-list-by-price/{price}',[CarController::class,'carListByPrice'])->name('carListByPrice');
Route::get('/car-details/{id}',[CarController::class,'carDetails'])->name('carDetails');

//auth
Route::post('/user-registration',[UserController::class,'userRegistration'])->name('userRegistration');
Route::post('/user-login',[UserController::class,'login'])->name('userLogin');

//pages
Route::get('/sign-up-page',[PageController::class,'signUpPage'])->name('signUpPage');
Route::get('/sign-in-page',[PageController::class,'signInPage'])->name('signInPage');
Route::get('/logout',[PageController::class,'logout'])->name('logout');
Route::get('/about-page',[PageController::class,'aboutPage'])->name('aboutPage');
Route::get('/contact-page',[PageController::class,'contactPage'])->name('contactPage');
Route::get('/home',[PageController::class,'home'])->name('home');



//admin
Route::middleware([TokenVerificationMiddleware::class,AdminMiddleware::class])->group(function () {
    //dashboard
    Route::get('/admin/dashboard',[PageController::class,'adminDashboard'])->name('adminDashboard');
    Route::get('/admin/read-profile',[UserController::class,'adminReadProfile'])->name('adminReadProfile');
    Route::post('/update-profile',[UserController::class,'updateProfile'])->name('updateProfile');

    //cars
    Route::get('/admin/car-list',[AdminCarController::class,'carList'])->name('AdmincarList');
    Route::get('/admin/car-save-page',[AdminCarController::class,'carSavePage'])->name('AdmincarSavePage');
    Route::post('/admin/car-save',[AdminCarController::class,'carSave'])->name('AdmincarSave');
    Route::post('/admin/car-update',[AdminCarController::class,'carUpdate'])->name('AdmincarUpdate');
    Route::get('/admin/car-delete',[AdminCarController::class,'carDelete'])->name('AdmincarDelete');
    Route::get('/admin/car-show-page',[AdminCarController::class,'carDetailsPage'])->name('carDetailsPage');

    //rentals
    Route::get('/admin/rental-list',[AdminRentalController::class,'rentals'])->name('Adminrentals');
    Route::get('/admin/rental-save-page',[AdminRentalController::class,'rentalSavePage'])->name('AdminrentalSavePage');
    Route::Post('/admin/rental-save',[AdminRentalController::class,'rentalSave'])->name('AdminrentalSave');
    Route::Post('/admin/rental-update',[AdminRentalController::class,'rentalUpdate'])->name('AdminrentalUpdate');
    Route::get('/admin/rental-delete',[AdminRentalController::class,'rentalDelete'])->name('AdminrentalDelete');
    Route::get('/admin/rental-show-page',[AdminRentalController::class,'rentalShowPage'])->name('rentalShowPage');


    //customers
    Route::get('/admin/customer-list-page',[AdminCustomerController::class,'customerListPage'])->name('customerListPage');
    Route::get('/admin/customer-save-page',[AdminCustomerController::class,'customerSavePage'])->name('customerSavePage');
    Route::post('/admin/customer-save',[AdminCustomerController::class,'customerSave'])->name('customerSave');
    Route::post('/admin/customer-update',[AdminCustomerController::class,'customerUpdate'])->name('customerUpdate');
    Route::get('/admin/customer-delete',[AdminCustomerController::class,'customerDelete'])->name('customerDelete');
    Route::get('/admin/customer-show-page',[AdminCustomerController::class,'customerShowPage'])->name('customerShowPage');

});




//Frontend
Route::middleware([TokenVerificationMiddleware::class])->group(function (){

//customers
Route::get('/customer/dashboard',[PageController::class,'customerDashboard'])->name('customerDashboard');
Route::get('/customer/rentals',[RentalController::class,'rentals'])->name('rentals');
Route::get('/customer/cancel-rental',[RentalController::class,'cancelRental'])->name('cancelRental');
Route::get('/customer/rental-history',[RentalController::class,'rentalHistory'])->name('rentalHistory');
Route::get('/customer/read-profile',[UserController::class,'customerReadProfile'])->name('customerReadProfile');
Route::post('/update-profile',[UserController::class,'updateProfile'])->name('updateProfile');


//rentals
Route::get('/rental-page',[PageController::class,'rentalPage'])->name('rentalPage');
Route::post('/car-rental',[RentalController::class,'rentCar'])->name('rentCar');


});

