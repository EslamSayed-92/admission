<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MilitaryArea;

class MilitaryAreaController extends GenericController
{

    public function __construct()
    {
        $this->create_url = "/MilitaryArea";
        $this->model = $this->model.'\MilitaryArea';
        $this->temp = new $this->model;
        $this->title = 'Military Areas';
        $this->model_title = 'Military Area';
    }
}
