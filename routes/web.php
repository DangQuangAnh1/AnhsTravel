<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\NationController;
use App\Http\Controllers\StyleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\AccountController;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
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

Route::get('/',[HomeController::class, 'index']);

Route::get('/search',[SearchController::class, 'index']);

Route::post('/search',[SearchController::class, 'search'])->name('search');

Route::get('/style/{style_name}',[StyleController::class, 'show'])->name('style');

Route::resource('talk', HomeController::class);

Route::resource('account', AccountController::class);

Route::resource('tour', TourController::class);

Route::resource('order', OrderController::class);

Route::resource('like', LikeController::class);

Route::get('/nation/{nation_name}',[NationController::class, 'show'])->name('nation');

Route::get('/login',[UserController::class, 'index'])->name('logout');

Route::post('/',[UserController::class, 'login'])->name('login');

Route::post('/login',[UserController::class, 'regist'])->name('regist');

Route::get('/tour',[TourController::class, 'index']);

Route::get('/tour/{tour_id}',[TourController::class, 'show'])->name('tour');

Route::get('/user/account',function(Request $request){
    $user = session()->get('user', '');
    $account=DB::table('users')->where('id',$user->id)->first();
    return view('user.account',['account'=>$account]);
});

Route::get('/user/notification',function(Request $request){
    $user = session()->get('user', '');
    $talks=DB::table('talks')->where('receiver',$user->id)->orderBy('id','desc')->get();
    return view('user.notification',['talks'=>$talks]);
});

Route::get('/user/like',[LikeController::class, 'index']);

Route::get('/user/order',[OrderController::class, 'index']);

Route::get('/admin/home',[HomeController::class, 'admin_home']);

Route::get('/admin/talk',[HomeController::class, 'admin_talk']);

Route::get('/admin/account',[AccountController::class, 'index']);

Route::get('/admin/tours',[TourController::class, 'index']);

Route::get('/admin/order',[OrderController::class, 'admin_order']);

Route::get('/admin/turnover',[OrderController::class, 'admin_turnover']);