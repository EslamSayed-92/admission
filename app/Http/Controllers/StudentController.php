<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentAdmission;
use App\Models\StudentAcademicRecord;

class StudentController extends GenericController
{
    
	public function __construct()
    {
        $this->create_url = "/Student";
        $this->model = $this->model.'\Student';
        $this->temp = new $this->model;
        $this->title = 'Students';
        $this->model_title = 'Student';
    }

    public static function create_student($student_code,$student_admission_id)
    {
    	$student_admission = StudentAdmission::where('student_admission_id',$student_admission_id)
    							->first()->toArray();
    	
    	$student = new Student;
    	$student['student_id'] = $student_code;

    	foreach ($student->get_properities() as $k => $v) {
    		foreach ($student_admission as $key => $value) {
    			if(strpos($key, $k) > -1){
    				$student[$k] = $student_admission[$key];
    			}
    		}
    	}

    	if(!$student->save())
    		throw new Exception("Error Creating Student Record");
    		
    }

    public function add_student_academic_data($id,Request $request)
    {
        $student = Student::where('student_admission_id',$id)->first();
        $student['major_id'] = request('major_id');

        $student_academic_record = new StudentAcademicRecordController;
        $saved = $student_academic_record->add_student_academic_data($student->student_id, $request);
        
        if($saved && $student->save())
            return response()->json(['saved'=>true,'message'=>'Student Academic Data Saved Succefully']);
        else
            return response()->json(['saved'=>false,'message'=>'Error!! Student Academic Data not saved']);

    }

}