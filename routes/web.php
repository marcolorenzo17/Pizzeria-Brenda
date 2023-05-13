<?php

use App\Http\Controllers\ReciboController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WhoareweController;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Factura;
use Illuminate\Support\Facades\Auth;

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


Route::get('/pizzasAnon', function() {
    $products = DB::table('products')->where('type', '=', 'Pizza')->get();
    return view('productsAnon', ['products' => $products]);
});

Route::get('/burgersAnon', function() {
    $products = DB::table('products')->where('type', '=', 'Hamburguesa')->get();
    return view('productsAnon', ['products' => $products]);
});

Route::get('/sandwichAnon', function() {
    $products = DB::table('products')->where('type', '=', 'Sándwich')->get();
    return view('productsAnon', ['products' => $products]);
});

Route::get('/pastasAnon', function() {
    $products = DB::table('products')->where('type', '=', 'Pasta')->get();
    return view('productsAnon', ['products' => $products]);
});

Route::get('/arrocesAnon', function() {
    $products = DB::table('products')->where('type', '=', 'Arroz')->get();
    return view('productsAnon', ['products' => $products]);
});

Route::get('/baguettesAnon', function() {
    $products = DB::table('products')->where('type', '=', 'Baguette')->get();
    return view('productsAnon', ['products' => $products]);
});

Route::get('/ensaladasAnon', function() {
    $products = DB::table('products')->where('type', '=', 'Ensalada')->get();
    return view('productsAnon', ['products' => $products]);
});

Route::get('/complementosAnon', function() {
    $products = DB::table('products')->where('type', '=', 'Complemento')->get();
    return view('productsAnon', ['products' => $products]);
});

Route::get('/perritosAnon', function() {
    $products = DB::table('products')->where('type', '=', 'Perrito')->get();
    return view('productsAnon', ['products' => $products]);
});


Route::resource('products', ProductController::class);

Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
Route::post('add', [CartController::class, 'addData'])->name('cart.add');

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/*
Route::controller(IndexController::class)->group(function(){
    Route::get('/index', 'index');
    Route::get('/index/create', 'create');
    Route::get('/index/{plato}', 'show');
});
*/


Route::get('/whoarewe', WhoareweController::class);


// Route::get('/contact', ContactController::class);


// Route::get('/faq', FaqController::class);


Route::get('/recibos', ReciboController::class);


require __DIR__.'/auth.php';
