<?php


use App\Models\Category;
use App\Models\Food;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\FoodsController;
use Illuminate\Http\Request;

Route::get('/', [FoodsController::class, 'index']);
Route::get('/Home', [PagesController::class, 'warehouse']);
Route::get('/posts', [PostsController::class, 'index']);
//Auth::routes();

Route::get('/foods/warehouse', [FoodsController::class, 'warehouse']);
Route::get('/foods/search', [FoodsController::class, 'search']);
Route::resource('foods', FoodsController::class);






//Route::get("/search", function(Request $request){
//    $tukhoa = ($request->has('tukhoa'))? $request->query('tukhoa'):"";
//    $tukhoa = trim(strip_tags($tukhoa));
//    $listsp=[];
//    if ($tukhoa!=""){
//        $listsp = DB::table("foods")->where("name", "count","description", "%$tukhoa%")->get();
//    }
//    return view('foods.search', ['tukhoa'=> $tukhoa , 'listsp'=>$listsp]);
//});
/*Route::get('/products', [
    ProductsController::class,
    'index' //index function of ProductsController
])->name('products');
*/

//how to validate "id only integer" ?
//Regular Expression
/*
Route::get('/products/{productName}/{id}', [
    ProductsController::class,
    'detail'
])->where([
    'productName' => '[a-zA-Z0-9\s]+',
    'id' => '[0-9]+'
]);
*/
/*
Route::get('/products/{productName}', [
    ProductsController::class,
    'detail'
]);
 */

/*
Route::get('/products/about', [
    ProductsController::class,
    'about'
]);

Route::get('/', function () {
    return view('home'); //response a view
    //return env('MY_NAME');
});


Route::get('/users', function () {
    return 'This is the users page';//response a string
});
//response an array
Route::get('/foods', function () {
    return ['sushi', 'sashimi', 'tofu'];
});
//response an object
Route::get('/aboutMe', function () {
    return response()->json([
        'name' => 'Nguyen Duc Hoang',
        'email' => 'sunlight4d@gmail.com'
    ]); //response
});
//response another request = redirect
Route::get('/something', function () {
    return redirect('/foods');//redirect to foods
});
*/
