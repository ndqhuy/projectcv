<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Clients\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group([], function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/index', [HomeController::class, 'index'])->name('home');

    Route::group(['prefix' => 'home'], function () {

        Route::get('/search-nav', [HomeController::class, 'searchNav'])->name('searchNav');

        Route::group(['prefix' => 'job', 'middleware' => 'auth'], function () {
            Route::get('/job-list', [HomeController::class, 'jobList'])->name('jobList');
            Route::get('/job-detail/{id}', [HomeController::class, 'jobDetail'])->name('jobDetail');
            Route::post('/save-job', [HomeController::class, 'saveJob'])->name('saveJob');
            Route::get('/saved-job', [HomeController::class, 'savedJob'])->name('savedJob');
            Route::get('/delete-saved-jobs/{id}', [HomeController::class, 'deleteSavedJob'])->name('deleteSavedJob');

            Route::post('/job-apply/{job_id}', [HomeController::class, 'jobApply'])->name('jobApply');
            Route::get('/job-applied', [HomeController::class, 'jobApplied'])->name('jobApplied');

        });

        Route::group(['prefix' => 'cv', 'middleware' => 'auth'], function () {
            Route::get('/cv-model', [HomeController::class, 'cvModel'])->name('cvModel');
            Route::get('/view-user-cvs', [HomeController::class, 'viewUserCvs'])->name('viewUserCvs');
            Route::get('/detail-user-cvs/{id}', [HomeController::class, 'detailUserCv'])->name('detailUserCv');
            Route::get('/cv-add/{id}', [HomeController::class, 'cvAdd'])->name('cvAdd');
            Route::post('/cv-save-add', [HomeController::class, 'cvSaveAdd'])->name('cvSaveAdd');
            Route::post('/cv-save-update', [HomeController::class, 'cvSaveUpdate'])->name('cvSaveUpdate');
            Route::get('/cv-delete/{id}', [HomeController::class, 'cvDelete'])->name('cvDelete');
        });

        Route::group(['prefix' => 'company', 'middleware' => 'auth'], function () {
            Route::get('/company-list', [HomeController::class, 'companyList'])->name('companyList');
            Route::get('/company-detail/{id}', [HomeController::class, 'companyDetail'])->name('companyDetail');
        });

        Route::get('/login', [HomeController::class, 'login'])->name('login');
        Route::post('/login-post', [HomeController::class, 'loginPost'])->name('loginPost');
        Route::post('/logout', [HomeController::class, 'logOut'])->name('logout');

        Route::get('/register', [HomeController::class, 'register'])->name('register');
        Route::post('/save-register', [HomeController::class, 'saveRegister'])->name('saveRegister');
    });

    ///////////////////////////////////
    Route::get('/logon', [DashboardController::class, 'logon'])->name('logon');
    Route::post('/check-logon', [DashboardController::class, 'checkLogon'])->name('checkLogon');
    ///////////////////////////////////

    Route::group(['prefix' => 'dashboard', 'middleware' => 'admin.auth'], function () {
        Route::get('/', [DashboardController::class, 'admin'])->name('dashboard');
        Route::get('/index', [DashboardController::class, 'admin']);

        Route::group(['prefix' => 'career'], function () {
            Route::get('/career-list', [DashboardController::class, 'careerListDashboard'])->name('careerList.dashboard');
            Route::get('/search-career-list', [DashboardController::class, 'searchCareerList'])->name('searchCareerList.dashboard');
            Route::get('/job-detail/{id}', [DashboardController::class, 'careerDetailDashboard'])->name('careerDetail.dashboard');
            Route::get('/career-add', [DashboardController::class, 'careerAddDashboard'])->name('careerAdd.dashboard');
            Route::post('/save-add-career', [DashboardController::class, 'saveAddCareerDashboard'])->name('saveAddCareer.dashboard');
            Route::get('/career-edit/{id}', [DashboardController::class, 'careerEditDashboard'])->name('editCareer.dashboard');
            Route::post('/save-edit-career', [DashboardController::class, 'saveEditCareerDashboard'])->name('saveEditCareer.dashboard');
            Route::get('/delete-career/{id}', [DashboardController::class, 'deleteCareerDashboard'])->name('deleteCareer.dashboard');
        });

        Route::group(['prefix' => 'job'], function () {
            Route::get('/job-list', [DashboardController::class, 'jobListDashboard'])->name('jobList.dashboard');
            Route::get('/search-job-list', [DashboardController::class, 'searchJobList'])->name('searchJobList.dashboard');
            Route::get('/job-detail/{id}', [DashboardController::class, 'jobDetailDashboard'])->name('jobDetail.dashboard');
            Route::get('/job-add', [DashboardController::class, 'jobAddDashboard'])->name('jobAdd.dashboard');
            Route::post('/save-add-job', [DashboardController::class, 'saveAddJobDashboard'])->name('saveAddJob.dashboard');
            Route::get('/job-edit/{id}', [DashboardController::class, 'jobEditDashboard'])->name('editJob.dashboard');
            Route::post('/save-edit-job', [DashboardController::class, 'saveEditJobDashboard'])->name('saveEditJob.dashboard');

            Route::get('/saved-job', [DashboardController::class, 'savedJobDashboard'])->name('savedJob.dashboard');

            Route::get('/application-list', [DashboardController::class, 'applicationsListDashboard'])->name('applicationsList.dashboard');

            Route::get('/delete-job/{id}', [DashboardController::class, 'deleteJobDashboard'])->name('deleteJob.dashboard');
        });

        Route::group(['prefix' => 'cv'], function () {
            Route::get('/user-cv-list', [DashboardController::class, 'userCvsListDashboard'])->name('userCvsList.dashboard');
        });

        //
        Route::group(['prefix' => 'company'], function () {
            Route::get('/company-list', [DashboardController::class, 'companyListDashboard'])->name('companyList.dashboard');
            Route::get('/search-company-list', [DashboardController::class, 'searchCompanyList'])->name('searchCompanyList.dashboard');
            Route::get('/company-detail/{id}', [DashboardController::class, 'companyDetailDashboard'])->name('companyDetail.dashboard');
            Route::get('/company-add', [DashboardController::class, 'companyAddDashboard'])->name('companyAdd.dashboard');
            Route::post('/save-add-company', [DashboardController::class, 'saveAddcompanyDashboard'])->name('saveAddCompany.dashboard');
            Route::get('/company-edit/{id}', [DashboardController::class, 'companyEditDashboard'])->name('editCompany.dashboard');
            Route::post('/save-edit-company', [DashboardController::class, 'saveEditCompanyDashboard'])->name('saveEditCompany.dashboard');
            Route::get('/delete-company/{id}', [DashboardController::class, 'deleteCompanyDashboard'])->name('deleteCompany.dashboard');
        });

        Route::group(['prefix' => 'user'], function () {
            Route::get('/user-list', [DashboardController::class, 'userList'])->name('userList');
            Route::get('/user-add', [DashboardController::class, 'userAdd'])->name('userAdd');
            Route::post('/save-add-user', [DashboardController::class, 'saveAddUser'])->name('saveAddUser');
            Route::get('/user-edit/{id}', [DashboardController::class, 'useredit'])->name('useredit');
            Route::post('/save-edit-user', [DashboardController::class, 'saveEditUser'])->name('saveEditUser');
            Route::get('/delete-user/{id}', [DashboardController::class, 'deleteUser'])->name('deleteUser');
        });
        
        Route::post('/logout', [DashboardController::class, 'logOut'])->name('logout.dashboard');
    });
});
