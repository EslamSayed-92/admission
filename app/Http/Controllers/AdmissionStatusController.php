<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdmissionStatus ;

class AdmissionStatusController extends GenericController
{
    
    public function __construct()
    {
        $this->create_url = "/AdmissionStatus";
        $this->model = $this->model.'\AdmissionStatus';
        $this->temp = new $this->model;
        $this->title = 'Admission Statuses';
        $this->model_title = 'Admission Status';
    }

}
