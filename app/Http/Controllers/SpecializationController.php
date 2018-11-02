<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialization;

class SpecializationController extends GenericController
{
    
	public function __construct()
    {
        $this->create_url = "/Specialization";
        $this->model = $this->model.'\Specialization';
        $this->temp = new $this->model;
        $this->title = 'Specializations';
        $this->model_title = 'Specialization';
    }

    public function get_specializations($major_id)
    {
    	$specializations = Specialization::where('major_id',$major_id)
    						->get(['specialization_id','specialization_name'])->toArray();
    	return response()->json($specializations);
    }
}