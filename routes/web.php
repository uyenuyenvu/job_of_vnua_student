<?php

// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend;
use App\Http\Controllers\Backend;
use App\Http\Controllers\Auth;
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

Route::get('/logout',[Auth\StudentAuthController::class,'logout'])->name('logout');
Route::get('/login',[Auth\StudentAuthController::class,'showLoginForm'])->name('login');
Route::post('/login',[Auth\StudentAuthController::class,'login'])->name('loginProcess');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login',[Auth\AdminAuthController::class,'showLoginForm'])->name('admin.login');
    Route::post('/login',[Auth\AdminAuthController::class,'login'])->name('admin.loginProcess');
    Route::get('/logout',[Auth\AdminAuthController::class,'logout'])->name('admin.logout');

    Route::middleware('auth.admin')->group(function (){
        Route::get('/',[Backend\DashboardController::class,'indexUser'])->name('admin.dashboard');

        Route::group(['prefix'=>'users'],function(){
            Route::get('/', [Backend\UserController::class,'index'])->name('admin.user.index');
            Route::get('/get-data', [Backend\UserController::class,'getData'])->name('admin.user.get-data');
            Route::post('/store', [Backend\UserController::class,'store'])->name('admin.user.store');
            Route::put('/update/{id}', [Backend\UserController::class,'update'])->name('admin.user.update');
            Route::delete('/delete/{id}', [Backend\UserController::class,'destroy'])->name('admin.user.destroy');
            Route::put('/change-status/{id}',[Backend\UserController::class,'changeStatus'])->name('admin.user.change-status');
            Route::get('/{id}/edit',[Backend\UserController::class,'edit'])->name('admin.user.edit');
        });

        Route::group(['prefix'=>'employers'],function(){
            Route::get('/', [Backend\EmployerController::class,'index'])->name('admin.employer.index');
            Route::get('/get-data', [Backend\EmployerController::class,'getData'])->name('admin.employer.get-data');
            Route::post('/store', [Backend\EmployerController::class,'store'])->name('admin.employer.store');
            Route::put('/update/{id}', [Backend\EmployerController::class,'update'])->name('admin.employer.update');
            Route::delete('/delete/{id}', [Backend\EmployerController::class,'destroy'])->name('admin.employer.destroy');
            Route::put('/change-status/{id}',[Backend\EmployerController::class,'changeStatus'])->name('admin.employer.change-status');
            Route::get('/{id}/edit',[Backend\EmployerController::class,'edit'])->name('admin.employer.edit');
        });

        Route::group(['prefix'=>'students'],function(){
            Route::get('/', [Backend\StudentController::class,'index'])->name('admin.student.index');
            Route::get('/get-data', [Backend\StudentController::class,'getData'])->name('admin.student.get-data');
            Route::post('/store', [Backend\StudentController::class,'store'])->name('admin.student.store');
            Route::put('/update/{id}', [Backend\StudentController::class,'update'])->name('admin.student.update');
            Route::delete('/delete/{id}', [Backend\StudentController::class,'destroy'])->name('admin.student.destroy');
            Route::put('/change-status/{id}',[Backend\StudentController::class,'changeStatus'])->name('admin.student.change-status');
            Route::get('/{id}/edit',[Backend\StudentController::class,'edit'])->name('admin.student.edit');
            Route::post('/import',[Backend\StudentController::class,'import'])->name('admin.student.import');
            Route::get('/download-excel-template',[Backend\StudentController::class,'downloadExcel'])->name('admin.student.download');
        });

        Route::group([
            'prefix' => 'category',
            'as' => 'category.'
        ], function () {
            Route::get('/', [Backend\CategoryController::class, 'index'])->name('index');
            Route::get('/getData',  [Backend\CategoryController::class, 'getData'])->name('getData');
            Route::get('show/{id}',  [Backend\CategoryController::class, 'show'])->name('show');
            Route::get('create',  [Backend\CategoryController::class, 'create'])->name('create');
            Route::post('/store',  [Backend\CategoryController::class, 'store'])->name('store');
            Route::post('update/{id}',  [Backend\CategoryController::class, 'update'])->name('update');
            Route::delete('destroy/{id}',  [Backend\CategoryController::class, 'destroy'])->name('destroy');
            Route::get('{id}/edit',  [Backend\CategoryController::class, 'edit'])->name('edit');
            Route::post('/check-subject-id-unique',  [Backend\CategoryController::class, 'checkSubjectIdUnique']);
            Route::post('/check-subject-id-unique-update',  [Backend\CategoryController::class, 'checkSubjectIdUniqueUpdate']);
        });

        Route::group([
            'prefix' => 'facuty',
            'as' => 'facuty.'
        ], function () {
            Route::get('/', [Backend\FacutyController::class, 'index'])->name('index');
            Route::get('/getData',  [Backend\FacutyController::class, 'getData'])->name('getData');
            Route::get('show/{id}',  [Backend\FacutyController::class, 'show'])->name('show');
            Route::get('create',  [Backend\FacutyController::class, 'create'])->name('create');
            Route::post('/store',  [Backend\FacutyController::class, 'store'])->name('store');
            Route::put('update/{id}',  [Backend\FacutyController::class, 'update'])->name('update');
            Route::delete('destroy/{id}',  [Backend\FacutyController::class, 'destroy'])->name('destroy');
            Route::get('{id}/edit',  [Backend\FacutyController::class, 'edit'])->name('edit');
            Route::post('/check-subject-id-unique',  [Backend\FacutyController::class, 'checkSubjectIdUnique']);
            Route::post('/check-subject-id-unique-update',  [Backend\FacutyController::class, 'checkSubjectIdUniqueUpdate']);
        });

        Route::group([
            'prefix' => 'company',
            'as' => 'company.'
        ], function () {
            Route::get('/', [Backend\CompanyController::class, 'index'])->name('index');
            Route::get('/getData',  [Backend\CompanyController::class, 'getData'])->name('getData');
            Route::get('show/{id}',  [Backend\CompanyController::class, 'show'])->name('show');
            Route::get('create',  [Backend\CompanyController::class, 'create'])->name('create');
            Route::post('/store',  [Backend\CompanyController::class, 'store'])->name('store');
            Route::post('update/{id}',  [Backend\CompanyController::class, 'update'])->name('update');
            Route::delete('destroy/{id}',  [Backend\CompanyController::class, 'destroy'])->name('destroy');
            Route::get('{id}/edit',  [Backend\CompanyController::class, 'edit'])->name('edit');
            Route::post('/check-subject-id-unique',  [Backend\CompanyController::class, 'checkSubjectIdUnique']);
            Route::post('/check-subject-id-unique-update',  [Backend\CompanyController::class, 'checkSubjectIdUniqueUpdate']);
        });

        Route::group([
            'prefix' => 'post',
            'as' => 'post.'
        ], function () {
            Route::get('/', [Backend\PostController::class, 'index'])->name('index');
            Route::get('/get-data',  [Backend\PostController::class, 'getData'])->name('getData');
            Route::get('show/{id}',  [Backend\PostController::class, 'show'])->name('show');
            Route::get('create',  [Backend\PostController::class, 'create'])->name('create');
            Route::post('/store',  [Backend\PostController::class, 'store'])->name('store');
            Route::put('update/{id}',  [Backend\PostController::class, 'update'])->name('update');
            Route::delete('delete/{id}',  [Backend\PostController::class, 'destroy'])->name('destroy');
            Route::get('{id}/edit',  [Backend\PostController::class, 'edit'])->name('edit');
            Route::post('/check-subject-id-unique',  [Backend\PostController::class, 'checkSubjectIdUnique']);
            Route::post('/check-subject-id-unique-update',  [Backend\PostController::class, 'checkSubjectIdUniqueUpdate']);
            Route::post('/get-address/{id}',  [Backend\PostController::class, 'getAddress']);
            Route::put('/change-status/{id}',[Backend\PostController::class,'changeStatus'])->name('admin.user.change-status');
        });
    });

});

