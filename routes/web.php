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

Route::middleware(['lang'])->group(function () {

	Route::resource('AcademicYear', 'AcademicYearController');
	Route::resource('AdditionalCourse', 'AdditionalCourseController');
	Route::resource('AdmissionStatus', 'AdmissionStatusController');
	Route::resource('AdmissionStatus', 'AdmissionStatusController');
	Route::resource('AdmissionStudyStatus', 'AdmissionStudyStatusController');
	Route::resource('Currency', 'CurrencyController');
	Route::resource('Department', 'DepartmentController');
	Route::resource('Document', 'DocumentController');
	Route::resource('Faculty', 'FacultyController');
	Route::resource('Gender', 'GenderController');
	Route::resource('Governorate', 'GovernorateController');
	Route::resource('Major', 'MajorController');
	Route::resource('MilitaryStatus', 'MilitaryStatusController');
	Route::resource('MilitaryArea', 'MilitaryAreaController');
	Route::resource('Nationality', 'NationalityController');
	Route::resource('PaymentType', 'PaymentTypeController');
	Route::resource('Religion', 'ReligionController');
	Route::resource('Semester', 'SemesterController');
	Route::resource('Specialization', 'SpecializationController');
	Route::resource('StudentAdmission', 'StudentAdmissionController');
	Route::resource('StudentAdditionalCourse', 'StudentAdditionalCourseController');
	Route::resource('StudentCourseRegistrationRecord', 'StudentCourseRegistrationRecordController');
	Route::resource('StudentDocument', 'StudentDocumentController');
	Route::resource('StudentFollowup', 'StudentFollowupController');
	Route::resource('StudentLevelDatum', 'StudentLevelDatumController');
	Route::resource('StudentQualification', 'StudentQualificationController');
	Route::resource('StudyLevel', 'StudyLevelController');
	Route::resource('StudyProgram', 'StudyProgramController');
	Route::resource('University', 'UniversityController');
	Route::get('/', function () {return view('welcome');});

	// Route::resource('Payment', 'PaymentController');
	// Route::resource('Qualification', 'QualificationController');
	// Route::resource('School', 'SchoolController');
	// Route::resource('Student', 'StudentController');
	// Route::resource('StudentAcademicRecord', 'StudentAcademicRecordController');

	#-- Routes to upload and save data from excel file --#
	Route::get('excel/', 'ApplicationController@index')->name('index');
	Route::post('excel/import', 'ApplicationController@import')->name('import');
	Route::post('excel/upload', 'ApplicationController@upload')->name('upload');
	#-- Routes of document checking --#
	Route::get('StudentAdmission/{application}/document_checklist','FollowupController@document_checklist');
	Route::post('StudentAdmission/{application}/add_sudent_document','FollowupController@add_sudent_document');
	Route::get('StudentAdmission/{application}/document_check','FollowupController@document_check');
	#-- Routes to add and edit student military data --#
	Route::get('StudentAdmission/{application}/get_military_data','MilitaryDataController@get_military_data');
	Route::get('StudentAdmission/{application}/add_military_data','MilitaryDataController@add_military_data');
	Route::post('StudentAdmission/{application}/store_military_data','MilitaryDataController@store_military_data');
	Route::get('StudentAdmission/{application}/edit_military_data','MilitaryDataController@edit_military_data');
	Route::put('StudentAdmission/{application}/update_military_data','MilitaryDataController@update_military_data');
	#-- Routes to add and edit student payment --#
	Route::get('StudentAdmission/{application}/fees_check','PaymentController@fees_check');
	Route::get('StudentAdmission/{application}/student_admission_fees','PaymentController@student_admission_fees');
	Route::post('StudentAdmission/{application}/store_student_fees','PaymentController@store_student_fees');
	Route::get('StudentAdmission/{application}/edit_student_fees','PaymentController@edit_student_fees');
	Route::put('StudentAdmission/{application}/update_student_fees','PaymentController@update_student_fees');
	#-- Routes of academic record --#
	Route::get('StudentAdmission/{application}/generate_form','StudentAcademicRecordController@generate_form');
	#-- Route to load all majors in student faculty --#
	Route::get('StudentAdmission/{application}/Majors','MajorController@get_majors');
	#-- Route to load all specializations in selected major --#
	Route::get('/Specializations/{major_id}','SpecializationController@get_specializations');
	#-- Route to add Academic data to student academic record --#
	Route::post('StudentAdmission/{application}/StudentAcademicData','StudentController@add_student_academic_data');

	#-- Routes of admission reports --#
	Route::get('AdmissionReports','AdmissionReportsController@index');
	Route::get('AdmissionReports/MilitaryDelays','AdmissionReportsController@MilitaryDelays');

});