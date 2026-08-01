<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Spatie\Browsershot\Browsershot;
use App\Models\Scholarship;
use App\Models\MedicalCard;

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/login');
});

/*
|--------------------------------------------------------------------------
| Student Authentication
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'login'])
    ->name('login');

Route::post('/sendOtp', [AuthController::class, 'sendOtp'])
    ->name('sendOtp');

Route::post('/verifyLogin', [AuthController::class, 'verifyLogin'])
    ->name('verifyLogin');

Route::get('/register', [AuthController::class, 'register'])
    ->name('register');

Route::post('/register', [AuthController::class, 'storeRegister'])
    ->name('register.store');

/*
|--------------------------------------------------------------------------
| Forgot Password
|--------------------------------------------------------------------------
*/

Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])
    ->name('forgot.password');

Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])
    ->name('forgot.send');

Route::get('/reset-password', [AuthController::class, 'resetPassword'])
    ->name('reset.password');

Route::post('/reset-password', [AuthController::class, 'updatePassword'])
    ->name('reset.update');
/*
|--------------------------------------------------------------------------
| Student Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', [AuthController::class, 'dashboard'])
    ->name('dashboard');

/*
|--------------------------------------------------------------------------
| Student Profile
|--------------------------------------------------------------------------
*/

Route::get('/my-profile', [AuthController::class, 'profile'])
    ->name('profile');

Route::post('/my-profile/update', [AuthController::class, 'updateProfile'])
    ->name('profile.update');

/*
|--------------------------------------------------------------------------
| SOS Module
|--------------------------------------------------------------------------
*/

Route::get('/sos', [AuthController::class, 'sos'])
    ->name('sos');

Route::post('/sos/send', [AuthController::class, 'sendSos'])
    ->name('sos.send');

/*
|--------------------------------------------------------------------------
| Student Modules
|--------------------------------------------------------------------------
*/

Route::get('/health', [AuthController::class, 'health'])
    ->name('health');

Route::get('/hostel', [AuthController::class, 'hostel'])
    ->name('hostel');

Route::get('/scholarship', [AuthController::class, 'scholarship'])
    ->name('scholarship');

Route::get('/placement', [AuthController::class, 'placement'])
    ->name('placement');

Route::get('/events', [AuthController::class, 'studentEvents'])
    ->name('student.events');

Route::get('/complaints', [AuthController::class, 'complaints'])
    ->name('complaints');

Route::post('/complaints/store', [AuthController::class, 'storeComplaint'])
    ->name('complaints.store');

Route::get('/my-complaints', [AuthController::class, 'myComplaints'])
    ->name('my.complaints');

Route::get('/chatbot', [AuthController::class, 'chatbot'])
    ->name('chatbot');
    /*
|--------------------------------------------------------------------------
| Admin Authentication
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [AuthController::class, 'adminLogin'])
    ->name('admin.login');

Route::post('/admin/login', [AuthController::class, 'verifyAdminLogin'])
    ->name('admin.login.check');

Route::get('/admin/logout', [AuthController::class, 'adminLogout'])
    ->name('admin.logout');

/*
|--------------------------------------------------------------------------
| Admin Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/admin/dashboard', [AuthController::class, 'adminDashboard'])
    ->name('admin.dashboard');

/*
|--------------------------------------------------------------------------
| Student Management
|--------------------------------------------------------------------------
*/

Route::get('/admin/students', [AuthController::class, 'students'])
    ->name('admin.students');

Route::get('/admin/student/{id}', [AuthController::class, 'studentDetails'])
    ->name('admin.student.details');

Route::get('/admin/student/edit/{id}', [AuthController::class, 'editStudent'])
    ->name('admin.student.edit');

Route::post('/admin/student/update/{id}', [AuthController::class, 'updateStudent'])
    ->name('admin.student.update');

Route::delete('/admin/student/delete/{id}', [AuthController::class, 'deleteStudent'])
    ->name('admin.student.delete');

/*
|--------------------------------------------------------------------------
| Admin SOS Management
|--------------------------------------------------------------------------
*/

Route::get('/admin/sos', [AuthController::class, 'adminSOS'])
    ->name('admin.sos');

Route::post('/admin/sos/update/{id}', [AuthController::class, 'updateSOS'])
    ->name('admin.sos.update');

/*
|--------------------------------------------------------------------------
| Admin Complaint Management
|--------------------------------------------------------------------------
*/

