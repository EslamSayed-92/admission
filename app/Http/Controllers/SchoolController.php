<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;

class SchoolController extends GenericController
{
    
	public function __construct()
    {
        $this->create_url = "/School";
        $this->model = $this->model.'\School';
        $this->temp = new $this->model;
        $this->title = 'Schools';
        $this->model_title = 'School';
    }
}
