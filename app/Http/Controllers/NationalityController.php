<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nationality;

class NationalityController extends GenericController
{
    
 	public function __construct()
    {
        $this->create_url = "/Nationality";
        $this->model = $this->model.'\Nationality';
        $this->temp = new $this->model;
        $this->title = 'Nationalities';
        $this->model_title = 'Nationality';
    }
}
