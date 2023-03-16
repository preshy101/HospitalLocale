<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\HospitalController;
use App\Http\Controllers\admin\DepartmentController;
use App\Http\Controllers\admin\DoctorController;
use App\Http\Controllers\admin\MedServiceController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

 Route::controller(HospitalController::class)->group(function(){
   Route::post('/search/hospital', 'searchHospital')->name('searchhospitals');
     });

Route::middleware(['auth','role:ADMIN'])->group(function(){
       Route::controller(HospitalController::class)->group(function(){
   Route::get('/hospital', 'allHospital')->name('hospital');
   Route::post('/store/hospital', 'addHospital')->name('store.hospital');
   Route::get('/view/hospital/{id}', 'viewHospital')->name('view.hospital');
   Route::get('/edit/permission/{id}', 'editHospital')->name('edit.hospital');
   Route::post('/update/hospital/{id}', 'updateHospital')->name('update.hospital');
   Route::get('/delete/hospital/{id}', 'deleteHospital')->name('delete.hospitals');
});
       Route::controller(DepartmentController::class)->group(function(){
   Route::get('/department', 'allDepartments')->name('departments');
   Route::post('/store/department', 'addDepartment')->name('store.department');
   Route::get('/view/department/{id}', 'viewDepartment')->name('view.department');
   Route::get('/edit/department/{id}', 'editDepartment')->name('edit.department');
   Route::post('/update/department/{id}', 'updateDepartment')->name('update.department');
   Route::get('/delete/department/{id}', 'deleteDepartment')->name('delete.department');
});
       Route::controller(DoctorController::class)->group(function(){
   Route::get('/doctor', 'allDoctor')->name('doctor');
   Route::post('/store/doctor', 'addDoctor')->name('store.doctor');
   Route::get('/view/doctor/{id}', 'viewDoctor')->name('view.doctor');
   Route::get('/edit/doctor/{id}', 'editDoctor')->name('edit.doctor');
   Route::post('/update/doctor/{id}', 'updateDoctor')->name('update.doctor');
   Route::get('/delete/doctor/{id}', 'deleteDoctor')->name('delete.doctor');
});
       Route::controller(MedServiceController::class)->group(function(){
   Route::get('/med-service', 'allMed')->name('medService');
   Route::post('/store/medService', 'addMedService')->name('store.medService');
//    Route::get('/view/doctor/{id}', 'viewDoctor')->name('view.doctor');
//    Route::get('/edit/doctor/{id}', 'editDoctor')->name('edit.doctor');
//    Route::post('/update/doctor/{id}', 'updateDoctor')->name('update.doctor');
//    Route::get('/delete/doctor/{id}', 'deleteDoctor')->name('delete.doctor');
});

});
require __DIR__.'/auth.php';