<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdditionalCourse ;


class AdditionalCourseController extends GenericController
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->create_url = "/AdditionalCourse";
        $this->model = $this->model.'\AdditionalCourse';
        $this->temp = new $this->model;
        $this->title = 'Additional Courses';
        $this->model_title = 'Academic Course';
    }
}


