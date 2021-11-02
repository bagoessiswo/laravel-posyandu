<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminKecamatanController;
use App\Http\Controllers\AdminKelurahanController;
use App\Http\Controllers\AdminPosyanduController;
use App\Http\Controllers\AdminRoleController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminBalitaController;
use App\Http\Controllers\AdminHistoryPosyanduController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HistoryPosyanduController;

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


// Route::get('/', function () {
//     return view('home', [
//         "title" => "Home"
//     ]);
// });


Route::get('/', function () {
    return view('home' ,[
        "title" => "Home",
        "news" => [
            [
                "author" => "Dea",
                "author_ig" => "https://www.instagram.com/deaoktavia13",
                "title" => "ASIPS Week 1",
                "slug" => "asips-week-1",
                "body" => "Mengutip dari Buletin Stunting yang dikeluarkan oleh Kementerian Kesehatan RI..",
            ],
            [
                "author" => "Nadya",
                "author_ig" => "https://www.instagram.com/nadyalovita",
                "title" => "ASIPS Week 2",
                "slug" => "asips-week-2",
                "body" => "Mengutip dari Buletin Stunting yang dikeluarkan oleh Kementerian Kesehatan RI.."
            ]
        ]
    ]);

});

// Route::get('/login', function () {
//     return redirect('/');
// });

Route::get('/register', function () {
    return view('register' , [
        "title" => "Login",
    ]);

});

Route::get('/about', function () {
    return view('about' , [
        "title" => "About",
        "definisi" => " ASIPS (Aplikasi Surveilans & informasi Pencegahan Stunting) adalah aplikasi tepat guna yang 
        dapat menghubungkan antara kader posyandu dengan pihak puskesmas dan orang tua dalam 
        pencatatan status gizi balita sebagai upaya pencegahan stunting. 
        Aplikasi ini bertujuan untuk melacak, mencatat dan merekam status gizi balita secara 
        tepat, cepat dan sesuai dengan pengukuran di masing - masing posyandu. 
        Sehingga jika ada balita yang terindikasi mengalami STUNTING maka langsung terlihat pada rekap 
        laporan yang ada pada masing – masing posyandu."
    ]);

});

// Route::get('/contact', function () {
//     return view('contact' , [
//         "title" => "Contact Us",
//     ]);

// });

Route::get('/news', function () {
    
    return view('news' , [
        "title" => "News",
        "news" => [
            [
                "author" => "Dea",
                "author_ig" => "https://www.instagram.com/deaoktavia13",
                "title" => "ASIPS Week 1",
                "slug" => "asips-week-1",
                "body" => "Mengutip dari Buletin Stunting yang dikeluarkan oleh Kementerian Kesehatan RI..",
            ],
            [
                "author" => "Nadya",
                "author_ig" => "https://www.instagram.com/nadyalovita",
                "title" => "ASIPS Week 2",
                "slug" => "asips-week-2",
                "body" => "Mengutip dari Buletin Stunting yang dikeluarkan oleh Kementerian Kesehatan RI.."
            ]
        ]
       
    ]);
  
});

// halaman single blog_asips
Route::get('/news/{slug}' , function($slug){
    $blog_asips = [
        [
            "title" => "ASIPS Week Satu" ,
            "slug" => "asips-week-1" ,
            "author" => "Dea" ,
            "author_ig" => "https://www.instagram.com/deaoktavia13",
            "body" => "Mengutip dari Buletin Stunting yang dikeluarkan oleh Kementerian Kesehatan RI, 
            stunting adalah kondisi yang ditandai ketika panjang atau tinggi badan anak kurang 
            jika dibandingkan dengan umurnya."
        ] ,
        [
            "title" => "ASIPS Week Dua" ,
            "slug" => "asips-week-2" ,
            "author" => "Nadya" ,
            "author_ig" => "https://www.instagram.com/nadyalovita",
            "body" => "Mengutip dari Buletin Stunting yang dikeluarkan oleh Kementerian Kesehatan RI, 
            stunting adalah kondisi yang ditandai ketika panjang atau tinggi badan anak kurang 
            jika dibandingkan dengan umurnya."
        ] 
    ];



    $news = [];
    foreach($blog_asips as $asips){
        if($asips["slug"] === $slug){
            $news = $asips;
        }
    }
    return view('news', [
        "title" => $news['title'] ,
        "news" => $news
    ]);
});