Route::group(['prefix' => 'employers'], function () {
    Route::get('/login',[Auth\EmployerAuthController::class,'showLoginForm'])->name('employers.login');
    Route::post('/login',[Auth\EmployerAuthController::class,'login'])->name('employers.loginProcess');
    Route::get('/logout',[Auth\EmployerAuthController::class,'logout'])->name('employers.logout');
    Route::get('/register',[Auth\EmployerRegisterController::class,'showRegistrationForm'])->name('employers.register');
    Route::post('/register',[Auth\EmployerRegisterController::class,'register'])->name('employers.registerProcess');

    Route::post('/companies/store',[Backend\CompanyController::class,'store'])->name('employers.company.store');

    Route::middleware('auth.employer')->group(function (){
        Route::get('/',[Backend\DashboardController::class,'indexEmployer'])->name('employers.dashboard');
        Route::get('/students', [Backend\StudentController::class, 'indexEmployer'])->name('employers.student.index');
        Route::get('/students/get-data', [Backend\StudentController::class, 'getDataEmployer'])->name('employers.student.data');
        Route::get('/students/cv/{id}', [Backend\StudentController::class, 'downloadFileCV'])->name('employers.student.cv');


        Route::group([
            'prefix' => 'post',
            'as' => 'employer.post.'
        ], function () {
            Route::get('/', [Backend\PostController::class, 'indexEmployer'])->name('index');
            Route::get('/get-data',  [Backend\PostController::class, 'getDataEmployer'])->name('getData');
            Route::get('show/{id}',  [Backend\PostController::class, 'show'])->name('show');
            Route::get('create',  [Backend\PostController::class, 'create'])->name('create');
            Route::post('/store',  [Backend\PostController::class, 'store'])->name('store');
            Route::put('update/{id}',  [Backend\PostController::class, 'update'])->name('update');
            Route::delete('delete/{id}',  [Backend\PostController::class, 'destroy'])->name('destroy');
            Route::get('{id}/edit',  [Backend\PostController::class, 'edit'])->name('edit');
            Route::post('/check-subject-id-unique',  [Backend\PostController::class, 'checkSubjectIdUnique']);
            Route::post('/check-subject-id-unique-update',  [Backend\PostController::class, 'checkSubjectIdUniqueUpdate']);
            Route::post('/get-address/{id}',  [Backend\PostController::class, 'getAddress']);
            Route::put('/change-status/{id}',[Backend\PostController::class,'changeStatus'])->name('admin.user.change-status');
        });
    });
});

Route::group(['prefix'=>'students'],function (){
    Route::middleware('auth.student')->group(function (){
        Route::get('/',[Backend\DashboardController::class,'indexStudent'])->name('students.dashboard');
        Route::post('/upload-cv',[Backend\StudentController::class,'uploadFileCV'])->name('students.upload');
        Route::post('/profile/edit',[Backend\StudentController::class,'updateProfile'])->name('students.edit.profile');
    });
});

Route::get('/',[Frontend\HomeController::class, 'index'])->name('home');

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



