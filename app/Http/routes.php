<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

app()->setLocale('ar');

Route::group(['namespace' => 'Website' , 'middleware' => 'guest'] , function () {

    Route::get('/' , [
        'uses' => 'AuthController@getLogin' ,
        'as' => 'get_login'
    ]);

    Route::post('auth/login' , [
        'uses' => 'AuthController@postLogin' ,
        'as' => 'post_login'
    ]);

    Route::get('reset/email/{token?}' , [
        'uses' => 'AuthController@showResetForm' ,
        'as' => 'get_reset_email'
    ]);

    Route::post('reset/email' , [
        'uses' => 'AuthController@sendResetLinkEmail' ,
        'as' => 'post_reset_email'
    ]);

    Route::post('reset' , [
        'uses' => 'AuthController@reset' ,
        'as' => 'post_reset'
    ]);

});

Route::group(['namespace' => 'website' , 'middleware' => 'auth'] , function () {

    Route::get('logout' , [
        'uses' => 'AuthController@logout' ,
        'as' => 'logout'
    ]);

    Route::get('home' , [
        'uses' => 'HomeController@index' ,
        'as' => 'home'
    ]);

    /**
     *  User Routes
     */

    Route::get('users' , [
        'uses' => 'UserController@users' ,
        'as' => 'users'
    ]);

    Route::get('create-user' , [
        'uses' => 'UserController@createUser' ,
        'as' => 'create_user'
    ]);

    Route::post('save-user' , [
        'uses' => 'UserController@saveUser' ,
        'as' => 'save_user'
    ]);

    Route::get('edit-user/{user_id}' , [
        'uses' => 'UserController@editUser' ,
        'as' => 'edit_user'
    ]);

    Route::post('update-user/{user_id}' , [
        'uses' => 'UserController@updateUser' ,
        'as' => 'update_user'
    ]);

    Route::get('delete-user/{user_id}' , [
        'uses' => 'UserController@deleteUser' ,
        'as' => 'delete_user'
    ]);

    /**
     * Employees Routes
     */

    Route::get('all-employees' , [
        'uses' => 'EmployeeController@allEmployees' ,
        'as' => 'all_employees'
    ]);

    Route::get('single-employee/{employee_id}' , [
        'uses' => 'EmployeeController@singleEmployee' ,
        'as' => 'single_employee'
    ]);

    Route::get('resigns' , [
        'uses' => 'EmployeeController@resigns' ,
        'as' => 'resigns'
    ]);

    Route::get('terminations' , [
        'uses' => 'EmployeeController@terminations' ,
        'as' => 'terminations'
    ]);

    Route::get('waiting-list' , [
        'uses' => 'EmployeeController@waitingList' ,
        'as' => 'waiting_list'
    ]);

    Route::get('create-employee' , [
        'uses' => 'EmployeeController@createEmployee' ,
        'as' => 'create_employee'
    ]);

    Route::post('save-employee' , [
        'uses' => 'EmployeeController@saveEmployee' ,
        'as' => 'save_employee'
    ]);

    Route::get('edit-employee/{employee_id}' , [
        'uses' => 'EmployeeController@editEmployee' ,
        'as' => 'edit_employee'
    ]);

    Route::post('update-employee/{employee_id}' , [
        'uses' => 'EmployeeController@updateEmployee' ,
        'as' => 'update_employee'
    ]);

    Route::get('delete-employee/{employee_id}' , [
        'uses' => 'EmployeeController@deleteEmployee' ,
        'as' => 'delete_employee'
    ]);

    Route::get('delete-employee-image/{employee_id}/{employee_image_input}' , [
        'uses' => 'EmployeeController@deleteEmployeeImage' ,
        'as' => 'delete_employee_image'
    ]);

    /**
     * Rentals Routes
     */

    Route::get('all-rentals' , [
        'uses' => 'RentalController@allRentals' ,
        'as' => 'all_rentals'
    ]);

    Route::get('single-rental/{rental_id}' , [
        'uses' => 'RentalController@singleRental' ,
        'as' => 'single_rental'
    ]);

    Route::get('create-rental' , [
        'uses' => 'RentalController@createRental' ,
        'as' => 'create_rental'
    ]);

    Route::post('save-rental' , [
        'uses' => 'RentalController@saveRental' ,
        'as' => 'save_rental'
    ]);

    Route::get('edit-rental/{rental_id}' , [
        'uses' => 'RentalController@editRental' ,
        'as' => 'edit_rental'
    ]);

    Route::post('update-rental/{rental_id}' , [
        'uses' => 'RentalController@updateRental' ,
        'as' => 'update_rental'
    ]);

    Route::get('delete-rental/{rental_id}' , [
        'uses' => 'RentalController@deleteRental' ,
        'as' => 'delete_rental'
    ]);

    Route::get('delete-rental-image/{image_id}' , [
        'uses' => 'RentalController@deleteRentalImage' ,
        'as' => 'delete_rental_image'
    ]);

    /**
     * Cars Routes
     */

    Route::get('all-cars' , [
        'uses' => 'CarController@allCars' ,
        'as' => 'all_cars'
    ]);

    Route::get('single-car/{car_id}' , [
        'uses' => 'CarController@singleCar' ,
        'as' => 'single_car'
    ]);

    Route::get('create-car' , [
        'uses' => 'CarController@createCar' ,
        'as' => 'create_car'
    ]);

    Route::post('save-car' , [
        'uses' => 'CarController@saveCar' ,
        'as' => 'save_car'
    ]);

    Route::get('edit-car/{car_id}' , [
        'uses' => 'CarController@editCar' ,
        'as' => 'edit_car'
    ]);

    Route::post('update-car/{car_id}' , [
        'uses' => 'CarController@updateCar' ,
        'as' => 'update_car'
    ]);

    Route::get('delete-car/{car_id}' , [
        'uses' => 'CarController@deleteCar' ,
        'as' => 'delete_car'
    ]);

    Route::get('delete-car-image/{car_id}/{car_image_input}' , [
        'uses' => 'CarController@deleteCarImage' ,
        'as' => 'delete_car_image'
    ]);

    /**
     * Vacations
     */

    Route::get('vacations' , [
        'uses' => 'VacationController@index' ,
        'as' => 'vacations_index'
    ]);

    Route::get('vacations/requests' , [
        'uses' => 'VacationController@requests' ,
        'as' => 'vacations_requests'
    ]);

    Route::get('vacations/balance' , [
        'uses' => 'VacationController@balance' ,
        'as' => 'vacations_balance'
    ]);

    Route::get('vacations/edit-vacation/{vacation_id}' , [
        'uses' => 'VacationController@editVacation' ,
        'as' => 'edit_vacation'
    ]);

    Route::post('vacations/update-vacation/{vacation_id}' , [
        'uses' => 'VacationController@updateVacation' ,
        'as' => 'update_vacation'
    ]);

    Route::get('vacations/create-vacation/' , [
        'uses' => 'VacationController@createVacation' ,
        'as' => 'create_vacation'
    ]);

    Route::post('vacations/save-vacation/' , [
        'uses' => 'VacationController@saveVacation' ,
        'as' => 'save_vacation'
    ]);

    Route::get('vacations/all-balance' , [
        'uses' => 'VacationController@allBalance' ,
        'as' => 'vacations_all_balance'
    ]);

    Route::get('vacations/apply-for-vacation/{code}' , [
        'uses' => 'VacationController@applyForVacation' ,
        'as' => 'vacations_get_apply'
    ]);

    Route::post('vacations/apply-for-vacation' , [
        'uses' => 'VacationController@postForVacation' ,
        'as' => 'vacations_post_apply'
    ]);

    Route::get('vacations/change-vacation-status/{vacation_request_id}/{status}' , [
        'uses' => 'VacationController@changeVacationStatus' ,
        'as' => 'change_vacation_status'
    ]);

    /**
     * Excel
     */

    Route::get('excel-extractor/{model}' , [
        'uses' => 'ExcelExtractor@extract' ,
        'as' => 'excel_extract'
    ]);

});

