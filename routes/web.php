<?php
use App\Http\Controllers\AboutusController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeServiceController;
use App\Http\Controllers\IndustrialServiceController;
use App\Http\Controllers\MainMenuController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SubMenuController;
use App\Http\Controllers\TechnologyController;
use App\Http\Controllers\WhyChooseUsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactFormControler;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SolutionController;
use App\Http\Controllers\WebPagesController;
use App\Http\Controllers\SlidercategoryController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\InnovationController;
use App\Models\MainMenu;

// use App\Http\Controllers\HomeController;
// use App\Http\Controllers\ApplicationController;
// use App\Http\Controllers\ApplicationFormController;
// use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/login-pannel', function () {

    return view('auth.login');
});
Route::get('/testMail', function () {

    return view('mail.mail');
});

Route::post('login', [LoginController::class, 'login'])->name('login');


// web pages routes starts here 
route::get('/',[HomePageController::class, 'index']);

route::get('about-us', [WebPagesController::class, 'aboutUs']);
route::get('technology', [WebPagesController::class, 'technology']);
route::get('industrial-automation', [WebPagesController::class, 'industrialAutomation']);
route::get('manufacturing', [WebPagesController::class, 'manufacturing']);
route::get('logistics-management', [WebPagesController::class, 'logisticsManagement']);
route::get('energy', [WebPagesController::class, 'energy']);
route::get('services', [WebPagesController::class, 'services']);
route::get('contact', [WebPagesController::class, 'contact']);
route::get('privacy-policy', [WebPagesController::class, 'privacyPolicy']);
route::get('cookie-policy', [WebPagesController::class, 'cookiePolicy']);
// web pages routes ends here .


//contact form controller starts here .
Route::resource('/contact-form', ContactFormControler::class);
Route::get('/contact-form/get-list', [ContactFormControler::class, 'getContactForm'])->name('get.contact-forms');

//contact form controller ends here .


Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');


