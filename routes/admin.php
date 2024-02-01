<?php

use Illuminate\Support\Facades\Route;

use function Clue\StreamFilter\fun;

/*
|--------------------------------------------------------------------------
| Admin Panel Routes
|--------------------------------------------------------------------------
*/


Route::prefix('/admin')->middleware('auth:admin')->group(function () {
  // admin redirect to dashboard route
  Route::get('/dashboard', 'BackEnd\AdminController@redirectToDashboard')->name('admin.dashboard');


  // admin profile settings route start
  Route::get('/edit-profile', 'BackEnd\AdminController@editProfile')->name('admin.edit_profile');

  Route::post('/update-profile', 'BackEnd\AdminController@updateProfile')->name('admin.update_profile');

  Route::get('/change-password', 'BackEnd\AdminController@changePassword')->name('admin.change_password');

  Route::post('/update-password', 'BackEnd\AdminController@updatePassword')->name('admin.update_password');
  // admin profile settings route end
  // admin logout attempt route
  Route::get('/logout', 'BackEnd\AdminController@logout')->name('admin.logout');

  // admin management route start
  Route::prefix('/admin-management')->middleware('permission:Admin Management')->group(function () {
    // role-permission route
    Route::get('/role-permissions', 'BackEnd\Administrator\RolePermissionController@index')->name('admin.admin_management.role_permissions');

    Route::post('/store-role', 'BackEnd\Administrator\RolePermissionController@store')->name('admin.admin_management.store_role');

    Route::get('/role/{id}/permissions', 'BackEnd\Administrator\RolePermissionController@permissions')->name('admin.admin_management.role.permissions');

    Route::post('/role/{id}/update-permissions', 'BackEnd\Administrator\RolePermissionController@updatePermissions')->name('admin.admin_management.role.update_permissions');

    Route::post('/update-role', 'BackEnd\Administrator\RolePermissionController@update')->name('admin.admin_management.update_role');

    Route::post('/delete-role/{id}', 'BackEnd\Administrator\RolePermissionController@destroy')->name('admin.admin_management.delete_role');

    // registered admin route
    Route::get('/registered-admins', 'BackEnd\Administrator\SiteAdminController@index')->name('admin.admin_management.registered_admins');

    Route::post('/store-admin', 'BackEnd\Administrator\SiteAdminController@store')->name('admin.admin_management.store_admin');

    Route::post('/update-status/{id}', 'BackEnd\Administrator\SiteAdminController@updateStatus')->name('admin.admin_management.update_status');

    Route::post('/update-admin', 'BackEnd\Administrator\SiteAdminController@update')->name('admin.admin_management.update_admin');

    Route::post('/delete-admin/{id}', 'BackEnd\Administrator\SiteAdminController@destroy')->name('admin.admin_management.delete_admin');
  });
  // admin management route end
  //pwa management
  Route::prefix('pwa')->group(function(){
    Route::get('/', 'BackEnd\BasicSettings\BasicController@pwa')->name('admin.pwa');
    Route::post('/post', 'BackEnd\BasicSettings\BasicController@updatepwa')->name('admin.pwa.update');
  });
  //pwa management
  //settings management

  Route::prefix('/basic-settings')->middleware('permission:Basic Settings')->group(function () {

    Route::get('/general-settings', 'BackEnd\BasicSettings\BasicController@general_settings')->name('admin.basic_settings.general_settings');
    Route::post('/update-general-settings', 'BackEnd\BasicSettings\BasicController@update_general_setting')->name('admin.basic_settings.general_settings.update');

    // basic settings mail route start
    Route::get('/mail-from-admin', 'BackEnd\BasicSettings\BasicController@mailFromAdmin')->name('admin.basic_settings.mail_from_admin');
    Route::post('/update-mail-from-admin', 'BackEnd\BasicSettings\BasicController@updateMailFromAdmin')->name('admin.basic_settings.update_mail_from_admin');
    Route::get('/mail-to-admin', 'BackEnd\BasicSettings\BasicController@mailToAdmin')->name('admin.basic_settings.mail_to_admin');
    Route::post('/update-mail-to-admin', 'BackEnd\BasicSettings\BasicController@updateMailToAdmin')->name('admin.basic_settings.update_mail_to_admin');
    Route::get('/mail-templates', 'BackEnd\BasicSettings\BasicController@index')->name('admin.basic_settings.mail_templates');
    Route::get('/edit-mail-template/{id}', 'BackEnd\BasicSettings\BasicController@edit')->name('admin.basic_settings.edit_mail_template');
    Route::post('/update-mail-template/{id}', 'BackEnd\BasicSettings\BasicController@update')->name('admin.basic_settings.update_mail_template');
    // basic settings mail route end

    // basic settings plugins route start
    Route::get('/plugins', 'BackEnd\BasicSettings\BasicController@plugins')->name('admin.basic_settings.plugins');
    Route::post('/update-disqus', 'BackEnd\BasicSettings\BasicController@updateDisqus')->name('admin.basic_settings.update_disqus');
    Route::post('/update-tawkto', 'BackEnd\BasicSettings\BasicController@updateTawkTo')->name('admin.basic_settings.update_tawkto');
    Route::post('/update-whatsapp', 'BackEnd\BasicSettings\BasicController@updateWhatsApp')->name('admin.basic_settings.update_whatsapp');
    Route::post('/update-recaptcha', 'BackEnd\BasicSettings\BasicController@updateRecaptcha')->name('admin.basic_settings.update_recaptcha');
    Route::post('/update-facebook', 'BackEnd\BasicSettings\BasicController@updateFacebook')->name('admin.basic_settings.update_facebook');
    Route::post('/update-google', 'BackEnd\BasicSettings\BasicController@updateGoogle')->name('admin.basic_settings.update_google');
    // basic settings plugins route end


    // basic settings maintenance-mode route
    Route::get('/maintenance-mode', 'BackEnd\BasicSettings\BasicController@maintenance')->name('admin.basic_settings.maintenance_mode');
    Route::post('/update-maintenance-mode', 'BackEnd\BasicSettings\BasicController@updateMaintenance')->name('admin.basic_settings.update_maintenance_mode');

    // basic settings cookie-alert route
    Route::get('/cookie-alert', 'BackEnd\BasicSettings\BasicController@cookieAlert')->name('admin.basic_settings.cookie_alert');
    Route::post('/update-cookie-alert', 'BackEnd\BasicSettings\BasicController@updateCookieAlert')->name('admin.basic_settings.update_cookie_alert');
  });
  //sitemap
  Route::prefix('sitemap')->group(function () {
    Route::get('/', 'BackEnd\SitemapController@index')->name('admin.sitemap.index');
    Route::post('/store', 'BackEnd\SitemapController@store')->name('admin.sitemap.store');
    Route::post('/{id}/delete', 'BackEnd\SitemapController@delete')->name('admin.sitemap.delete');
    Route::post('/download', 'BackEnd\SitemapController@download')->name('admin.sitemap.download');
  });
  //sitemap

  // user management route start
  Route::prefix('/user-management')->middleware('permission:User Management')->group(function () {
    // registered user route
    Route::get('/registered-users', 'BackEnd\User\UserController@index')->name('admin.user_management.registered_users');
    Route::prefix('/user/{id}')->group(function () {
      Route::post('/update-email-status', 'BackEnd\User\UserController@updateEmailStatus')->name('admin.user_management.user.update_email_status');
      Route::post('/update-account-status', 'BackEnd\User\UserController@updateAccountStatus')->name('admin.user_management.user.update_account_status');
      Route::get('/details', 'BackEnd\User\UserController@show')->name('admin.user_management.user.details');
      Route::get('/change-password', 'BackEnd\User\UserController@changePassword')->name('admin.user_management.user.change_password');
      Route::post('/update-password', 'BackEnd\User\UserController@updatePassword')->name('admin.user_management.user.update_password');
      Route::post('/delete', 'BackEnd\User\UserController@destroy')->name('admin.user_management.user.delete');
      Route::get('/secret-login', 'BackEnd\User\UserController@secret_login')->name('admin.user_management.user.secret_login');
    });
    Route::post('/bulk-delete-user', 'BackEnd\User\UserController@bulkDestroy')->name('admin.user_management.bulk_delete_user');
    // push notification route
    Route::prefix('/push-notification')->group(function () {
      Route::get('/settings', 'BackEnd\User\PushNotificationController@settings')->name('admin.user_management.push_notification.settings');

      Route::post('/update-settings', 'BackEnd\User\PushNotificationController@updateSettings')->name('admin.user_management.push_notification.update_settings');

      Route::get('/notification-for-visitors', 'BackEnd\User\PushNotificationController@writeNotification')->name('admin.user_management.push_notification.notification_for_visitors');

      Route::post('/send', 'BackEnd\User\PushNotificationController@sendNotification')->name('admin.user_management.push_notification.send');
    });

  });
  // user management route end
  //invest package management
  Route::prefix('/packages')->group(function () {
    Route::get('', 'BackEnd\PackageController@index')->name('admin.package');
    Route::post('/store-package', 'BackEnd\PackageController@store')->name('admin.package.store_package');
    Route::get('/edit-invest-package/{package}', 'BackEnd\PackageController@edit')->name('admin.package.invest_edit_package');
    Route::post('/update-package', 'BackEnd\PackageController@update')->name('admin.package.update_package');
    Route::post('/delete-package/{id}', 'BackEnd\PackageController@destroy')->name('admin.package.delete_package');
    Route::post('/update-package-featured-status/{id}', 'BackEnd\PackageController@updatePackageFeaturedStatus')->name('admin.package.update_package_featured_status');
    Route::post('/update-package-active-status/{id}', 'BackEnd\PackageController@updatePackageActiveStatus')->name('admin.package.update_package_active_status');
  });
  // Package
//recharge Package
  Route::prefix('/recharge-packages')->group(function () {
    Route::get('', 'BackEnd\RechargePackageController@index')->name('admin.recharge.package');
    Route::post('/store-package', 'BackEnd\RechargePackageController@store')->name('admin.package.recharge.store_package');
    Route::get('/edit-invest-package/{package}', 'BackEnd\RechargePackageController@edit')->name('admin.package.recharge.invest_edit_package');
    Route::post('/update-package', 'BackEnd\RechargePackageController@update')->name('admin.package.recharge.update_package');
    Route::post('/delete-package/{id}', 'BackEnd\RechargePackageController@destroy')->name('admin.package.recharge.delete_package');
    Route::post('/update-package-featured-status/{id}', 'BackEnd\RechargePackageController@updatePackageFeaturedStatus')->name('admin.package.recharge.update_package_featured_status');
    Route::post('/update-package-active-status/{id}', 'BackEnd\RechargePackageController@updatePackageActiveStatus')->name('admin.package.recharge.update_package_active_status');
  });


  // language management start
  Route::prefix('/language-management')->middleware('permission:Language Management')->group(function () {
    Route::get('', 'BackEnd\LanguageController@index')->name('admin.language_management');

    Route::post('/store', 'BackEnd\LanguageController@store')->name('admin.language_management.store');

    Route::post('/{id}/make-default-language', 'BackEnd\LanguageController@makeDefault')->name('admin.language_management.make_default_language');

    Route::post('/update', 'BackEnd\LanguageController@update')->name('admin.language_management.update');

    Route::get('/{id}/edit-keyword', 'BackEnd\LanguageController@editKeyword')->name('admin.language_management.edit_keyword');

    Route::post('add-keyword', 'BackEnd\LanguageController@addKeyword')->name('admin.language_management.add_keyword');

    Route::post('/{id}/update-keyword', 'BackEnd\LanguageController@updateKeyword')->name('admin.language_management.update_keyword');

    Route::post('/{id}/delete', 'BackEnd\LanguageController@destroy')->name('admin.language_management.delete');

    Route::get('/{id}/check-rtl', 'BackEnd\LanguageController@checkRTL');
  });
  // language management  end

});
