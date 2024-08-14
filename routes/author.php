<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\UserRoleController;
use App\Http\Controllers\Backend\NoticeController;
use App\Http\Controllers\Backend\WebsiteSettingsController;
use App\Http\Controllers\Backend\SocialController;
use App\Http\Controllers\Backend\SeoController;
use App\Http\Controllers\Backend\PageContoller;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\ProjectListController;
use App\Http\Controllers\Backend\WorkBillController;
use App\Http\Controllers\Backend\DalyStatementController;

// Route::get('/author', function () {
//     return view('backend.layouts.main');
// });

Route::get('/login', [LoginController::class, 'login_from'])->name('admin_login');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => 'author'], function () {

        Route::controller(AuthController::class)->group(function () {
            Route::get('/dashboard', 'Admin_dashboard')->name('dashboard');
            Route::get('/logout', 'Admin_logout')->name('logout');
            // Route::get('/password-change', 'password_change')->name('admin.password_change');
            // Route::post('/password-update', 'update_change')->name('pass.update');
        });

        // User Route Section
        Route::group(['prefix' => 'user'], function () {
            Route::controller(UserController::class)->group(function () {
                Route::get('/create', 'User_Create')->name('user.create');
                Route::get('/view', 'User_View')->name('user.view');
                Route::post('/store', 'User_Store')->name('user.store');
                Route::get('/edit/{slug}', 'User_Edit')->name('user.edit');
                Route::post('/update/{slug}', 'User_Update')->name('user.update');
                Route::get('/delete/{slug}', 'User_Delete')->name('user.delete');
            });
        });

        // Banner Route Section
        Route::group(['prefix' => 'banner'], function () {
            Route::controller(BannerController::class)->group(function () {
                Route::get('/', 'View_Banner')->name('manage.banner');
                Route::post('/store', 'Banner_Store')->name('banner.store');
                Route::get('/edit/{id}', 'Banner_Edit')->name('banner.edit');
                Route::post('/update/{id}', 'Banner_Update')->name('banner.update');
                Route::get('/status/{id}', 'Banner_Status')->name('banner.status');
                Route::get('/delete/{id}', 'Banner_Delete')->name('banner.delete');
            });
        });

        // Manage Role Section
        Route::group(['prefix' => 'manage-role'], function () {
            Route::controller(UserRoleController::class)->group(function () {
                Route::get('/', 'Manage_Role')->name('manage.role');
                Route::post('/create', 'Role_Create')->name('role.create');
                Route::get('/edit/{slug}', 'Role_edit')->name('role.edit');
                Route::post('/update/{slug}', 'Role_Update')->name('role.update');
                Route::get('/delete/{slug}', 'Role_Delete')->name('role.delete');
            });
        });

        // Manage Role Section
        Route::group(['prefix' => 'pages'], function () {
            Route::controller(PageContoller::class)->group(function () {
                Route::get('/', 'Manage_Page')->name('manage.page');
                Route::post('/create', 'Create_Page')->name('page.create');
                Route::get('/edit/{slug}', 'Page_Edit')->name('page.edit');
                Route::post('/update/{slug}', 'Page_Update')->name('page.update');
                Route::get('/delete/{slug}', 'Page_Delete')->name('page.delete');
            });
        });

        // Contact Role Section
        Route::group(['prefix' => 'contact'], function () {
            Route::controller(ContactController::class)->group(function () {
                Route::get('/', 'Manage_Contact')->name('manage.contact');
                Route::get('/delete/{id}', 'Message_Delete')->name('message.delete');
            });
        });

        // Project List Role Section
        Route::group(['prefix' => 'project'], function () {
            Route::controller(ProjectListController::class)->group(function () {
                Route::get('/list', 'Project_List')->name('project.list');
                Route::post('/create', 'Project_Create')->name('project.create');
                Route::get('/edit/{id}', 'Project_Edit')->name('project.edit');
                Route::post('/update/{id}', 'Project_Update')->name('project.update');
                Route::get('/status/{id}', 'Project_Status')->name('project.status');
                Route::get('/delete/{id}', 'Project_Delete')->name('project.delete');
            });
        });


        Route::group(['prefix' => 'account'], function () {

            // Work Bill List Role Section
            Route::group(['prefix' => 'work-bill'], function () {
                Route::controller(WorkBillController::class)->group(function () {
                    Route::get('/create', 'Work_Bill_Create')->name('work_bill.create');
                    // Route::post('/create', 'Project_Create')->name('project.create');
                    // Route::get('/edit/{id}', 'Project_Edit')->name('project.edit');
                    // Route::post('/update/{id}', 'Project_Update')->name('project.update');
                    // Route::get('/status/{id}', 'Project_Status')->name('project.status');
                    // Route::get('/delete/{id}', 'Project_Delete')->name('project.delete');
                });
            });

            // Daly Statement Role Section
            Route::group(['prefix' => 'daly-statement'], function () {
                Route::controller(DalyStatementController::class)->group(function () {
                    Route::get('/', 'Statement_Form')->name('daly_statement.store');
                    Route::post('/store-income', 'Income_Statement_Store')->name('income_statement.store');
                    Route::post('/store-expense', 'Expense_Statement_Store')->name('expense_statement_store');
                });
            });
        });


        Route::group(['prefix' => 'setting'], function () {

            // Notice Role Section
            Route::group(['prefix' => 'notice'], function () {
                Route::controller(NoticeController::class)->group(function () {
                    Route::get('/', 'Notice')->name('notice');
                    Route::post('/create', 'Notice_Create')->name('notice.create');
                    Route::post('/update/{id}', 'Notice_Update')->name('notice.update');
                });
            });

            // Website Settings Role Section
            Route::group(['prefix' => 'website'], function () {
                Route::controller(WebsiteSettingsController::class)->group(function () {
                    Route::get('/', 'Website_Settings')->name('website.setting');
                    Route::post('/store', 'Website_Setting_Store')->name('website_setting.store');
                    Route::post('/update/{id}', 'Website_Setting_Update')->name('website_setting.update');
                });
            });

            // Social Settings Role Section
            Route::group(['prefix' => 'social'], function () {
                Route::controller(SocialController::class)->group(function () {
                    Route::get('/', 'Social_Section')->name('social.section');
                    Route::post('/store', 'Social_Store')->name('social.store');
                    Route::post('/update/{id}', 'Social_Update')->name('social.update');
                });
            });

            // Seo Settings Role Section
            Route::group(['prefix' => 'seo'], function () {
                Route::controller(SeoController::class)->group(function () {
                    Route::get('/', 'Seo_Section')->name('seo.section');
                    Route::post('/store', 'Seo_Store')->name('seo.store');
                    Route::post('/update/{id}', 'Seo_Update')->name('seo.update');
                });
            });
        });
    });
});
