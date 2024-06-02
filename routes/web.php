<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PersonReservationController;
use App\Http\Controllers\TourPackagesController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [HomeController::class, 'aboutus'])->name('about');
Route::get('/package-list', [HomeController::class, 'packagelist'])->name('packagelist');
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/person-reservation', [PersonReservationController::class, 'index'])->name('personreservation.index');
Route::get('/booking-list-person', [PersonReservationController::class, 'bookinglist'])->name('bookinglistperson');
Route::get('/booking-list-person-detail/{id}', [PersonReservationController::class, 'show'])->name('bookinglistperson.show');
Route::post('/person-reservation-store', [PersonReservationController::class, 'store'])->name('personreservation.store');

Route::middleware('auth')->group(function () {
  Route::get('/dashboard', DashboardController::class)->name('dashboard');
  Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
  Route::get('/bookings/edit/{id}', [BookingController::class, 'adminbookingupdate'])->name('bookings.adminbookingupdate');
  Route::get('/bookings/delete/{id}', [BookingController::class, 'destroy'])->name('bookings.destroy');
  Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
  Route::get('/bookings/reservations', [BookingController::class, 'reservation'])->name('bookings.reservations');
  Route::post('/bookings/store', [BookingController::class, 'store'])->name('bookings.store');
  Route::get('/bookings/reservations/{id}', [BookingController::class, 'edit'])->name('reservation.edit');
  Route::post('/bookings/reservations-update/{id}', [BookingController::class, 'update'])->name('reservation.update');
  Route::get('/tour-packages', [TourPackagesController::class, 'index'])->name('tourpackages.index');
  Route::get('/tour-packages/create', [TourPackagesController::class, 'create'])->name('tourpackages.create');
  Route::post('/tour-packages/store', [TourPackagesController::class, 'store'])->name('tourpackages.store');
  Route::get('/tour-packages/edit/{id}', [TourPackagesController::class, 'edit'])->name('tourpackages.edit');
  Route::post('/tour-packages/update/{id}', [TourPackagesController::class, 'update'])->name('tourpackages.update');
  Route::get('/tour-packages/delete/{id}', [TourPackagesController::class, 'destroy'])->name('tourpackages.delete');
});
