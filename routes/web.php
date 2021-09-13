<?php

use App\Models\Postcomments;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mix_Controller;
use App\Http\Controllers\Home_Controller;
use App\Http\Controllers\Role_Controller;
use App\Http\Controllers\User_controller;
use App\Http\Controllers\Searchcontroller;
use App\Http\Controllers\Admins_Controller;
use App\Http\Controllers\Events_Controller;
use App\Http\Controllers\Blogtag_controller;
use App\Http\Controllers\contact_controller;
use App\Http\Controllers\Product_Controller;
use App\Http\Controllers\Blogpost_Controller;
use App\Http\Controllers\Bookings_controller;
use App\Http\Controllers\ContactUs_Controller;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostComment_controller;
use App\Http\Controllers\Userprofile_controller;
use App\Http\Controllers\Blogcategory_Controller;
use App\Http\Controllers\Commentreply_controller;
use App\Http\Controllers\Adminsettings_controller;
use App\Http\Controllers\AdminDashboard_Controller;
use App\Http\Controllers\Commentreplies_controller;
use App\Http\Controllers\BlogpostComment_controller;
use App\Http\Controllers\Bookingcategory_controller;
use App\Http\Controllers\product_categoriescontroller;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/', [Home_Controller::class,'homepage'])->name('index');

Route::get('/logout', [AuthenticatedSessionController::class,'destroy'])->name('logout');

            /*Mixtapes Page */
Route::view('/allmixtapes', 'frontend.allmixtapes')->name('allmixtapes');
Route::view('/videomixtapes', 'frontend.mixtapes.videomixtapes')->name('videomixtapes');
Route::get('/home/download/{mix_audio}', [Home_Controller::class,'download']);
Route::get('/audiomixtapes', [Home_Controller::class,'audiomixtapes'])->name('audiomixtapes');
            
            /*Events Page */
Route::get('/events', [Home_Controller::class,'events'])->name('events');
Route::get('/event/{slug}/id', [Home_Controller::class,'singleevent'])->name('singleevent');

            /*Products Page */
Route::get('/merchadise', [Home_Controller::class,'merchadise'])->name('merchadise');


            /*Blog Page */
Route::group(['prefix'=>'blog'],function(){

    /*All Blogs Page */
    Route::get('/', [Home_Controller::class,'blog'])->name('blog');

    /*Blog categories */
    Route::get('blogcategories', [Home_Controller::class,'blogcategories']);

    /*Blog-Post Page */
    Route::get('/post/{slug}/{id}', [Home_Controller::class,'postdetails'])->name('postdetails');

    /*Blog-category Page */
    Route::get('category/{slug}/{id}', [Home_Controller::class,'blogcategory'])->name('blogcategory');

    /*Blog-tag Page */
    Route::get('tag/{slug}/{id}', [Home_Controller::class,'blogtag'])->name('tag');

    /*Post comment Page */
    Route::post('blog/postcomment/{id}', [PostComment_controller::class,'store'])->name('postcomment');

    Route::get('comment/{id}/delete',[PostComment_controller::class,'destroy']);

    // Comment reply Page 
    Route::post('post/comment/reply/{id}', [Commentreplies_controller::class,'store'])->name('commentreply');

    Route::get('reply/{id}/delete',[Commentreplies_controller::class,'destroy']);
    
});



       

            /*Contact Us Page */

Route::resource('contact',contact_controller::class);

Route::post('/sendbooking', [Bookings_controller::class,'store'])->name('sendbooking');

            /*User Profile Page */
Route::resource('userprofile',Userprofile_controller::class);

            /*Search Bar*/
Route::resource('search',Searchcontroller::class);

Route::resource('/subscribe',NewsletterController::class);
// Route::get('/dashboard', function () {
//     return view('admin.index');
//     })->middleware(['auth'])->name('dashboard');

//     require __DIR__.'/auth.php';


Route::group(['prefix'=>'admin','middleware'=>(['auth','Admin'])],function(){

        // show notifications to the admins
    Route::get('/mynotifications', [Bookings_controller::class,'mynotifications'])->name('mynotifications');

    Route::resource('dashboard',AdminDashboard_Controller::class);

    Route::resource('roles',Role_Controller::class);

    Route::get('roles/{id}/delete',[Role_Controller::class,'destroy']);

    Route::resource('admins',Admins_Controller::class)->parameters(['admins'=>'user']);

    Route::resource('users',User_controller::class);

    Route::resource('blogtags', Blogtag_controller::class);

    Route::get('blogtags/{id}/delete',[Blogtag_controller::class,'destroy']);

    Route::resource('blogcategory', Blogcategory_Controller::class);

    Route::get('blogcategory/{id}/delete', [Blogcategory_Controller::class,'destroy']);

    Route::resource('blogpost', Blogpost_Controller::class);


    Route::get('blogpost/{id}/delete', [Blogpost_Controller::class,'destroy']);

    Route::get('/settings', [Adminsettings_controller::class,'settings']);

    Route::resource('events', Events_Controller::class);

    Route::resource('mixxes', Mix_Controller::class);

    Route::get('/postcomments', [PostComment_controller::class,'index'])->name('allcomments');

    Route::resource('bookingcategory', Bookingcategory_controller::class);

    Route::get('editbooking/{id}', [Bookings_controller::class,'show'])->name('singlebooking');

               // 1st Approval by The Manager

    Route::get('/recievedbookings', [Bookings_controller::class,'index'])->name('receivedbookings');

    Route::post('/booking/changestatus/{id}', [Bookings_controller::class,'update'])->name('changestatus');

    Route::get('booking/{id}/delete', [Bookings_controller::class,'destroy'])->name('deletebooking');

            // Approval by The Accountant

    Route::get('/approvedbookings', [Bookings_controller::class,'approved'])->name('approvedbookings');

    Route::get('requestpayment/{id}', [Bookings_controller::class,'requestpayment'])->name('requestdeposit');

    Route::get('/paidbookings', [Bookings_controller::class,'depositpaid'])->name('paidbookings');

});

Route::group(['middleware'=>config('fortify.middleware',['web'])],
    function(){
        $limiter=config('fortify.limiters.login');
        Route::post('/login',[AuthenticatedSessionController::class,'store'])
        ->middleware(array_filter([
            'guest',
            $limiter?'throttle:'.$limiter:null,
        ]));
    
    });