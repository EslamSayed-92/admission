<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models as Model;
use Illuminate\Support\Facades\DB;


class AdmissionReportsController extends Controller
{
	public function index()
	{
		return view('admission_reports.welcome',['title'=>'Admission Reports','header'=>'Welcome to Admission Reports']);
	}
	public function MilitaryDelays()
	{
		DB::enableQueryLog();
		$data = DB::table('student_admission as sa')
		->join('military_data as md', 'md.student_admission_id', '=', 'sa.student_admission_id')
		->join('military_status as ms', 'ms.military_status_id', '=', 'sa.military_status_id')
		->join('military_area as ma', 'md.military_area_id', '=', 'ma.id')
		->select('sa.student_admission_id', 'student_first_name', 'student_middle_name', 'student_last_name', 'ms.military_status_description','ma.military_area_name', 'md.military_number' , 'md.military_delay','md.military_delay_number', 'md.military_delay_date')
		->orderBy('student_admission_id', 'asc')->get();
		// dd($data->toArray());

		return view('admission_reports.military_delays',['title'=>'Students Military Delays','data'=>$data->toArray()]);
		
	}
}