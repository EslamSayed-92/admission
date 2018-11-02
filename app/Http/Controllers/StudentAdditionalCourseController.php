<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentAdditionalCourse;

class StudentAdditionalCourseController extends GenericController
{
    
	public function __construct()
    {
        $this->create_url = "/StudentAdditionalCourse";
        $this->model = $this->model.'\StudentAdditionalCourse';
        $this->temp = new $this->model;
        $this->title = 'Students Additional Courses';
        $this->model_title = 'Student Additional Course';
    }
}