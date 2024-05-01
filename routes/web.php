<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProfessionController;
use App\Http\Controllers\RoomController;
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

Route::get('/', [HomeController::class, 'home'])->name('home');


//Auth
Route::get('/login', [AuthController::class, 'loginView'])->name('loginView');

Route::get('/register', [AuthController::class, 'registerView'])->name('registerView');

Route::post('register', [AuthController::class, 'register'])->name('register');

Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['admin'])->group(function (){

    //Floor

    Route::get('floor/index', [FloorController::class, 'index'])->name('indexFloor');
    Route::get('floor/create', [FloorController::class, 'create'])->name('createFloor');
    Route::post('floor/store', [FloorController::class, 'store'])->name('storeFloor');
    Route::get('floor/edit/{id}', [FloorController::class, 'edit'])->name('editFloor');
    Route::post('floor/update/{id}', [FloorController::class, 'update'])->name('updateFloor');
    Route::get('floor/delete/{id}', [FloorController::class, 'delete'])->name('deleteFloor');

    //Room

    Route::get('room/index', [RoomController::class, 'index'])->name('indexRoom');
    Route::get('room/create', [RoomController::class, 'create'])->name('createRoom');
    Route::post('room/store', [RoomController::class, 'store'])->name('storeRoom');
    Route::get('room/edit/{id}', [RoomController::class, 'edit'])->name('editRoom');
    Route::post('room/update/{id}', [RoomController::class, 'update'])->name('updateRoom');
    Route::get('room/delete/{id}', [RoomController::class, 'delete'])->name('deleteRoom');
    Route::get('room/detail/{id}', [RoomController::class, 'detail'])->name('detailRoom');



    //Admin App
    Route::get('admin/app/index', [ApplicationController::class, 'adminIndex'])->name('adminIndexApp');
    Route::get('admin/app/show/{id}', [ApplicationController::class, 'adminShow'])->name('adminShowApp');
    Route::get('admin/app/download/{id}', [ApplicationController::class, 'adminDownload'])->name('adminDownloadApp');

    //Faculty
    Route::get('faculty/index', [FacultyController::class, 'index'])->name('indexFaculty');
    Route::get('faculty/create', [FacultyController::class, 'create'])->name('createFaculty');
    Route::post('faculty/store', [FacultyController::class, 'store'])->name('storeFaculty');
    Route::get('faculty/edit/{id}', [FacultyController::class, 'edit'])->name('editFaculty');
    Route::post('faculty/update/{id}', [FacultyController::class, 'update'])->name('updateFaculty');
    Route::get('faculty/delete/{id}', [FacultyController::class, 'delete'])->name('deleteFaculty');

    //Profession
    Route::get('profession/index', [ProfessionController::class, 'index'])->name('indexProfession');
    Route::get('profession/create', [ProfessionController::class, 'create'])->name('createProfession');
    Route::post('profession/store', [ProfessionController::class, 'store'])->name('storeProfession');
    Route::get('profession/edit/{id}', [ProfessionController::class, 'edit'])->name('editProfession');
    Route::post('profession/update/{id}', [ProfessionController::class, 'update'])->name('updateProfession');
    Route::get('profession/delete/{id}', [ProfessionController::class, 'delete'])->name('deleteProfession');

    //Group
    Route::get('group/index', [GroupController::class, 'index'])->name('indexGroup');
    Route::get('group/create', [GroupController::class, 'create'])->name('createGroup');
    Route::post('group/store', [GroupController::class, 'store'])->name('storeGroup');
    Route::get('group/edit/{id}', [GroupController::class, 'edit'])->name('editGroup');
    Route::post('group/update/{id}', [GroupController::class, 'update'])->name('updateGroup');
    Route::get('group/delete/{id}', [GroupController::class, 'delete'])->name('deleteGroup');


    //Attachment
    Route::get('success/app', [ApplicationController::class, 'successApp'])->name('successApp');
    Route::get('attach/create/{id}', [AttachmentController::class, 'create'])->name('createAttach');
    Route::post('attach/store', [AttachmentController::class, 'store'])->name('storeAttach');
    Route::get('attach/delete/{id}', [AttachmentController::class, 'delete'])->name('deleteAttach');
    Route::get('attach/move/{id}', [AttachmentController::class, 'move'])->name('moveAttach');
    Route::post('moveattach', [AttachmentController::class, 'storeMove'])->name('storeMoveAttach');

    //Message
    Route::post('message/store', [MessageController::class, 'store'])->name('storeMessage');
});

//pdf
Route::get('/generate-pdf/{id}', [PDFController::class, 'generatePDF'])->name('generatePDF');

Route::middleware(['student'])->group(function () {
    //Student
    Route::get('app/index', [ApplicationController::class, 'index'])->name('indexApp');
    Route::get('app/create', [ApplicationController::class, 'create'])->name('createApp');
    Route::post('app/store', [ApplicationController::class, 'store'])->name('storeApp');
    Route::get('docs/index', [DocumentsController::class, 'index'])->name('indexDocs');
    //Message
    Route::get('message/index', [MessageController::class, 'index'])->name('indexMessage');
    Route::get('message/readAll', [MessageController::class, 'readAll'])->name('readAll');
});
