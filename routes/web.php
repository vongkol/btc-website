<?php

// Front End
Route::get('/',"FrontController@index");
Route::get('/page/{id}', "FrontPageController@index");
Route::get('/plan', "FrontPageController@plan");
Route::post('/send-email', "FrontController@send_email");
Route::get('/featured-work/{id}', "FrontController@featured_work");
Route::get('/sign-in', "SigninController@index");
Route::post('/membership/sign-in', 'SigninController@login');
Route::get('/membership/sign-out', 'SigninController@logout');
Route::get('/profile' , 'SigninController@profile');
Route::get('/profile/edit/{id}', "SigninController@edit");
Route::post('/profile/update', "SigninController@update");
Route::post('/profile/upload/', "SigninController@upload");
Route::get('/sign-up', "SignupController@index");
Route::get('/membership/reset-password', "SigninController@reset_password");
Route::post('/membership/change-password', "SigninController@change_password");
Route::get('/membership/forget-password', 'SigninController@forget_password');
Route::post('/membership/recovery', 'SigninController@recovery_password');
Route::get('/membership/service/reset/{id}', "SigninController@new_password");
Route::post('/membership/service/update', "SigninController@update_password");
Route::get('/dashboard', "FrontController@dashboard");
Route::get('/investment', "FrontController@investment");
Route::get('/method/get', "FrontController@get_method");
// buy plan
Route::get('/buyplan/{id}', 'FrontController@buy');
Route::get('/confirm/buy', 'FrontController@confirm');
Route::post('/sign-up/save', "SignupController@save");
Route::get('/order', "FrontController@order");
Route::get('/downline', "FrontController@downline");
Route::get('/payment', "FrontController@payment");
Route::get('/request', "FrontController@request");
Route::post('/request/submit', "FrontController@request_payment");
Route::get('/confirm/{id}', "SignupController@confirm");
Auth::routes();

/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
// Back End
Route::get('/admin',"HomeController@index");
Route::get('/admin/dashboard',"HomeController@index");

// load file manager
Route::get('/fm', "FileManagerController@index");

Route::get('/admin/membership', "MembershipController@index");
Route::get('/admin/membership/create', "MembershipController@create");
Route::post('/admin/membership/save', "MembershipController@save");
Route::get('/admin/membership/delete/{id}', "MembershipController@delete");
Route::get('/admin/membership/edit/{id}', "MembershipController@edit");
Route::post('/admin/membership/update', "MembershipController@update");
Route::get('/admin/membership/detail/{id}', "MembershipController@detail");
Route::get('/admin/membership/edit-score/{id}', "MembershipController@edit_score");
Route::post('/admin/membership/score/update', "MembershipController@update_score");

// Page
Route::get('/admin/plan', "PlanController@index");
Route::get('/admin/plan/create', "PlanController@create");
Route::post('/admin/plan/save', "PlanController@save");
Route::get('/admin/plan/delete/{id}', "PlanController@delete");
Route::get('/admin/plan/edit/{id}', "PlanController@edit");
Route::post('/admin/plan/update', "PlanController@update");
Route::get('/admin/plan/view/{id}', "PlanController@view");

// Plan
Route::get('/admin/page', "PageController@index");
Route::get('/admin/page/create', "PageController@create");
Route::post('/admin/page/save', "PageController@save");
Route::get('/admin/page/delete/{id}', "PageController@delete");
Route::get('/admin/page/edit/{id}', "PageController@edit");
Route::post('/admin/page/update', "PageController@update");
Route::get('/admin/page/view/{id}', "PageController@view");

// Our Service
Route::get('/admin/our-service', "OurServiceController@index");
Route::get('/admin/our-service/edit/{id}', "OurServiceController@edit");
Route::post('/admin/our-service/update', "OurServiceController@update");

//Main Menu
Route::get('/main-menu', "MainMenuController@index");
Route::get('/main-menu/create', "MainMenuController@create");
Route::post('/main-menu/save', "MainMenuController@save");
Route::get('/main-menu/delete/{id}', "MainMenuController@delete");
Route::get('/main-menu/edit/{id}', "MainMenuController@edit");
Route::post('/main-menu/update', "MainMenuController@update");

// user route
Route::get('/user', "UserController@index");
Route::get('/user/profile', "UserController@load_profile");
Route::get('/user/reset-password', "UserController@reset_password");
Route::post('/user/change-password', "UserController@change_password");
Route::get('/user/finish', "UserController@finish_page");
Route::post('/user/update-profile', "UserController@update_profile");
Route::get('/user/delete/{id}', "UserController@delete");
Route::get('/user/create', "UserController@create");
Route::post('/user/save', "UserController@save");
Route::get('/user/edit/{id}', "UserController@edit");
Route::post('/user/update', "UserController@update");
Route::get('/user/update-password/{id}', "UserController@load_password");
Route::post('/user/save-password', "UserController@update_password");

// role
Route::get('/role', "RoleController@index");
Route::get('/role/create', "RoleController@create");
Route::post('/role/save', "RoleController@save");
Route::get('/role/delete/{id}', "RoleController@delete");
Route::get('/role/edit/{id}', "RoleController@edit");
Route::post('/role/update', "RoleController@update");
Route::get('/role/permission/{id}', "PermissionController@index");
Route::post('/rolepermission/save', "PermissionController@save");


Route::get('/home', 'HomeController@index')->name('home');

// Slide 
Route::get('/slide', "SlideController@index");
Route::get('/slide/create', "SlideController@create");
Route::post('/slide/save', "SlideController@save");
Route::get('/slide/edit/{id}', "SlideController@edit");
Route::post('/slide/update', "SlideController@update");
Route::get('/slide/delete/{id}', "SlideController@delete");

// Video
Route::get('/admin/video', "VideoController@index");
Route::get('/admin/video/create', "VideoController@create");
Route::post('/admin/video/save', "VideoController@save");
Route::get('/admin/video/edit/{id}', "VideoController@edit");
Route::post('/admin/video/update', "VideoController@update");
Route::get('/admin/video/delete/{id}', "VideoController@delete");
// Social
Route::get('/social', "SocialController@index");
Route::get('/social/create', "SocialController@create");
Route::post('/social/save', "SocialController@save");
Route::get('/social/edit/{id}', "SocialController@edit");
Route::post('/social/update', "SocialController@update");
Route::get('/social/delete/{id}', "SocialController@delete");
// order admin
Route::get('/admin/order', "OrderController@index");
Route::get('/admin/order/detail/{id}', "OrderController@detail");
Route::get('/admin/order/delete/{id}', "OrderController@delete");
Route::get('/admin/order/approve/{id}', "OrderController@approve");
Route::get('/admin/payment', "PaymentController@index");
Route::get('/admin/payment/detail/{id}', "PaymentController@detail");
Route::get('/admin/payment/delete/{id}', "PaymentController@delete");
Route::get('/admin/payment/approve/{id}', "PaymentController@approve");

// payment method
Route::get('/admin/payment-method', "PaymentMethodController@index");
Route::get('/admin/payment-method/edit/{id}', "PaymentMethodController@edit");
Route::post('/admin/payment-method/update', "PaymentMethodController@update");