<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| User Interface Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'FrontEnd\HomeController@index')->name('index');


Route::prefix('/user')->middleware(['guest:web', 'change.lang'])->group(function () {
  Route::get('/login', 'FrontEnd\UserController@login')->name('user.login');
  Route::post('/login-submit', 'FrontEnd\UserController@loginSubmit')->name('user.login_submit')->withoutMiddleware('change.lang');
  Route::get('/forget-password', 'FrontEnd\UserController@forgetPassword')->name('user.forget_password');
  Route::post('/send-forget-password-mail', 'FrontEnd\UserController@forgetPasswordMail')->name('user.send_forget_password_mail')->withoutMiddleware('change.lang');
  Route::get('/reset-password', 'FrontEnd\UserController@resetPassword');
  Route::post('/reset-password-submit', 'FrontEnd\UserController@resetPasswordSubmit')->name('user.reset_password_submit')->withoutMiddleware('change.lang');
  Route::get('/signup', 'FrontEnd\UserController@signup')->name('user.signup');
  Route::post('/signup-submit', 'FrontEnd\UserController@signupSubmit')->name('user.signup_submit')->withoutMiddleware('change.lang');
  Route::post('/register/checkUsernameExists', 'FrontEnd\UserController@CheckUsernameExists')->name('CheckUsernameExists')->withoutMiddleware('change.lang');
  Route::get('/signup-verify/{token}', 'FrontEnd\UserController@signupVerify')->withoutMiddleware('change.lang');
});

//dashboard
Route::prefix('/user')->middleware(['auth:web'])->group(function () {
  Route::get('/dashboard', 'FrontEnd\UserController@redirectToDashboard')->name('user.dashboard');
  Route::get('/edit-profile', 'FrontEnd\UserController@editProfile')->name('user.edit_profile');
  Route::post('/update-profile', 'FrontEnd\UserController@updateProfile')->name('user.update_profile')->withoutMiddleware('change.lang');
  Route::get('/change-password', 'FrontEnd\UserController@changePassword')->name('user.change_password');
  Route::post('/change-user-update-password', 'FrontEnd\UserController@updatePassword')->name('user.ss.update_password');
  // user logout attempt route
  Route::get('/logout', 'FrontEnd\UserController@logoutSubmit')->name('user.logout')->withoutMiddleware('change.lang');


  //subscriptions
  Route::prefix('subscription')->group(function () {
    Route::get('register', 'Account\AccountController@registerAccount')->name('account.register');
    Route::post('register/store', 'Account\AccountController@registerStore')->name('account.register_store');
    Route::post('/store', 'Account\AccountController@store')->name('account.store');
    Route::get('/all', 'Account\AccountController@index')->name('accounts.all');
    Route::get('account-login/{id}/username/{username}', 'Account\AccountController@secretLogin')->name('account.secretLogin');
    Route::post('refferal-number', 'Account\AccountController@refferal_check')->name('account.refferal_chack');
  });

  //withdraw  request
  Route::prefix('withdraw')->group(function () {
    Route::get('/all', 'FrontEnd\WithdrawController@withdrawAll')->name('withdraw.all');
    Route::post('withdraw-request', 'FrontEnd\WithdrawController@withdrawRequest')->name('withdraw.sendRequest');
  });
});
Route::prefix('/admin')->middleware('guest:admin')->group(function () {
  // admin redirect to login page route
  Route::get('/', 'BackEnd\AdminController@login')->name('admin.login');

  // admin login attempt route
  Route::post('/auth', 'BackEnd\AdminController@authentication')->name('admin.auth');

  // admin forget password route
  Route::get('/forget-password', 'BackEnd\AdminController@forgetPassword')->name('admin.forget_password');

  // send mail to admin for forget password route
  Route::post('/mail-for-forget-password', 'BackEnd\AdminController@forgetPasswordMail')->name('admin.mail_for_forget_password');
});

// // fallback route
// Route::fallback(function () {
//   return view('errors.404');
// })->middleware('change.lang');
