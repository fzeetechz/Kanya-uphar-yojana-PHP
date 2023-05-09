<?php 
use App\Http\Controllers\UniversalController;

Route::group(['prefix' => 'admin', 'middleware' => ['auth','AccordingRoleRedirect']], function(){  
    //Dashboard       
    Route::get('dashboard','HomeController@index')->name('admin.dashboard');
    
    //User Management     
    Route::resource('users',UserController::class);
    Route::get('ChangePassword/{id}', 'UserController@changepasswordview')->name('changepasswordview');
    Route::post('ChangePassword/{id}','UserController@changepassword')->name('ChangePassword');
    
    //Admin manager
    Route::get('managers','UserController@index')->name('users.admin.managers');
    Route::get('create/manager','UserController@create')->name('admin.create.manager');
    Route::get('manager/profile/{user_id}','UserController@adminmanagerprofile')->name('users.adminmanagerprofile');
    Route::get('manager/profile/edit/{user_id}','UserController@edit')->name('users.adminmanagerprofileedit');
   
    //Notifications
    Route::resource('notifications',NotificationController::class);
    Route::any('notificationsalstatuschange',[UniversalController::class,'notificationsalstatuschange'])->name('notificationsalstatuschange');
    Route::get('notifications/send/beauticians','NotificationController@create')->name('notifications.send.beauticians');
    Route::get('notifications/send/customers','NotificationController@create')->name('notifications.send.customers');
    
    //Roles
    Route::resource('Roles', RoleController::class);
    Route::resource('Permissions', PermissionController::class);
    
    //Banners
    Route::resource('banners','BannerController');

    //Registrations
    Route::resource('registrations', 'RegistrationController');

    //Plans
    Route::resource('plans', 'PlanController');


    //Settings
    Route::get('settings/create','SettingController@create')->name('settings.create');
    Route::get('settings/contact-us-settings','SettingController@contactussettings')->name('settings.contactussettings');
    Route::get('settings/edit/{id}','SettingController@edit')->name('settings.edit');
    Route::any('settings/update/{id}','SettingController@update')->name('settings.update');
    Route::get('settings/bank/{id?}','SettingController@index')->name('settings.bank.index');
    Route::post('settings/bank/{id?}','SettingController@BankNamestore')->name('settings.bank.store');
    Route::get('settings/qr-code/{id?}','SettingController@index')->name('settings.qrcode.index');
    Route::post('settings/qr-code/{id?}','SettingController@QrCodeStore')->name('settings.qrcode.store');

    //Address
    Route::get('settings/address/{id?}','SettingController@index')->name('settings.contactussettings.address');
    Route::post('settings/address/{id?}','SettingController@Addressstore')
           ->name('settings.contactussettings.address.store');
    //Email
    Route::get('settings/email/{id?}','SettingController@index')->name('settings.contactussettings.email');
    Route::post('settings/email/{id?}','SettingController@Emailstore')
           ->name('settings.contactussettings.email.store');
    //ContactNumber 
    Route::get('settings/contactnumber/{id?}','SettingController@index')->name('settings.contactussettings.contactnumber');
    Route::post('settings/contactnumber/{id?}','SettingController@Contactnumberstore')->name('settings.contactussettings.contactnumber.store');
 
    //Homecontent
    Route::get('settings/homepagecontent/{id?}','SettingController@index')->name('settings.homepagecontent');
    Route::post('settings/homepagecontent/{id?}','SettingController@Homepagecontentstore')
           ->name('settings.homepagecontent.store');
       
    //Contact-us-page 
    Route::post('contact-us-page','PageController@ContactUsUpdate')->name('admin.pages.contact-us.update');

    Route::get('contact-us-requests','ContactUsController@index')->name('contact-us.index');

    //About us
    Route::post('about-us','PageController@Aboutusupdate')->name('admin.pages.about-us.update');
    #Show All pages List
    Route::get('pages','PageController@index')->name('admin.pages');
    #Show Single page data
    Route::get('page/update/{pagename}','PageController@update')->name('admin.page.update');

    //Gallery
    Route::get('page/update/gallery/{pagename?}/{id?}','PageController@gallery')->name('admin.page.gallery.pages');
    Route::any('pages/gallery-photos/{id?}','PageController@GalleryPhotosUpdateStore')
            ->name('admin.pages.gallery.gallery-photos.update');
  });
