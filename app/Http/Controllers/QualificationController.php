<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qualification;

class QualificationController extends GenericController
{
    //
    public function __construct()
    {
        $this->create_url = "/Qualification";
        $this->model = $this->model.'\Qualification';
        $this->temp = new $this->model;
        $this->title = 'Qualifications';
        $this->model_title = 'Qualification';
    }
}
