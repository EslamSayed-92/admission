<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends GenericController
{
    
     public function __construct()
    {
        $this->create_url = "/Department";
        $this->model = $this->model.'\Department';
        $this->temp = new $this->model;
        $this->title = 'Departments';
        $this->model_title = 'Department';
    }
}
