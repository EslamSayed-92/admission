<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Major;

class MajorController extends GenericController
{
    //
    public function __construct()
    {
        $this->create_url = "/Major";
        $this->model = $this->model.'\Major';
        $this->temp = new $this->model;
        $this->title = 'Majors';
        $this->model_title = 'Major';
    }

    public function get_majors($student_admission_id)
    {
    	$faculty_id = Student::where('student_admission_id',$student_admission_id)->value('faculty_id'); 
    	$majors = Major::where('faculty_id',$faculty_id)->get(['major_id','major_name'])->toArray();
        $res = ['title'=>trans('Major.set'), 
                'save_url'=>'/StudentAcademicData',
                'majors'=>$majors];
    	return response()->json($res);
    }
}
