<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentQualification;

class StudentQualificationController extends GenericController
{
    
	public function __construct()
    {
        $this->create_url = "/StudentQualification";
        $this->model = $this->model.'\StudentQualification';
        $this->temp = new $this->model;
        $this->title = 'Students Qualifications';
        $this->model_title = 'Student Qualification';
    }
}