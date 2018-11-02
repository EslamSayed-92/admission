<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Governorate;

class GovernorateController extends GenericController
{
    
    public function __construct()
    {
        $this->create_url = "/Governorate";
        $this->model = $this->model.'\Governorate';
        $this->temp = new $this->model;
        $this->title = 'Governorates';
        $this->model_title = 'Governorate';
    }
}
