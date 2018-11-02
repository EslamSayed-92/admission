<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Semester;

class SemesterController extends GenericController
{
    
	public function __construct()
    {
        $this->create_url = "/Semester";
        $this->model = $this->model.'\Semester';
        $this->temp = new $this->model;
        $this->title = 'Semesters';
        $this->model_title = 'Semester';
    }
}