Route::get('/admin/complaints', [AuthController::class, 'adminComplaints'])
    ->name('admin.complaints');

Route::post('/admin/complaints/update/{id}', [AuthController::class, 'updateComplaint'])
    ->name('admin.complaints.update');

/*
|--------------------------------------------------------------------------
| Admin Event Management
|--------------------------------------------------------------------------
*/

Route::get('/admin/events', [AuthController::class, 'events'])
    ->name('admin.events');

Route::post('/admin/events/store', [AuthController::class, 'storeEvent'])
    ->name('admin.events.store');

Route::delete('/admin/events/delete/{id}', [AuthController::class, 'deleteEvent'])
    ->name('admin.events.delete');

/*
|--------------------------------------------------------------------------
| Admin Health Management
|--------------------------------------------------------------------------
*/

Route::get('/health',[AuthController::class,'health'])
->name('health');

Route::get('/admin/health',[AuthController::class,'adminHealth'])
->name('admin.health');

Route::post('/admin/health/update',[AuthController::class,'updateHealth'])
->name('admin.health.update');
Route::get('/hostel',
[AuthController::class,'hostel'])
->name('hostel');
Route::post('/hostel/complaint',
[AuthController::class,'hostelComplaint'])
->name('hostel.complaint');


Route::post('/hostel/leave',
[AuthController::class,'hostelLeave'])
->name('hostel.leave');
Route::post('/admin/hostel/complaint/{id}',
[AuthController::class,'updateHostelComplaint'])
->name('admin.hostel.complaint.update');


Route::post('/admin/hostel/leave/{id}',
[AuthController::class,'updateHostelLeave'])
->name('admin.hostel.leave.update');


Route::get('/admin/hostel',
[AuthController::class,'adminHostel'])
->name('admin.hostel');
Route::get('/admin/visitor', [AuthController::class,'adminVisitor'])
    ->name('admin.visitor');

Route::post('/admin/visitor/{id}', [AuthController::class,'updateVisitorStatus'])
    ->name('admin.visitor.update');
    Route::get('/visitor', [AuthController::class, 'visitor'])
    ->name('visitor');

Route::post('/visitor/store', [AuthController::class, 'saveVisitor'])
    ->name('visitor.store');
    Route::post('/visitor/store',
[AuthController::class,'saveVisitor'])
->name('visitor.store');
Route::get('/scholarship',[AuthController::class,'scholarship'])
->name('scholarship');

Route::post('/scholarship/apply/{id}',
[AuthController::class,'applyScholarship'])
->name('scholarship.apply');

Route::get('/admin/scholarship',
[AuthController::class,'adminScholarship'])
->name('admin.scholarship');

Route::post('/admin/scholarship/store',
[AuthController::class,'storeScholarship'])
->name('admin.scholarship.store');

Route::post('/admin/scholarship/status/{id}',
[AuthController::class,'updateScholarshipStatus'])
->name('admin.scholarship.status');
Route::delete(
    '/admin/scholarship/delete/{id}',
    [AuthController::class, 'deleteScholarship']
)->name('admin.scholarship.delete');
Route::get('/', function(){

    return view('auth.landing');

});
Route::get('/student-dashboard-shot', function () {

    $html = view('auth.dashboard')->render();

    Browsershot::html($html)
        ->setNodeBinary('C:\Program Files\nodejs\node.exe')
        ->setChromePath('C:\Users\Dharshinigopu\.cache\puppeteer\chrome\win64-150.0.7871.24\chrome-win64\chrome.exe')
        ->noSandbox()
        ->windowSize(1920,1080)
        ->save(public_path('assets/images/student-dashboard.png'));

    return "Student Dashboard Screenshot Saved";

});
Route::get('/student-mobile-shot', function () {

    $html = view('auth.dashboard')->render();


    Browsershot::html($html)
        ->setNodeBinary('C:\Program Files\nodejs\node.exe')
        ->setChromePath('C:\Users\Dharshinigopu\.cache\puppeteer\chrome\win64-150.0.7871.24\chrome-win64\chrome.exe')
        ->noSandbox()
        ->device('iPhone X')
        ->save(public_path('assets/images/student-mobile.png'));


    return "Mobile Screenshot Saved";

});
Route::get('/medical-card', [AuthController::class, 'medicalCard'])
    ->name('medical.card');

Route::post('/medical-card/save', [AuthController::class, 'saveMedicalCard'])
    ->name('medical.card.save');