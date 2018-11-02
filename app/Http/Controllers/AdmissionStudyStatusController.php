<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdmissionStudyStatus;

class AdmissionStudyStatusController extends GenericController
{
    
    public function __construct()
    {
        $this->create_url = "/AdmissionStudyStatus";
        $this->model = $this->model.'\AdmissionStudyStatus';
        $this->temp = new $this->model;
        $this->title = 'Admission Study Statuses';
        $this->model_title = 'Admission Study Status';
    }

}
