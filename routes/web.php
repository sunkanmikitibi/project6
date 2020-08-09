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

Route::resource('departments', 'DepartmentController');

Route::group(['prefix' => 'questionsapp'], function () {
    Route::get('/questionnaire/create', 'QuestionnaireController@create')->name('questionnaire.create');
    Route::post('/questionnaire','QuestionnaireController@store')->name('questionnaire.store');
    Route::get('/questionnaire/{questionnaire}','QuestionnaireController@show')->name('questionnaire.show');
    Route::get('/questionnaires/{questionnaire}/questions/create', 'QuestionController@create')->name('questions.create');
    Route::post('/questionnaire/{questionnaire}/questions', 'QuestionController@store')->name('questions.store');
    Route::delete('/questionnaires/{questionnaire}/questions/{question}', 'QuestionController@destroy');
});

Route::group(['prefix' => 'hospital'], function () {
    Route::get('dashboard', 'HospitalController@index')->name('hospital.dashboard');
});


Route::get('/surveys/{questionnaire}-{slug}', 'SurveyController@show');
Route::post('/surveys/{questionnaire}-{slug}', 'SurveyController@store');

Route::group(['prefix' => 'petitions'], function () {
    Route::get('/petition', 'PetitionController@index')->name('petition.index');
    Route::post('/category', 'PetitioncategoryController@store')->name('category.store');
    Route::get('/petition/{id}/create', 'PetitionController@create')->name('petiton.create');
    Route::post('/petition', 'PetitionController@store')->name('petition.store');
    Route::get('/petition/{petition}', 'PetitionController@show')->name('petition.show');
    Route::get('/category/{category}/petitions', 'PetitioncategoryController@show')->name('category.show');
    Route::resource('signature', 'SignatureController');
});

Route::group(['prefix' => 'doctors'], function () {
    Route::resource('doctor', 'DoctorController');
});

Route::view('clients', 'clients');

Route::group(['prefix' => 'appointments'], function () {
//Clients Routes
Route::get('clients',  'ClientsController@index')->name('admin.clients');
Route::get('clients/create', 'ClientsController@create')->name('clients.create');
Route::post('clients', 'ClientsController@store')->name('clients.store');
Route::get('clients/{client}', 'ClientsController@show')->name('clients.show');
Route::delete('clients/{client}', 'ClientsController@destroy')->name('clients.delete');
Route::get('clients/{client}/edit', 'ClientsController@edit')->name('clients.edit');
Route::put('clients/{client}',  'ClientsController@update')->name('clients.update');

//Employee Routes
Route::get('employees', 'EmployeeController@index')->name('employee.index');
Route::get('employees/create', 'EmployeeController@create')->name('employee.create');
Route::post('employees', 'EmployeeController@store')->name('employee.store');
Route::get('employees/{employee}/edit', 'EmployeeController@edit')->name('employee.edit');
Route::get('employees/{employee}', 'EmployeeController@show')->name('employee.show');
Route::put('employees/{employee}', 'EmployeeController@update')->name('employee.update');
Route::delete('employees/{employee}', 'EmployeeController@destroy')->name('employee.delete');

//workinghours Routes
Route::resource('workinghours', 'WorkinghoursController');
Route::resource('appointments', 'AppointmentController');
});

Route::get('dashboard',  'DashboardController@index')->name('admin.dashboard');



Route::group(['prefix' => 'ticketapp'], function () {
    //tickets
    Route::get('new_ticket', 'TicketController@create')->name('ticket.create');
    Route::post('new_ticket', 'TicketController@store')->name('ticket.store');
    Route::get('my-tickets', 'TicketController@userTickets')->name('ticket.index');
    Route::get('tickets/{ticket_id}', 'TicketController@show')->name('ticket.show');

    //Ticket Comments Routes
    Route::post('comment', 'CommentController@store')->name('comment.store');
});

Route::group(['prefix' => 'mainticket', 'middleware' => 'admin'], function() {
    Route::get('tickets', 'TicketController@index');
    Route::post('close_ticket/{ticket_id}', 'TicketController@close');
});


