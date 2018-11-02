<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\StudentAcademicRecord;
use App\Models\StudentAdmission;
use App\Models\AcademicYear;
use App\Models\University;
use App\Models\Faculty;
use Exception;


class StudentAcademicRecordController extends GenericController
{
    
	public function __construct()
    {
        $this->create_url = "/StudentAcademicRecord";
        $this->model = $this->model.'\StudentAcademicRecord';
        $this->temp = new $this->model;
        $this->title = 'Students Academic Records';
        $this->model_title = 'Student Academic Record';
    }


    public static function create_student_code($admission_id)
    {
        $student_admission = StudentAdmission::where('student_admission_id', $admission_id)
        ->select('academic_year_id', 'semester_id','admission_status_id')->get()->toArray()[0];
        $academic_year = AcademicYear::where('academic_year_id',$student_admission['academic_year_id'])
        							->value('academic_year_start_date')->year;
        $university = University::where('active', 1)->value('university_id');
        $faculty = Faculty::where('active', 1)->value('faculty_id');

        $student_academic_record = new StudentAcademicRecord;
        $student_academic_record['student_code'] = 
        StudentAcademicRecordController::generate_student_code($academic_year,$university,$faculty,$admission_id);
        $student_academic_record['faculty_id'] = $faculty;
        $student_academic_record['academic_year_id'] = $student_admission['academic_year_id'];
        $student_academic_record['semester_id'] = $student_admission['semester_id'];
        $student_academic_record['semester_status'] = $student_admission['admission_status_id'];

        if($student_academic_record->save())
            return $student_academic_record['student_code'];
        else
           return new Exception("Could not Generate Student Code");

    }

    private static function generate_student_code($academic_year,$university,$faculty,$admission_id)
    {
        $academic_year = StudentAcademicRecordController::length_digit_number(4,$academic_year);
        $university = StudentAcademicRecordController::length_digit_number(2,$university);
        $faculty = StudentAcademicRecordController::length_digit_number(2,$faculty);
        $serial = StudentAcademicRecordController::length_digit_number(5,$admission_id);
        return implode("", [$academic_year,$university,$faculty,$serial]);
    }

	/**
	 * This function is only used to create and manipulate numbers 
	 */
    private static function length_digit_number($length, $number)
    {
        if(strlen(strval($number)) > $length)
            throw new Exception("Number given has length more than given Length");
        else{
            while (strlen(strval($number)) < $length)
                    $number = '0'.$number;
            return $number;
        }
    }


    public function generate_form($id)
    {
    	DB::enableQueryLog();
		$student_admission = DB::table('student_admission as sa')
		->join('academic_year as ac', 'sa.academic_year_id', '=', 'ac.academic_year_id')
		->join('semester as sm', 'sm.semester_id', '=', 'sa.semester_id')
		->select('ac.academic_year_description', 'sm.semester_name_english')
		->where('student_admission_id','=',$id)->get()[0];

		$temp = $this->temp->get_properities();

		// var_dump($temp);
		$form_data = ['academic_year_id'=>$student_admission->academic_year_description,
		 			 'semester_id'=>$student_admission->semester_name_english,
		 			 'faculty_id'=>$temp['faculty_id'], 'specialization_id'=>$temp['specialization_id'],
		 			 'department_id'=>$temp['department_id'], 'major_id'=>$temp['major_id']];

		// var_dump($form_data);
		return response()->json($form_data);
    }

    public function add_student_academic_data($id,Request $request)
    {
    	$student_academic_record = StudentAcademicRecord::where('student_code',$id)->first();
        $student_academic_record['major_id'] = request('major_id');
        $student_academic_record['specialization_id'] = request('specialization_id');

        if($student_academic_record->save())
        	return true;
        else
        	return false;
    }

}