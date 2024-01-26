<?php
use Illuminate\Support\Str;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionControlleradmin;
use App\Http\Controllers\Admin\Auth\NewPasswordControlleradmin;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkControlleradmin;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use Illuminate\Auth\Events\Authenticated;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Two\GoogleProvider;

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
    $categories = Category::all();
    return view('template.vivo.design.categories.index', compact('categories'));
})->middleware(['auth']);


// Route::get('/dashboard', function () {



//  //   return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {

    Route::namespace('Auth')->middleware('guest:admin')->group(function () {


        //login Route
        Route::get('login', [AuthenticatedSessionControlleradmin::class, 'create'])->name('login');
        Route::Post('login', [AuthenticatedSessionControlleradmin::class, 'store'])->name('adminlogin');
        Route::get('forgot-password', [PasswordResetLinkControlleradmin::class, 'create'])
            ->name('password.request');

        Route::post('forgot-password', [PasswordResetLinkControlleradmin::class, 'store'])
            ->name('password.email');

        Route::get('reset-password/{token}', [NewPasswordControlleradmin::class, 'create'])
        ->name('password.reset');

        Route::post('reset-password', [NewPasswordControlleradmin::class, 'store'])
            ->name('password.store');
        });
        Route::middleware('admin')->group(function () {

            Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');

        });
    Route::post('logout', [AuthenticatedSessionControlleradmin::class, 'destroy'])->name('logout');
});




Route::resource('category', CategoryController::class);
Route::resource('company', CompanyController::class);


Route::resource('user', UserController::class);
Route::middleware('admin')->group(function () {

    Route::resource('admins',AdminController::class);
    Route::get('showSellers', [AdminController::class, 'showSellers'])->name('showSellers');
    Route::get('/account-settings-admin',function(){
        return view('template.vivo.design.account-settings-admin');
            })->name("admins.profile");

    Route::get('product/create/{parameter}', [ProductController::class, 'createWithParameter'])->name('product.createWithParameter');
    Route::resource('product', ProductController::class);
});


Route::middleware('auth')->group(function () {


    Route::get('/account-settings',function(){
        return view('template.vivo.design.account-settings');
    })->name('account-settings');

    Route::resource('cart', CartController::class);
Route::get('addtocart/{product}/{quantity}', [CartController::class, 'addToCart'])->name('cart.addToCart');
Route::delete('removeproductfromcart/{product}/{quantity}', [CartController::class, 'removeProductFromCart'])->name('cart.removeProductFromCart');
Route::get('/checkout/{products}',[CartController::class,'checkout'])->name('checkout');
});


require __DIR__ . '/auth.php';

Route::get('auth/google' , [GoogleAuthController::class,'redirect'])->name('google-auth');
Route::get('auth/google/call-back',[GoogleAuthController::class, 'callbackGoogle']);
