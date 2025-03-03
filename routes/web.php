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
use App\Models\Project;

Route::group(['middleware' => ['auth']], function () {
    Route::get('/wpadmin', [AdminController::class, 'wpadmin']);
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard']);
});

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/wpadmin-login', [SessionController::class, 'index'])->name('login');
Route::post('/session/login', [SessionController::class, 'login']);
Route::get('/session/logout', [SessionController::class, 'logout']);
Route::get('/session/register', [SessionController::class, 'register']);
Route::post('/session/register', [SessionController::class, 'createUser']);

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

Route::post('/projects/{id}/assign/{featureId}', [ProjectController::class, 'assignProject']);
Route::post('/projects/{id}/progress/{featureId}', [ProjectController::class, 'updateProgress']);