// user login
Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

// history user
Route::get('/history', [HistoryPosyanduController::class, 'index']);

// admin login
Route::get('/admin', [AdminDashboardController::class, 'index']);
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index']);
Route::get('/admin/login', [AdminAuthController::class, 'index']);
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::get('/admin/logout', [AdminAuthController::class, 'logout']);

// kecamatan
Route::get('/admin/kecamatan', [AdminKecamatanController::class, 'index']);
Route::get('/admin/kecamatan/create', [AdminKecamatanController::class, 'create']);
Route::post('/admin/kecamatan', [AdminKecamatanController::class, 'store']);
Route::get('/admin/kecamatan/{id}', [AdminKecamatanController::class, 'edit']);
Route::patch('/admin/kecamatan/{id}', [AdminKecamatanController::class, 'update']);
Route::delete('/admin/kecamatan/{id}', [AdminKecamatanController::class, 'destroy']);

// kelurahan
Route::get('/admin/kelurahan', [AdminKelurahanController::class, 'index']);
Route::get('/admin/kelurahan/create', [AdminKelurahanController::class, 'create']);
Route::post('/admin/kelurahan', [AdminKelurahanController::class, 'store']);
Route::get('/admin/kelurahan/{id}', [AdminKelurahanController::class, 'edit']);
Route::patch('/admin/kelurahan/{id}', [AdminKelurahanController::class, 'update']);
Route::delete('/admin/kelurahan/{id}', [AdminKelurahanController::class, 'destroy']);

// posyandu
Route::get('/admin/posyandu', [AdminPosyanduController::class, 'index']);
Route::get('/admin/posyandu/create', [AdminPosyanduController::class, 'create']);
Route::post('/admin/posyandu', [AdminPosyanduController::class, 'store']);
Route::get('/admin/posyandu/{id}', [AdminPosyanduController::class, 'edit']);
Route::patch('/admin/posyandu/{id}', [AdminPosyanduController::class, 'update']);
Route::delete('/admin/posyandu/{id}', [AdminPosyanduController::class, 'destroy']);

// role
Route::get('/admin/role', [AdminRoleController::class, 'index']);
Route::get('/admin/role/create', [AdminRoleController::class, 'create']);
Route::post('/admin/role', [AdminRoleController::class, 'store']);
Route::get('/admin/role/{id}', [AdminRoleController::class, 'edit']);
Route::patch('/admin/role/{id}', [AdminRoleController::class, 'update']);
Route::delete('/admin/role/{id}', [AdminRoleController::class, 'destroy']);

// user
Route::get('/admin/user', [AdminUserController::class, 'index']);
Route::get('/admin/user/create', [AdminUserController::class, 'create']);
Route::post('/admin/user', [AdminUserController::class, 'store']);
Route::get('/admin/user/{id}', [AdminUserController::class, 'edit']);
Route::patch('/admin/user/{id}', [AdminUserController::class, 'update']);
Route::delete('/admin/user/{id}', [AdminUserController::class, 'destroy']);

// balita
Route::get('/admin/balita', [AdminBalitaController::class, 'index']);
Route::get('/admin/balita/create', [AdminBalitaController::class, 'create']);
Route::post('/admin/balita', [AdminBalitaController::class, 'store']);
Route::get('/admin/balita/{id}', [AdminBalitaController::class, 'edit']);
Route::patch('/admin/balita/{id}', [AdminBalitaController::class, 'update']);
Route::delete('/admin/balita/{id}', [AdminBalitaController::class, 'destroy']);

// history posyandu
Route::get('/admin/history-posyandu', [AdminHistoryPosyanduController::class, 'index']);
Route::get('/admin/history-posyandu/create', [AdminHistoryPosyanduController::class, 'create']);
Route::post('/admin/history-posyandu', [AdminHistoryPosyanduController::class, 'store']);
Route::get('/admin/history-posyandu/{id}', [AdminHistoryPosyanduController::class, 'edit']);
Route::patch('/admin/history-posyandu/{id}', [AdminHistoryPosyanduController::class, 'update']);
Route::delete('/admin/history-posyandu/{id}', [AdminHistoryPosyanduController::class, 'destroy']);

