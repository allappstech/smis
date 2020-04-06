<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

 
Route::resource('College', 'CollegesController');
Route::resource('Departments', 'DepartmentsController');
Route::get('Department/Allocation/view/{id}', 'DepartmentsController@getview');

Route::get('add_department','DropsController@setcollege');
Route::get('add_program','DropsController@setdepart');
Route::get('SelectProgram','DropsController@setdepartment');
Route::get('getalllga','DropsController@getlga');
Route::get('Department/Courses/add_courses','DropsController@setcourse');
Route::get('SelectCourse','DropsController@selectDepartment');
Route::get('Manage/adduser','DropsController@setusers');
Route::get('Department/Allocation/newallocation','DropsController@allocation');
Route::get('returncouces','DropsController@selectcources');
Route::get('Department/add/core','DropsController@core');

Route::get('Students/Upload','StudentsController@studentupload');
Route::get('returncore','DropsController@returncore');
 Route::post('import', 'UploadsController@store')->name('import');
 
 Route::post('uploads', 'StudentsController@uploadstudents')->name('uploads');
 
 Route::get('Department/publishup/{id}', 'Result\ResultsController@publishup');
 Route::get('update_uploads', array('as'=>'update_uploads', 'uses'=>'UploadsController@update_uploads'));

Route::post('getresultquery','Result\ResultsController@getresultquery');

Route::resource('Department/Results', 'Result\ResultsController');
Route::resource('Department/Programs', 'ProgramsController');
Route::resource('Department/Program/Numbers', 'IdnumbersController');
Route::resource('Department/Courses', 'CoursesController');
Route::resource('Manage/Users', 'UsersController');
Route::resource('Department/Allocation', 'AllocationsController');
Route::resource('Department/Core-Courses', 'CoreCoursesController');
Route::resource('Staff/courses', 'StaffsController');
Route::resource('Department/Students', 'StudentsController');

Route::resource('Department/Program/Category', 'CategoriesController');

Route::get('setpassword', 'ChangepasswordsController@sendCode');




 
 Route::get('Staff/view/{id}', 'StaffsController@getview');
 Route::get('exportExcel/{id}', 'StaffsController@exportExcel');



 Route::get('test', 'UploadsController@test');
 Route::resource('UploadMyr', 'UploadsController');
 Route::get('UploadMyresults/{id}', 'UploadsController@uploadsr');
 
 
 Route::resource('Staff/ResultsUpload', 'ExResultsController');
 Route::post('eximport', 'ExResultsController@store')->name('eximport');

Route::resource('Department/view/Student/{id}', 'StudentsController@show');