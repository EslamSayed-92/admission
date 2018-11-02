<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentCourseRegistrationRecord;

class StudentCourseRegistrationRecordController extends GenericController
{
    
	public function __construct()
    {
        $this->create_url = "/StudentCourseRegistrationRecord";
        $this->model = $this->model.'\StudentCourseRegistrationRecord';
        $this->temp = new $this->model;
        $this->title = 'Students Courses Registrations Records';
        $this->model_title = 'Student Course Registration Record';
    }
}

