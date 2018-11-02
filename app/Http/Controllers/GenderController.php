<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gender;

class GenderController extends GenericController
{
    
    public function __construct()
    {
        $this->create_url = "/Gender";
        $this->model = $this->model.'\Gender';
        $this->temp = new $this->model;
        $this->title = 'Genders';
        $this->model_title = 'Gender';
    }
}
