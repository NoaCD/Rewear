<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\WebhooksController;
use App\Http\Livewire\PaymentOrder;
use App\Http\Livewire\ShoppingCart;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

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

Route::get('/', [PageController::class,'index'])->name('home.index');
Route::get('/nosotros', [PageController::class,'about'])->name('about');
Route::get('/divisas/{divisa}',[PageController::class,'setDivisas'])->name('divisas');
Route::get('/plan/{plan}', [PageController::class,'setPlan'])->name('plan');
Route::middleware('auth')->get('/planes', [PlanController::class,'index'])->name('planes');
Route::get('/catalogo-rewear/{color?}', [CatalogueController::class,'index'])->name('catalogue.index');
Route::get('/catalogo-producto/{product}',[CatalogueController::class,'product'])->name('catalogue.product');
Route::get('/cesta',[CartController::class,'index'])->name('cart.index');
Route::get('/comprar', [PageController::class,'checkout'])->name('checkout');
Route::get('/faq', [PageController::class,'faq'])->name('faq');
Route::get('/blog-index', [BlogController::class,'index'])->name('blog.index');
Route::get('/blog-articulo/{post}', [BlogController::class,'show'])->name('post.show');
Route::get('/contacto', [PageController::class,'contact'])->name('contact');
//pagina de cuenta
Route::middleware(['auth'])->get('/mi-perfil/{create?}', [ClientController::class,'index'])->name('profile.index');
Route::middleware(['auth'])->get('/mi-perfil/print/{order}', [ClientController::class,'printOrder'])->name('profile.printOrder');
Route::middleware(['auth'])->put('/mi-perfil/update', [ClientController::class,'updateInfo'])->name('profile.updateInfo');
Route::middleware(['auth'])->post('/updatePassword', [ClientController::class, 'updatePassword'])->name('user.update.password');
Route::middleware(['auth'])->post('/updateAddres/{address}', [ClientController::class, 'updateAddress'])->name('user.update.address');
Route::middleware(['auth'])->delete('/deleteAddres/{address}', [ClientController::class, 'deleteAddress'])->name('user.delete.address');

Route::get('locale/{locale}',function($locale){
    session()->put('locale',$locale);
    if ($locale == 'es') {
        session(['divisa'=> 'MXN']);
    }else{
        session(['divisa'=> 'USD']);
    }
    return Redirect::back();
})->name('set.lang');

Route::get('search', SearchController::class)->name('search');
Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('shopping-cart', ShoppingCart::class)->name('shopping-cart');

Route::middleware(['auth'])->group(function () {
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('orders/create', [OrderController::class,'create'])->name('orders.create');
    Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('orders/{order}/payment', PaymentOrder::class)->name('orders.payment');
    /* Route::get('orders/{order}/payment', [OrderController::class, 'payment'])->name('orders.payment'); */
    Route::get('orders/{order}/pay', [OrderController::class, 'pay'])->name('orders.pay');
});

/* Route::get('send-email', [TestController::class, 'sendMailWithPDF']); */

Route::post('webhooks', WebhooksController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');


Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');


Route::get('/reset-password/{token}?email={email}', function (Request $request) {
    return view('auth.reset-password', ['token' => $request->token,'email' => $request->email]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');




