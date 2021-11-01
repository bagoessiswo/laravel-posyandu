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

Route::get('/login', function () {
    return redirect('/');
});

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

Route::get('/contact', function () {
    return view('contact' , [
        "title" => "Contact Us",
    ]);

});

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

Route::get('/admin/test', function() {
    return view('admin.test', []);
});

Route::get('/admin/login', function() {
    return view('admin.login', []);
});



