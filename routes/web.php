<?php

use App\Http\Controllers\DocentesController;
use App\Http\Controllers\EstudiantesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdministradoresController;
use App\Http\Controllers\CursosController;
use App\Models\Docentes;

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

// Route::get('/prueba', [DocentesController::class, "test"])->name('test.init');
Route::post('/prueba', [DocentesController::class, "test"])->name("test");

Route::get('/', function () {
    return view('welcome');
})->name("main.page");
Route::get('/dashboard', function () {
    return view('dashboard');
})->name("dashboard.page");
// Auth Pages
Route::post('/login-form', [LoginController::class, "authenticationUser"])->name("login.auth");
Route::get('/logout', [LoginController::class, "destroy"])->name("session.destroy");
// User Pages
Route::get('/register-user', [UserController::class, "index"])->name("registerUser.form");
Route::post('/create-user', [UserController::class, "createAdmin"])->name('registerUser.create');
// Admin Pages
Route::post('/create-useradmin', [AdministradoresController::class, "create"])->name('registerAdmin.create');
Route::get('/show-useradmin/{content}', [AdministradoresController::class, "show"])->name('registerAdmin.show');
Route::post('/delete-useradmin/{id}', [AdministradoresController::class, "delete"])->name('registerAdmin.delete');
Route::post('/edit-useradmin/{id}', [AdministradoresController::class, "edit"])->name('registerAdmin.edit');
Route::post('/update-useradmin/{id}', [AdministradoresController::class, "update"])->name('registerAdmin.update');
// Estudent Pages
Route::post('/create-estudent', [EstudiantesController::class, "create"])->name('registerEstudent.create');
Route::get('/show-estudents/{content}', [EstudiantesController::class, "show"])->name('registerEstudent.show');
Route::post('/delete-estudent/{id}', [EstudiantesController::class, "delete"])->name('registerEstudent.delete');
Route::post('/edit-estudent/{id}', [EstudiantesController::class, "edit"])->name('registerEstudent.edit');
Route::post('/update-estudent/{id}', [EstudiantesController::class, "update"])->name('registerEstudent.update');
// Docent Pages
Route::post('/create-docente', [DocentesController::class, "create"])->name('registerDocente.create');
Route::get('/show-docente/{content}', [DocentesController::class, "show"])->name('registerDocente.show');
Route::post('/delete-docente/{id}', [DocentesController::class, "delete"])->name('registerDocente.delete');
Route::post('/edit-docente/{id}', [DocentesController::class, "edit"])->name('registerDocente.edit');
Route::post('/update-docente/{id}', [DocentesController::class, "update"])->name('registerDocente.update');
// Cursos Pages
Route::post('/create-curso/{tipo}', [CursosController::class, "create"])->name('registerCurso.create');
Route::get('/show-curso/{folder}/{content}/{tipo}', [CursosController::class, "show"])->name('registerCurso.show');
Route::post('/delete-curso/{id}/{tipo}/{folder}', [CursosController::class, "delete"])->name('registerCurso.delete');
Route::post('/edit-curso/{id}/{folder}', [CursosController::class, "edit"])->name('registerCurso.edit');
Route::get('/enable-curso/{id}/{folder}', [CursosController::class, "enableCursoView"])->name('registerCurso.enable');
Route::post('/update-curso/{id}/{tipo}/{folder}', [CursosController::class, "update"])->name('registerCurso.update');

Route::get(
    '/adminweb',
    function () {
        return view('admin');
    }
)->name("Admin.page");
Route::get('/contentAdmin/{folder}/{content}', [MainController::class, "contentController"])->name("content.dashboard");
Route::get('/contentAdmin', [MainController::class, "contentControllerRedirect"])->name("content.dashboard.extra");
Route::post('/login-forms', [LoginController::class, "authenticationAdmin"])->name("loginAdmin.auth");
Route::get('/logoutAdmin', [LoginController::class, "destroyAdmin"])->name("sessionAdmin.destroy");
