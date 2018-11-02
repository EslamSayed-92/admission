<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\University;

class UniversityController extends GenericController
{
    
	public function __construct()
    {
        $this->create_url = "/University";
        $this->model = $this->model.'\University';
        $this->temp = new $this->model;
        $this->title = 'Universities';
        $this->model_title = 'University';
    }
}