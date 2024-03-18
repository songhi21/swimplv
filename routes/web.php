<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HubController;
use App\Http\Controllers\cctvview;
use App\Http\Controllers\registerControllerforswim;
use App\Http\Controllers\userchangepassword;
use App\Http\Controllers\mapsController;
use App\Http\Controllers\emailcontroller;
use App\Http\Controllers\mapsoutputController;
use App\Http\Controllers\smartwatermeterControlleradmin;
use App\Http\Controllers\pressuresensorControlleradmin;
use App\Models\User;

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

Route::middleware('guest')->get('/login', function () {
    return view('auth.login');
});



Auth::routes();
if (auth::check()){
    echo "true";
}



//guest
Route::middleware('guest')->group(function () {
    //homepageindex----------
    Route::get("/",[App\Http\Controllers\indexController::class, 'index'])->name('index');
    // ---end
    Route::get("/maps",[App\Http\Controllers\mapsController::class, 'index'])->name('maps');
    Route::get("/about",[App\Http\Controllers\aboutController::class, 'index'])->name('about');
    // mapsoutput--------------------------------------------------
    Route::get("/mapsoutput",[App\Http\Controllers\mapsoutputController::class, 'index'])->name('mapsoutput');
    Route::get("/mapsoutput/{id}", [App\Http\Controllers\mapsoutputController::class, 'show'])->name('mapsoutput.show');
    Route::get("/mapsoutput2/{id}", [App\Http\Controllers\mapsoutputController::class, 'show2'])->name('mapsoutput.show2');
    Route::get('/displaydatavalue', [App\Http\Controllers\mapsoutputController::class, 'displaydata']);
    // endmapsoutput--------------------------------------------
    //email---------------------------------------------------
    // Route::post('/contact', 'emailcontroller@store');
    Route::get("/contact",[App\Http\Controllers\emailcontroller::class, 'showForm']);
    Route::post("/contact/send",[App\Http\Controllers\emailcontroller::class, 'sendEmail']);
    // Route::get('/contact', 'ContactController@showForm');
    // Route::post('/contact/send', 'ContactController@sendEmail');
    //PS------------------------------------------------------------------------------
    Route::get('/getDataps-1', [mapsController::class, 'getDataps1']);
    Route::get('/getDataps-2', [mapsController::class, 'getDataps2']);
    Route::get('/getDataps-3', [mapsController::class, 'getDataps3']);
    Route::get('/getDataps-4', [mapsController::class, 'getDataps4']);
    // Route::get('/cctv-5', [mapsController::class, 'cctv']);
    //SM-------------------------------------------------------------------------------
    Route::get('/getDataSmartmetter-1', [mapsController::class, 'getDataSmartmetter']);
    Route::get('/getDataSmartmetter-2', [mapsController::class, 'getDataSmartmetter2']);
    Route::get('/getDataSmartmetter-3', [mapsController::class, 'getDataSmartmetter3']);
    Route::get('/getDataSmartmetter-4', [mapsController::class, 'getDataSmartmetter4']);

    Route::get('/getDataps-4search', [mapsController::class, 'getDataSmartmetter4search']);


});


// auth
Route::middleware('auth')->group(function () {

    //SM-------------------------------------------------------------------------------
    Route::get('/getDataSmartmetter-1admin', [mapsController::class, 'getDataSmartmetter']);
    Route::get('/getDataSmartmetter-2admin', [mapsController::class, 'getDataSmartmetter2']);
    Route::get('/getDataSmartmetter-3admin', [mapsController::class, 'getDataSmartmetter3']);
    Route::get('/getDataSmartmetter-4admin', [mapsController::class, 'getDataSmartmetter4']);

    //PS------------------------------------------------------------------------------
    Route::get('/getDataps-1admin', [mapsController::class, 'getDataps1']);
    Route::get('/getDataps-2admin', [mapsController::class, 'getDataps2']);
    Route::get('/getDataps-3admin', [mapsController::class, 'getDataps3']);
    Route::get('/getDataps-4admin', [mapsController::class, 'getDataps4']);
    // _______________

    // SWadmincontrol------------------
    Route::resource('smartwatersensordevice', smartwatermeterControlleradmin::class); 
    Route::get('/getDataswdevicelist-admin', [smartwatermeterControlleradmin::class, 'getDatadevicelistsw']);
    
    // -----------------------------------
    // PSadmincontrol------------------
    Route::resource('pressuresensordevice', pressuresensorControlleradmin::class); 
    Route::get('/getDatapsdevicelist-admin', [pressuresensorControlleradmin::class, 'getDatadevicelist']);
    Route::get("/pressuresensordevice/{id}", [App\Http\Controllers\pressuresensorControlleradmin::class, 'show'])->name('pressuresensordevice.show');
    
    // -----------------------------------

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('hub', HubController::class);
    
    Route::get('searchhub', [App\Http\Controllers\HubController::class, 'searching'])->name('searching');

    Route::get('/cctv',[\App\Http\Controllers\cctvController::class, 'index'])->name('cctv');
    
    Route::resource('cctvview', cctvview::class);

    Route::get('searchcctv', [App\Http\Controllers\cctvview::class, 'searching'])->name('searchcctv');
    
    

    Route::resource('useraccount', registerControllerforswim::class);
    Route::post('registerswimuser', [\App\Http\Controllers\registerControllerforswim::class, 'store'])->name('registerswimuser');

    Route::get('searchuser', [\App\Http\Controllers\registerControllerforswim::class, 'searchuser'])->name('searchuser');
    Route::post('changepassword', [registerControllerforswim::class, 'changepassword'])->name('changepassword');
    Route::resource('userchangepassword', userchangepassword::class); 

});


