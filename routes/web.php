<?php

use Illuminate\Support\Facades\Route;


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

use App\Http\Controllers\SessionController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TemplatechatController;
use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ScheduleController;
use App\Models\Project;


Route::group(['middleware' => ['auth']], function () {
    Route::get('/wpadmin', [AdminController::class, 'wpadmin']);
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard']);
    Route::resource('templatechats', TemplatechatController::class);
});


// Absence
Route::group(['middleware' => ['auth']], function () {
    Route::get('/absence/{day}/{month}/{year}/{jenis_absen}', [AbsenceController::class, 'index']);
    Route::get('/absence/create', [AbsenceController::class, 'create']);
    Route::post('/absence/create', [AbsenceController::class,'store']);
    Route::get('/absence/absent', [AbsenceController::class, 'absent']);
    Route::post('/absence/absent', [AbsenceController::class, 'store_absent']);
    Route::get('/absence/report', [AbsenceController::class, 'report']);
    Route::post('/absence/report', [AbsenceController::class, 'store_report']);
    Route::get('/absence/report/list/{day}/{month}/{year}/{jenis_absen}', [AbsenceController::class, 'list_report']);
    Route::get('/absence/calender', [AbsenceController::class, 'calender']);
    Route::get('/absence/shift', [AbsenceController::class, 'shift']);
    Route::get('/list-holiday', [AbsenceController::class, 'listHoliday']);
    Route::get('/add-holiday', [AbsenceController::class, 'addHoliday']);
    Route::post('/add-holiday', [AbsenceController::class, 'storeHoliday']);
    Route::get('/edit-holiday/{id}', [AbsenceController::class, 'editHoliday']);
    Route::post('/edit-holiday/{id}', [AbsenceController::class, 'updateHoliday']);
    Route::get('/delete-holiday/{id}', [AbsenceController::class, 'deleteHoliday']);
    Route::get('/absensi', [AbsenceController::class, 'create1']);
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/myattendance', [AttendanceController::class, 'index']);
    Route::get('/create-myattendance', [AttendanceController::class, 'createMyattendance']);
    Route::post('/add-myattendance', [AttendanceController::class, 'addMyattendance']);
    Route::get('/edit-myattendance/{id}', [AttendanceController::class, 'editMyattendance']);
    Route::post('/update-myattendance/{user}', [AttendanceController::class, 'updateMyattendance']);
    Route::get('/delete-myattendance/{user}', [AttendanceController::class, 'deleteMyattendance']);
});

// Schedule
Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin/schedule', [ScheduleController::class, 'index']);
    Route::get('/admin/schedule/create', [ScheduleController::class, 'create']);
    Route::post('/admin/schedule/create', [ScheduleController::class,'store']);
    Route::get('/admin/schedule/delete/{id}', [ScheduleController::class, 'delete']);
    Route::get('/admin/schedule/edit/{id}', [ScheduleController::class, 'edit']);
    Route::post('/admin/schedule/update/{id}', [ScheduleController::class, 'update']);
    Route::get('/admin/schedule/updateStatus/{id}', [ScheduleController::class, 'updateStatus']);
});


Route::get('/home', function () {
    return view('home');
});

Route::get('/wpadmin-login', [SessionController::class, 'index'])->name('login');
Route::post('/session/login', [SessionController::class, 'login']);
Route::get('/session/logout', [SessionController::class, 'logout']);
Route::get('/session/register', [SessionController::class, 'register']);
Route::post('/session/register', [SessionController::class, 'createUser']);

Route::get('/', [ProjectController::class, 'home']);
Route::Resource('projects', ProjectController::class);
Route::post('/projects/{id}/update-json', [ProjectController::class, 'updateJson']);
Route::get('/projects/{id}/kanban', function($id) {
    $project = Project::findOrFail($id);

    // Pisahkan fitur berdasarkan status
    $features = [
        'to_do' => [],
        'progress' => [],
        'done' => [],
    ];

    if($project->json == null) {
        return view('projects.kanban', compact('project', 'features'));
    }
    else {
        foreach ($project->json as $feature) {
            if ($feature['status'] == '0') {
                $features['to_do'][] = $feature;
            } elseif ($feature['status'] == '1') {
                $features['progress'][] = $feature;
            } else {
                $features['done'][] = $feature;
            }
        }   
    }

    return view('projects.kanban', compact('project', 'features'));
});

Route::resource('orders', OrderController::class);
Route::get('/orders/{id}/getPO', [OrderController::class, 'getPO']);
