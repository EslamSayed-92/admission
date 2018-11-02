<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentLevelDatum;

class StudentLevelDatumController extends GenericController
{
    
	public function __construct()
    {
        $this->create_url = "/StudentLevelDatum";
        $this->model = $this->model.'\StudentLevelDatum';
        $this->temp = new $this->model;
        $this->title = 'Students Levels Data';
        $this->model_title = 'Student Level Data';
    }
}