<?php

use Illuminate\Support\Facades\Route;
use League\MimeTypeDetection\FinfoMimeTypeDetector;
use Symfony\Component\HttpKernel\HttpCache\ResponseCacheStrategy;

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
// HOME PAGE 
// Route::get('/', function () {
//     return view('home.index');
// })->name('home.index');
 
// //contact page
// Route::get('/contact',function(){
//     return view('home.contact');
// })->name('home.contact');

        Route::view('/', 'home.index')->name('home.index');
        Route::view('/contact', 'home.contact')->name('home.contact');;
        $posts =[
            1=>[
                'title' =>'laravl',
                'content'=> 'used for back end development',
                'is_new'=>true,
                ' '=> 'true'
            ],
    
            2=>[
                'title' =>'react',
                'content'=> 'used for front end development',
                'is_new'=>false// in boolean use without quates
            ],
            
        ];

Route::get('/post',function() use($posts){
    // reading user input
    // dd('request()->all)');
    dd( request()->input('page',1));
return view('post.index',['posts'=>$posts]);
});

//passing and rendering route
Route::get('/post/{id}',function($id) use($posts){
   
    return view('post.show',['post'=>$posts[$id]]);
    // return 'Test :-'.$id;
})->name('post.show');




 
//assign root value 
Route::get('/recent-posts/{is_your?}',function($mobile = '0920219604' ){
    return 'your phone is'.$mobile.'correctly';
}) ->where([
    'is_your'=>'[0-9]+'  //  this implise that the method recives number  only unless 404 notfound error wecan also  define globally in our project routeserviceprovider go to the buttom  Route::pattern('is_your'=>'[0-9]+');
    
])->name('posts.recent.index')->middleware('auth');


// Responces codes header and cookies
// grouping routes 
Route::prefix('/fun')->name('fun.')->group(function()use($posts){
    Route::get('responce',function()use($posts){
        return response($posts,201)->header('content-type','application/json')->cookie('MY_COOKIE','nuru',3600);
    });
    
    Route::get('responce',function(){
     return redirect('/contact');
    });
    
    //back in the   request
    Route::get('back',function(){
        return back();
    });
    //redirect responce
    Route::get('name-route', function(){
        return redirect()->route('post.show',['id'=>1]);
    });
    
    Route::get('away',function(){
        return redirect()-> away('https://google.com');
    });
    
    Route::get('json', function() use($posts){
        return response()->json($posts);
    });
    
    Route::get('download', function() use($posts){
        return response()->download('E:\laravel\practice\public/nnn.jpg');
    });
    
    
    
    
});
