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
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::post('changelocale', ['as' => 'changelocale', 'uses' => 'TranslationController@changeLocale']);

Route::group(['middleware' => 'web'], function() {

    // Route Group for admin only
    Route::group(['middleware' => ['role:admin']], function() {
        Route::resource('/schools', 'AdminSchoolsController');
        Route::resource('/users', 'AdminUsersController');
    });

    // route for staff, admin
    Route::group(['middleware'=>['role:admin|staff']], function() {
        Route::resource('/students', 'AdminStudentsController');
        Route::get('/students/{id}/{parent_form_id}/edit', array(
            'as' => 'edit-student',
            'uses' => 'AdminStudentsController@edit'
        ));
        Route::get('/change-status/{student_id}', ['as' => 'change-status', 'uses' => 'AdminStudentsController@changeStatus']);
        Route::get('/students/{id}/detail', ['as' => 'student-detail', 'uses' => 'AdminStudentsController@show']);
    });

    // Route Group for visitor, admin, staff role
    Route::group(['middleware'=>['role:admin|staff|visitor']], function() {
        Route::resource('/home', 'AdminHomeController');
        Route::post('/search-student', 'AdminStudentsController@search');
        Route::get('/students/year/{year}', ['as'=>'students.showByYear', 'uses' => 'AdminStudentsController@getStudentsByGraduationYear']);
    });

    // Route Group for visitor and staff
    Route::group(['middleware' => ['role:visitor']], function() {
        Route::get('/read-student', ['as'=>'read-student', 'uses' => 'AdminStudentsController@index']);
        Route::get('/show-student/{id}', ['as'=>'show-student', 'uses'=> 'AdminStudentsController@show']);
    });
    
});

Route::post('/getStatus', 'AjaxController@getStatus');
Route::post('/getVisaTypeClass', 'AjaxController@getVisaTypeClass');

/*
 * for testing purpose
 *
 * */

Route::get('/test', function(){
//    $student_properties = App\StudentProperty::with( 'studentPropertyValues' )->where( 'student_property_name', 'status' )->get();
//    foreach( $student_properties as $student_property ) {
//        foreach($student_property->studentPropertyValues as $student_property_value) {
//            print $student_property_value->property_value;
//        }
//    }
    $student_properties = App\StudentProperty::with( 'studentPropertyValues' )->where( 'student_property_name', 'given_name' )
        ->get();
    //dump($student_properties);
//    $tmp = "";
//    foreach($student_properties as $student_property) {
//
//        foreach($student_property->studentPropertyValues->orWhere('property_value', 'LIKE', '%sok%') as $value){
//            //$tmp[$value->student_id] =  $value->property_value;
//            print $value->student_id;
//            print $value->property_value;
//        }
//    }

    $students = App\StudentPropertyValue::where([
        ['student_property_id', 11],
        ['property_value', 'LIKE', '%sov%']])->get();

    foreach($students as $student) {
        print $student->student_id;
        print $student->property_value;
    }
    


});

//the below Route is for generate model from existing database schema
//Route::get('/generate/models', '\\Jimbolino\\Laravel\\ModelBuilder\\ModelGenerator5@start');

