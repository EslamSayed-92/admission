<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentDocument;

class StudentDocumentController extends GenericController
{
    
	public function __construct()
    {
        $this->create_url = "/StudentDocument";
        $this->model = $this->model.'\StudentDocument';
        $this->temp = new $this->model;
        $this->title = 'Students Documents';
        $this->model_title = 'Student Document';
    }
}