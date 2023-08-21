<?php

use App\Http\Controllers\ClasseController;
use App\Http\Controllers\CoursEnrollerController;
use App\Http\Controllers\CoursDeroulerController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SemestreController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// Routes publiques (pas besoin d'authentification)
Route::post('/login', [UserController::class, 'login']); // Connexion
Route::post('/register', [UserController::class, 'register']); // Inscription (si nécessaire)
// Routes protégées (nécessitent une authentification)
Route::group(['middleware' => 'auth:sanctum'], function () {
    // Gestion des utilisateurs
    Route::get('/users', [UserController::class, 'index']); // Liste des utilisateurs
    Route::get('/user/{id}', [UserController::class, 'show']); // Détails d'un utilisateur
    Route::put('/user/{id}', [UserController::class, 'update']); // Mettre à jour un utilisateur
    Route::delete('/user/{id}', [UserController::class, 'destroy']); // Supprimer un utilisateur

    // ... Other protected routes ...

    // Logout route
    Route::post('/logout', [UserController::class, 'logout']); // Déconnexion
});


//Module
Route::get('/module',[ModuleController::class,'index']);
Route::post('/storeModule',[ModuleController::class,'store']);
Route::get('/showModule/{id}',[ModuleController::class,'show']);
Route::put('/updateModule/{id}',[ModuleController::class,'update']);
Route::delete('/deleteModule/{id}',[ModuleController::class,'destroy']);

//Semestre
Route::get('/semestre',[SemestreController::class,'index']);
Route::post('/storeSemestre',[SemestreController::class,'store']);
Route::get('/showSemestre/{id}',[SemestreController::class,'show']);
Route::put('/updateSemestre/{id}',[SemestreController::class,'update']);
Route::delete('/deleteSemestre/{id}',[SemestreController::class,'destroy']);


//Classe
Route::get('/classe',[ClasseController::class,'index']);
Route::post('/storeClasse',[ClasseController::class,'store']);
Route::get('/showClasse/{id}', [ClasseController::class, 'show']);
Route::put('/updateClasse/{id}', [ClasseController::class, 'update']);
Route::delete('/deleteClasse/{id}', [ClasseController::class, 'destroy']);


//Cours_Enroller
Route::get('/coursE',[CoursEnrollerController::class,'index']);
Route::post('/storeCoursE',[CoursEnrollerController::class,'store']);
Route::get('/showCoursE/{id}', [CoursEnrollerController::class, 'show']);
Route::put('/updateCoursE/{id}', [CoursEnrollerController::class, 'update']);
Route::delete('/deleteCoursE/{id}', [CoursEnrollerController::class, 'destroy']);


//Cours_Derouler
Route::get('/coursD',[CoursDeroulerController::class,'index']);
Route::post('/storeCoursD',[CoursDeroulerController::class,'store']);
Route::get('/showCoursD/{id}', [CoursDeroulerController::class, 'show']);
Route::put('/updateCoursD/{id}', [CoursDeroulerController::class, 'updateCoursDerouler']);
Route::delete('/deleteCoursD/{id}', [CoursDeroulerController::class, 'destroy']);



Route::get('/post',[PostController::class,'index']);
Route::get('/show/{id}',[PostController::class,'show']);
Route::post('/store',[PostController::class,'store']);
Route::put('/update/{id}',[PostController::class,'update']);
Route::delete('/destroy/{id}',[PostController::class,'destroy']);

Route::get('/test', [TestController::class, 'index']);
Route::post('/test', [TestController::class, 'index']);
Route::put('/test', [TestController::class, 'update']);
Route::delete('/test', [TestController::class, 'destroy']);

