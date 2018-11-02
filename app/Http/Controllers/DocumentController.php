<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DocumentController extends GenericController
{
     
    public function __construct()
    {
        $this->create_url = "/Document";
        $this->model = $this->model.'\Document';
        $this->temp = new $this->model;
        $this->title = 'Documents';
        $this->model_title = 'Document';
    }
}
