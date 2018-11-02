<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudyLevel;

class StudyLevelController extends GenericController
{
    
	public function __construct()
    {
        $this->create_url = "/StudyLevel";
        $this->model = $this->model.'\StudyLevel';
        $this->temp = new $this->model;
        $this->title = 'Study Levels';
        $this->model_title = 'Study Level';
    }
}