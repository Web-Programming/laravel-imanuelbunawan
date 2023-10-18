<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\ProdiController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile', function () {
    return view('profile');
});
Route::get('/mahasiswa/{nama}', function ($nama = "Immanuel") {
    echo "<h1>Nama Saya $nama</h1>";
});
//route with more than 1 paramater
Route::get('/mahasiswa/{nama?}/{pekerjaan?}', function ($nama = "Immanuel", $pekerjaan = "Mahasiswa") {
    echo "<h1>Nama Saya $nama , Saya seorang $pekerjaan </h2>";
});
//redirect
Route::get('/hubungi', function () {
    echo"<h1>Hubungi Kami</h1>";
})->name("call");

Route::Redirect("/contact", "/hubungi");

Route::get('/profile', function () {
    echo"<a href ='". route('call'). "'>" . route('call'). "</a>";
});

//route group

Route::prefix("/dosen")->group(function(){
    Route::get("/jadwal", function() {
        echo"<h1>Jadwal dosen</h1>";
    });
    Route::get("/Materi", function() {
        echo"<h1>Materi Perkuliahan</h1>";
    });
});


Route::get('/dosen', function() {
     return view('dosen');
});
Route::get('/dosen/index', function() {
     return view('dosen.index');
});

Route::get('/fakultas' , function() {
    // return view('fakultas.index', ["ilkom" => "Fakultas Ilmu Komputer dan Rekayasa"]);
    // return view('fakultas.index', ["fakultas" => ["Fakultas Ilmu Komputer dan Rekayasa", "Fakultas Ilmu Ekonomi"]]);
    // return view('fakultas.index')->with ("fakultas",["Fakultas Ilmu Komputer dan Rekayasa", "Fakultas Ilmu Ekonomi"]);
    $kampus = "Universitas Multi Data Palembang";
    $fakultas = ["Fakultas Ilmu Komputer dan Rekayasa", "Fakultas Ilmu Ekonomi"];
    return view('fakultas.index', compact('fakultas', 'kampus'));
});

Route::GET('/prodi', [ProdiController::class, 'index']);

Route::resource("/kurikulum", KurikulumController::class);

Route::apiResource("/dosen", DosenController::class);