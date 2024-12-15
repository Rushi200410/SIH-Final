<?php

//use Illuminate\Support\Facades\Route;



use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\SansthasController;
// use App\Http\Controllers\DonorsController;
// use App\Http\Controllers\ReceiptsController;
// use App\Http\Controllers\DonationHeadController;
// use App\Http\Controllers\UsersController;
// use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\LoginController; // Corrected namespace
use App\Http\Controllers\RailController; // Corrected namespace
use App\Http\Controllers\MailController;

// use App\Http\Controllers\authentications\LoginBasic;
// use App\Http\Controllers\icons\Boxicons;

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
// Route::get('/', function () {
//     return view('welcome');
//  });

Route::get('/', [LoginController::class, 'index'])->name('SIH_H.login');
Route::post('/', [LoginController::class, 'loginvarify'])->name('loginvarify');

Route::group(['middleware' => "web"], function () {

    // // receipts
    // Route::get('/receipts', [ReceiptsController::class, 'show'])->name('receipts');
    // Route::get('/receipts/add', [ReceiptsController::class, 'create'])->name('receipts.add');
    // Route::post('/receipts/add', [ReceiptsController::class, 'store'])->name('receipts.store');
    // Route::get('/receipts/view/{id}/{token_no}', [ReceiptsController::class, 'view'])->where('id', '[0-9]+')->name('receipt.show');
    // Route::get('/receipts/update/{id}/{token_no}', [ReceiptsController::class, 'edit'])->where('id', '[0-9]+')->name('receipts.update');
    // Route::post('/receipts/update/{id}/{token_no}', [ReceiptsController::class, 'update'])->where('id', '[0-9]+')->name('receipts.update');
    // Route::get('/receipts/delete/{id}/{token_no}', [ReceiptsController::class, 'destroy'])->where('id', '[0-9]+')->name('receipts.delete');

    // Route::get('/receipts/{id}/{token_no}/pdf', [ReceiptsController::class, 'pdf'])->where('id', '[0-9]+')->name('receipts.pdf')->withoutMiddleware('web');
    // Route::get('/receipts/{id}/mail', [ReceiptsController::class, 'mail'])->where('id', '[0-9]+')->name('receipts.mail');

    // Route::post('/receipts/amount/paid/{id}/{token_no}', [ReceiptsController::class, 'is_paid'])->where('id', '[0-9]+')->name('receipts.is_paid');

    // //sansthas
    // Route::get('/sansthas/donation-heads/', [ReceiptsController::class, 'getDonationHeads'])->where('id', '[0-9]+')->name('sansthas.donation-heads');
    // Route::get('/sansthas', [SansthasController::class, 'show'])->name('sansthas');
    // Route::get('/sansthas/add', [SansthasController::class, 'create'])->name('sansthas.add');
    // Route::post('/sansthas/add', [SansthasController::class, 'store'])->name('sansthas.store');
    // Route::get('/sansthas/update/{id}/{token_no}', [SansthasController::class, 'edit'])->where('id', '[0-9]+')->name('sansthas.update');
    // Route::post('/sansthas/update/{id}/{token_no}', [SansthasController::class, 'update'])->where('id', '[0-9]+')->name('sansthas.update');
    // Route::get('/sansthas/delete/{id}/{token_no}', [SansthasController::class, 'destroy'])->where('id', '[0-9]+')->name('sansthas.delete');

    // // Donation Heads.
    // Route::get('/donation-heads/parent', [DonationHeadController::class, 'getDonationHeads'])->where('sanstha_id' , '[0-9]+')->name('donation-heads.parent');
    // Route::get('/donation-heads', [DonationHeadController::class, 'show'])->name('donation-heads.show');
    // Route::get('/donation-heads/add', [DonationHeadController::class, 'create'])->name('donation-heads.add');
    // Route::post('/donation-heads/add', [DonationHeadController::class, 'store'])->name('donation-heads.store');
    // Route::get('/donation-heads/update/{id}/{token_no}', [DonationHeadController::class, 'edit'])->where('id', '[0-9]+')->name('donation-heads.update');
    // Route::post('/donation-heads/update/{id}/{token_no}', [DonationHeadController::class, 'update'])->where('id', '[0-9]+')->name('donation-heads.update');
    // Route::get('/donation-heads/delete/{id}/{token_no}', [DonationHeadController::class, 'destroy'])->where('id', '[0-9]+')->name('donation-heads.delete');

    // // Donors.
    // Route::get('/donors/add', [DonorsController::class, 'create'])->name('donors.add');
    // Route::post('/donors/add', [DonorsController::class, 'store'])->name('donors.store');
    // Route::get('/donors', [DonorsController::class, 'show'])->name('donors');
    // Route::get('/donors/update/{id}/{token_no}', [DonorsController::class, 'edit'])->where('id', '[0-9]+')->name('donors.update');
    // Route::post('/donors/update/{id}/{token_no}', [DonorsController::class, 'update'])->where('id', '[0-9]+')->name('donors.update');
    // Route::get('/donors/delete/{id}/{token_no}', [DonorsController::class, 'destroy'])->where('id', '[0-9]+')->name('donors.delete');
    // Route::get('/donors/view/{id}/{token_no}', [DonorsController::class, 'view'])->where('id', '[0-9]+')->name('donors.show');


    // // generate tokens for exesting donors
    //     // one time use
    // Route::get('/donors/generateTokens', [DonorsController::class, 'generateTokens'])->name('donors.generateTokens');
    // Route::get('/sansthas/generateTokens', [SansthasController::class, 'generateTokens'])->name('sansthas.generateTokens');
    // Route::get('/donation-heads/generateTokens', [DonationHeadController::class, 'generateTokens'])->name('donation-heads.generateTokens');
    // Route::get('/users/generateTokens', [UsersController::class, 'generateTokens'])->name('users.generateTokens');

    // // Users.
    // Route::get('/users', [UsersController::class, 'show'])->name('users');
    // Route::get('/users/add', [UsersController::class, 'create'])->name('users.add');
    // Route::post('/users/add', [UsersController::class, 'store'])->name('users.store');
    // Route::get('/users/update/{id}/{token_no}', [UsersController::class, 'edit'])->where('id', '[0-9]+')->name('users.update');
    // Route::post('/users/update/{id}/{token_no}', [UsersController::class, 'update'])->where('id', '[0-9]+')->name('users.update');
    // Route::get('/users/delete/{id}/{token_no}', [UsersController::class, 'destroy'])->where('id', '[0-9]+')->name('users.delete');
    // Route::get('/users/restore/{id}/{token_no}', [UsersController::class, 'restore'])->where('id', '[0-9]+')->name('users.restore');

    // Main Page Route

    Route::get('/home', [RailController::class, 'home'])->name('home');
    Route::get('/dashboard', [RailController::class, 'dashboard'])->name('dashboard');
    Route::get('/reports', [RailController::class, 'report'])->name('reports');
    Route::get('/notifications', [RailController::class, 'notification'])->name('notification');
    Route::get('/about/us', [RailController::class, 'aboutus'])->name('aboutus');
    Route::get('/mail', [MailController::class, 'mail']);
    Route::get('/pdf', [MailController::class, 'downloadPdf'])->name('download.pdf');
    Route::get('/download-csv', [MailController::class, 'downloadCsv'])->name('download.csv');

    // Route::post('/', [LoginController::class, 'loginvarify'])->name('dashboard');



    // authentication
    // Route::get('/login', [LoginBasic::class, 'login'])->name('login.show');
    // Route::post('/login', [LoginBasic::class, 'verify'])->name('login.verify');
    // Route::get('/logout', [LoginBasic::class, 'logout'])->name('logout');

});
