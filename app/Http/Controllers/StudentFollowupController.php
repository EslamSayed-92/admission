<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentFollowup;

class StudentFollowupController extends GenericController
{
    
	public function __construct()
    {
        $this->create_url = "/StudentFollowup";
        $this->model = $this->model.'\StudentFollowup';
        $this->temp = new $this->model;
        $this->title = 'Students Followups';
        $this->model_title = 'Student Followup';
    }
}