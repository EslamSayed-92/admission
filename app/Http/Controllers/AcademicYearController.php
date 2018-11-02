<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AcademicYear ;

class AcademicYearController extends GenericController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->create_url = "/AcademicYear";
        $this->model = $this->model.'\AcademicYear';
        $this->temp = new $this->model;
        $this->title = 'Academic Years';
        $this->model_title = 'Academic Year';
    }

}
