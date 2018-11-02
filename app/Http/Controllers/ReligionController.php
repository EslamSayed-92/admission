<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Religion;

class ReligionController extends GenericController
{
    
	public function __construct()
    {
        $this->create_url = "/Religion";
        $this->model = $this->model.'\Religion';
        $this->temp = new $this->model;
        $this->title = 'Religions';
        $this->model_title = 'Religion';
    }
}
