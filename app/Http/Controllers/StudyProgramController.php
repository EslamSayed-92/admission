<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudyProgram;

class StudyProgramController extends GenericController
{
    
	public function __construct()
    {
        $this->create_url = "/StudyProgram";
        $this->model = $this->model.'\StudyProgram';
        $this->temp = new $this->model;
        $this->title = 'Study Programs';
        $this->model_title = 'Study Program';
    }
}