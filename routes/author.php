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
// use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\ProjectListController;
use App\Http\Controllers\Backend\WorkBillController;
use App\Http\Controllers\Backend\DalyStatementController;
use App\Http\Controllers\Backend\ConstructionsController;
use App\Http\Controllers\Backend\SercicesController;
use App\Http\Controllers\Backend\TrendingProductsController;
use App\Http\Controllers\Backend\SellingProductsController;
use App\Http\Controllers\Backend\OurTeamController;
use App\Http\Controllers\Backend\AdminController;



use App\Http\Controllers\Backend\account\MonthlyBillController;

// Route::get('/author', function () {
//     return view('backend.layouts.main');
// });


Route::middleware(['Supper_Admin'])->group(function () {
    Route::group(['prefix' => 'author'], function () {

        Route::controller(AdminController::class)->group(function () {
            Route::get('/', 'Admin_dashboard')->name('dashboard');
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

        // User Route Section
        Route::group(['prefix' => 'team'], function () {
            Route::controller(OurTeamController::class)->group(function () {
                Route::get('/', 'Manage_Team')->name('manage.team');
                Route::post('/create', 'Add_Member')->name('add.member');
                Route::get('/status/{id}', 'Manage_Status')->name('manage.status');
                Route::get('/delete/{id}', 'Member_Delete')->name('member.delete');
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

        // Constructions Role Section
        Route::group(['prefix' => 'constructions'], function () {
            Route::controller(ConstructionsController::class)->group(function () {
                Route::get('/', 'Manage_Constructions')->name('manage.constructions');
                Route::post('/store', 'Store_Constructions')->name('store.constructions');
                Route::get('/status/{id}', 'Status_Constructions')->name('constructions.status');
                Route::get('/edit/{id}', 'Edit_Constructions')->name('constructions.edit');
                Route::post('/update/{id}', 'Update_Constructions')->name('constructions.update');
                Route::get('/delete/{id}', 'Delete_Constructions')->name('delete.constructions');
            });
        });

        // Sercices Role Section
        Route::group(['prefix' => 'services'], function () {
            Route::controller(SercicesController::class)->group(function () {
                Route::get('/', 'Manage_Services')->name('manage.services');
                Route::get('/create', 'Create_Constructions')->name('create.constructions');
                Route::post('/store', 'Services_Store')->name('services.store');
                Route::get('/status/{id}', 'Status_Services')->name('service.status');
                Route::get('/edit/{id}', 'Services_Edit')->name('services.edit');
                Route::post('/update/{id}', 'Services_Update')->name('services.update');
                Route::get('/delete/{id}', 'Services_Delete')->name('services.delete');
            });
        });

        // Trending Products Role Section
        Route::group(['prefix' => 'trending-products'], function () {
            Route::controller(TrendingProductsController::class)->group(function () {
                Route::get('/', 'Manage_Trending_Products')->name('manage.trending_products');
                Route::post('/store', 'Trending_Product_Store')->name('trending_product.store');
                Route::get('/status/{id}', 'Trending_Product_Status')->name('trending_product.status');
                Route::get('/delete/{id}', 'Trending_Product_Delete')->name('trending_product.delete');
            });
        });

        // Selling Products Role Section
        Route::group(['prefix' => 'selling-products'], function () {
            Route::controller(SellingProductsController::class)->group(function () {
                Route::get('/', 'Selling_Products_Manamge')->name('selling_products.manamge');
                Route::get('/create', 'Selling_Products_Create')->name('selling_products.create');
                Route::post('/store', 'Selling_Products_Store')->name('selling_products.store');
                Route::get('/edit/{id}', 'Selling_Products_Edit')->name('selling_products.edit');
                Route::post('/update/{id}', 'Selling_Products_Update')->name('selling_products.update');
                Route::get('/status/{id}', 'Selling_Products_Status')->name('selling_products.status');
                Route::get('/delete/{id}', 'Selling_Products_Delete')->name('selling_products.delete');
            });
        });



        Route::group(['prefix' => 'account'], function () {

            // Project List Role Section
            Route::group(['prefix' => 'project'], function () {
                Route::controller(ProjectListController::class)->group(function () {
                    Route::get('/list', 'Project_List')->name('project.list');
                    Route::post('/create', 'Project_Create')->name('project.create');
                    Route::get('/edit/{id}', 'Project_Edit')->name('project.edit');
                    Route::post('/update/{id}', 'Project_Update')->name('project.update');
                    Route::get('/status/{id}', 'Project_Status')->name('project.status');
                    Route::get('/delete/{id}', 'Project_Delete')->name('project.delete');
                    // Billing route Section
                    Route::get('/wori-billing/{id}', 'Work_Billing')->name('billing.view');
                    Route::get('/monthly-billing/{id}', 'Monthly_Bill_View')->name('monthly_bill_view');
                });
            });


            // Work Bill List Role Section
            Route::group(['prefix' => 'work-bill'], function () {
                Route::controller(WorkBillController::class)->group(function () {
                    Route::get('/create', 'Work_Bill_Create')->name('work_bill.create');
                    Route::post('/store', 'Work_Bill_Store')->name('work_bill.store');
                    Route::get('/work-store', 'Session_Data_Store')->name('session_data_store');
                    Route::post('/store-session', 'Work_Bill_Session_Store')->name('work_bill_Session.store');
                    Route::get('/view', 'Work_Bill_View')->name('work_bill.view');
                    Route::get('/submit', 'Work_Bill_Submit')->name('work_bill_submit');
                    Route::post('/submit-workbill', 'Submit_Work_Bill_Update')->name('submit_work_bill.update');

                    // Project Worije Biling Show
                    Route::get('/project/{id}', 'Project_Bill_Show')->name('project.view');
                    // Route::post('/update/{id}', 'Project_Update')->name('project.update');
                    // Route::get('/status/{id}', 'Project_Status')->name('project.status');
                    Route::get('/delete/{id}', 'work_bill_delete')->name('work_bill_delete');
                });
            });


            // Monthly Bill List Role Section
            Route::group(['prefix' => 'monthly-bill'], function () {
                Route::controller(MonthlyBillController::class)->group(function () {
                    Route::get('/create', 'Monthly_Bill_Create')->name('monthly_bill.create');
                    Route::get('/store', 'Monthly_Bill_Store')->name('monthly_bill.store');
                    Route::post('/session-store', 'Add_Session_Data_For_Monthly_Bill')->name('add_session_data.store');
                    Route::get('/view', 'Monthly_Bill_View')->name('view.submit');
                    Route::get('/delete/{id}', 'Monthly_Bill_Delete')->name('monthly_bill.delete');
                    Route::get('/submit', 'Monthly_Bill_Submit')->name('monthly_bill_submit');
                    Route::post('/monthly-submit', 'Submit_Monthly_Billing')->name('submit_monthly_billing');
                });
            });

            // Daly Statement Role Section
            Route::group(['prefix' => 'statement'], function () {
                Route::controller(DalyStatementController::class)->group(function () {
                    Route::get('/all', 'Statement_All')->name('statement');
                    Route::get('/add', 'Statement_Form')->name('daly_statement.store');
                    Route::post('/store-income', 'Income_Statement_Store')->name('income_statement.store');
                    Route::post('/store-expense', 'Expense_Statement_Store')->name('expense_statement_store');

                    Route::get('/search', 'statements_searech')->name('statements_searech');
                    Route::get('/single-search', 'Single_Statement_Search')->name('single_statement.search');
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
