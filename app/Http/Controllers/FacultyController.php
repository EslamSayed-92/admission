<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;

class FacultyController extends GenericController
{
     
    public function __construct()
    {
        $this->create_url = "/Faculty";
        $this->model = $this->model.'\Faculty';
        $this->temp = new $this->model;
        $this->title = 'Faculties';
        $this->model_title = 'Faculty';
    }

}