Route::get('/homes', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('status/change', [App\Http\Controllers\HomeController::class, 'changeStatus'])->name('changeStatus');


Auth::routes(['register' => false, 'password.request' => false, 'password.reset' => false]);


Route::middleware('cookies')->group(function () {

Route::resource('/user-management', UserController::class);
Route::get('/getUsers', [UserController::class, 'getUsers'])->name('getUsers');
Route::get('/user-management/delete/{id}', [UserController::class, 'destroy'])->name('delete-user');
Route::post('/user-management/edit/{id}', [UserController::class, 'update'])->name('update-user');
Route::get('/user-management/{id}/restore', [UserController::class, 'userRestore'])->name('restore-user');

Route::get('/user-management/{id}/restore', [UserController::class, 'userRestore'])->name('restore-user');

Route::get('/user-management/{id}/handover', [UserController::class, 'userHandoverDetails'])->name('handover-user');
Route::get('/user-management/{id}/changepassword', [UserController::class, 'userChangePassword'])->name('changepassword-user');

Route::post('/change-password', [UserController::class, 'updatePassword'])->name('update-password');


Route::get('/updateKey', [App\Http\Controllers\UserController::class, 'updateKey'])->name('updateKey');


Route::get('/userimport', [UserController::class, 'userImport'])->name('user.import');
Route::post('/userimport', [UserController::class, 'userImportStore'])->name('user.importStore');





Route::resource('/roles', RoleController::class);
Route::get('/getRoles', [RoleController::class, 'getRoles'])->name('getRoles');
Route::get('/roles/delete/{id}', [RoleController::class, 'destroy'])->name('delete-role');
Route::post('/roles/edit/{id}', [RoleController::class, 'update'])->name('update-role');

Route::get('/roles/{id}/editPermission', [RoleController::class, 'editPermission'])->name('edit-rolePermission');
Route::post('/roles/addPermission/{id}', [RoleController::class, 'addPermission'])->name('roles.permission.store');


Route::resource('/permissions', PermissionController::class);
Route::get('/getPermissions', [PermissionController::class, 'getPermissions'])->name('getPermissions');
Route::get('/permissions/delete/{id}', [PermissionController::class, 'destroy'])->name('delete-permission');
Route::post('/permissions/edit/{id}', [PermissionController::class, 'update'])->name('update-permission');

Route::get('admin/profile','App\Http\Controllers\ProfileController@index')->name('profile.manage');
Route::post('admin/profile/update/','App\Http\Controllers\ProfileController@update')->name('profile.update');

Route::get('student/profile', [App\Http\Controllers\HomeController::class, 'profileMange'])->name('student.profile.manage');

});







Route::get('/forgot-password', [App\Http\Controllers\Auth\ForgotPasswordController::class,'forgotPassword']);
Route::post('/forgot-password', [App\Http\Controllers\Auth\ForgotPasswordController::class,'forgotPasswordPost']);
Route::get('/reset-password/{token}', [App\Http\Controllers\Auth\ForgotPasswordController::class,'restPassword'])->name('reset.password');
Route::post('/set-new-password', [App\Http\Controllers\Auth\ForgotPasswordController::class,'setNewPassword']);
Route::get('refresh_captcha', [App\Http\Controllers\Auth\ForgotPasswordController::class,'refreshCaptcha'])->name('refresh_captcha');
// admin password edit route starts here
route::get('/admin/profie/password-edit-page',[ProfileController::class, 'editPassword'])->name("profile.password.edit");
route::post('/admin/profie/password-edit-page',[ProfileController::class, 'editPasswordPost'])->name("profile.password.edit.post");
// admin password edit route ends here


Route::resource('menus', MainMenuController::class);
Route::get('getMenus', [MainMenuController::class, 'getMenus'])->name('getMenus');
Route::post('/menus/{mainMenu}', [MainMenuController::class, 'destroy'])->name('menus.delete');
//menus route ends here.

//sub menu route starts here.
Route::resource('sub_menus', SubMenuController::class);
Route::get('/sub_menus/index/{id}', [SubMenuController::class, 'indexWithId'])->name('sub_menus.indexWithId');
Route::get('getSubMenus', [SubMenuController::class, 'getSubMenus'])->name('getSubMenus');
Route::post('/sub_menus/{mainMenu}', [SubMenuController::class, 'destroy'])->name('sub_menus.delete');
//sub menus route ends here.

Route::resource('slidercategories', SlidercategoryController::class);
Route::resource('sliders', SliderController::class);

//solution route starts here 
Route::resource('solutions', SolutionController::class);
Route::get('/solutions/add-content-index/{id}', [SolutionController::class, 'addContentIndex'])->name('solutions.addContent.index');
Route::Post('/solutions/add-content-store', [SolutionController::class, 'addContentStore'])->name('solutions.addContent.store');
Route::get('getSolutions', [SolutionController::class, 'getSolutions'])->name('getSolutions');

Route::get('/solution/{slug}',[SolutionController::class, 'getSolutionsPage'])->name('get.solutions.Page');
//solution route ends here 


Route::resource('technology_list', TechnologyController::class);
Route::get('getTechnology', [TechnologyController::class, 'getTechnology'])->name('getTechnology');

Route::resource('service_list', ServiceController::class);
Route::get('getServices', [ServiceController::class, 'getServices'])->name('getServices');

Route::get('/admin/about-us', [AboutusController::class, 'index'])->name('about-us.index');
Route::post('admin/about-us/store',[AboutusController::class,'store'])->name('about-us.store');

Route::get('/admin/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('admin/contact-store',[ContactController::class,'store'])->name('contact.store');




Route::get('settings','App\Http\Controllers\SettingController@genreal')->name('gen.set');
Route::post('setting/store','App\Http\Controllers\SettingController@store')->name('setting.store');

Route::get('/admin/privacy-policy', [PolicyController::class, 'privacyPolicy'])->name('privacyPolicy.index');
Route::post('admin/privacy-policy/store',[PolicyController::class,'privacyPolicyStore'])->name('privacyPolicy.store');

Route::get('/admin/cookie-policy', [PolicyController::class, 'cookiePolicy'])->name('cookiePolicy.index');
Route::post('admin/cookie-policy/store',[PolicyController::class,'cookiePolicyStore'])->name('cookiePolicy.store');

Route::resource('industrial-services', IndustrialServiceController::class);
Route::get('getIndustrialServices', [IndustrialServiceController::class, 'getIndustrialServices'])->name('getIndustrialServices');

Route::resource('home-services', HomeServiceController::class);
Route::get('getHomeServices', [HomeServiceController::class, 'getHomeServices'])->name('getHomeServices');

Route::resource('why-choose-us', WhyChooseUsController::class);
Route::get('getWhyChooseUs', [WhyChooseUsController::class, 'getWhyChooseUs'])->name('getWhyChooseUs');
Route::post('whyChooseUsSetting', [WhyChooseUsController::class, 'whyChooseUsSetting'])->name('why-choose-us.setting');

Route::get('/innovation',[InnovationController::class, 'index'])->name('innovations.index');
Route::post('/innovation/store',[InnovationController::class, 'store'])->name('innovations.store');
