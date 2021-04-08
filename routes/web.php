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


Route::get('/', 'accountController@test'); //Loginpage routing

Route::get('/login', 'accountController@login'); //Loginpage routing
Route::get('/logout', 'accountController@logOut'); //Logout
Route::get('/register', 'accountController@register'); //Registerpage routing
Route::post('/register', 'accountController@store'); //Register account to DB
Route::post('/check-kpk', 'accountController@checkKpk'); //Register account to DB
Route::post('/login', 'accountController@signinAcc'); //LoginCHeck routing
Route::get('/forgot-password', 'forgotPassword@forgotpage'); //Forgotpass routing
Route::post('/forgot-password', 'forgotPassword@getotp'); //Forgotpass routing
Route::post('/forgot-changepassword', 'forgotPassword@checkotp'); //OTP Checking routing
Route::post('/changepass', 'forgotPassword@updatepass'); //ChangePass Forgot routing

//Admin Page
Route::get('/admin-homepage', 'admin\adminPageController@index');
Route::get('/admin-profile', 'admin\adminPageController@profilepage'); 
Route::get('/admin-edit', 'admin\adminPageController@editpage'); 
Route::get('/admin-changepassword', 'admin\adminPageController@changepwpage'); 
Route::get('/admin-adduser', 'admin\adminPageController@adduserpage'); 
Route::get('/admin-listuser', 'admin\adminPageController@listuserpage'); 
Route::post('/admin-edit','admin\adminPageController@editImageAdmin'); //Update Image routing
Route::post('/admin-changepassword','admin\adminPageController@updatepw'); //Update Password routing

//User Page
Route::get('/homepage', 'user\detailprofileCont@index'); //Homepage routing
Route::get('/user/edit','user\detailprofileCont@editpage'); //Detailpage routing
Route::get('/user/changepassword','user\detailprofileCont@changepass'); //Detailpage routing
Route::get('/user/details','user\detailprofileCont@detailpage'); //Detailpage routing
Route::post('/user/changepassword','user\detailprofileCont@updatepass'); //Update Password routing
Route::post('/user/edit','user\detailprofileCont@editImage'); //Update Image routing 

//Kaizen 
Route::get('/kaizen-form/add-kaizen','kaizenform\KaizenCont@userkaipage'); //Add Kai user routing
Route::post('/kaizen-form/add-kaizen','kaizenform\KaizenCont@store'); //Add Kai user routing
Route::get('/kaizen-form/list-kaizen','kaizenform\KaizenCont@listkaipage'); //Add Kai user routing
Route::get('/kaizen-form/list-kaizen/action','kaizenform\KaizenCont@searchkaizen')->name('actionlist'); //Add Kai user routing

Route::post('/kaizen-form/list-kaizen','kaizenform\KaizenCont@searchkaizen'); //Add Kai user routing
// Route::post('/kaizen-form/list-kaizen','kaizenform\KaizenCont@testSearch')->name('livesearch'); //Add Kai user routing

Route::get('/kaizen-form/update-kaizen','kaizenform\KaizenCont@updatelist'); //Add Kai user routing
Route::get('/kaizen-form/update-kaizen/{kzid}','kaizenform\KaizenCont@show'); //Add Kai user routing
Route::post('/kaizen-form/update-kaizen','kaizenform\KaizenCont@updatedetaildata'); //Update existing data routing

Route::get('/kaizen-form/approval-kaizen','kaizenform\KaizenCont@listapprove'); //list kaizen to be approved
Route::get('/kaizen-form/approval-kaizen/action','kaizenform\KaizenCont@searchApprove')->name('actionapproval'); //list kaizen to be approved
Route::get('/kaizen-form/attendance-kaizen','kaizenform\KaizenCont@attendancepage'); //list kaizen to be approved
Route::get('/kaizen-form/attendance-kaizen/action','kaizenform\KaizenCont@searchData')->name('actionattendance'); //list kaizen to be approved

Route::get('/kaizen-form/attendance-kaizen/{kzid}','kaizenform\KaizenCont@attendancedetail'); //list kaizen to be approved
Route::post('/kaizen-form/attendance-kaizen','kaizenform\KaizenCont@searchData'); //list kaizen to be approved
Route::post('/kaizen-form/attendance','kaizenform\KaizenCont@attendancesubmit'); //list kaizen to be approved
Route::get('/kaizen-form/approval-kaizen/{kzid}','kaizenform\KaizenCont@approvalpage'); //approved kaizen
Route::post('/kaizen-form/approval-kaizen','kaizenform\KaizenCont@approvemail'); //approved kaizen

Route::get('/kaizen-form/cancel-kaizen/{kzid}','kaizenform\KaizenCont@cancelkaizen'); //approved kaizen


Route::get('/kaizen-form/test','kaizenform\KaizenCont@testmail'); //approved kaizen
Route::get('/kaizen-form/dashboard','kaizenform\KaizenCont@comingsoon'); //approved kaizen

Route::post('/kaizen-form/add-finding','kaizenform\KaizenCont@addFinding')->name('addFinding'); //list kaizen to be approved

Route::get('/kaizen-form/delete-finding/{fid}','kaizenform\KaizenCont@deleteFinding'); //delete finding
// Route::get('/test','kaizenform\KaizenCont@testKaiPage'); //approved kaizen
// Route::get('/test/action','kaizenform\KaizenCont@testSearch')->name('actionsearch'); //approved kaizen

