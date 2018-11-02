<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MilitaryArea;
use App\Models\MilitaryData;
use carbon\Carbon ;

class MilitaryDataController extends StudentAdmissionController
{
    private function select_military_data($id)
    {
        $student_military_data = MilitaryData::selectRaw('military_number, ma.military_area_name, military_delay, military_delay_number, military_delay_date')
        ->join('military_areas as ma','ma.id','=','military_area_id')
        ->where('student_admission_id','=',$id)->get()->toArray();

        return $student_military_data;
    }
    public function get_military_data($id)
    {
    	$student_military_data = select_military_data($id);
    	
    	if(count($student_military_data) > 0)
    		return response()->json(['title'=>'Student Military Data','complete'=>true,'data'=>$student_military_data]);
    	else
    		return response()->json(['title'=>'Student Military Data','complete'=>false,'message'=>'All Student Documents are complete, You will be directed to enter military data']);
    }

    public function add_military_data($id)
    {

    	$add_url = str_replace('add', 'store', url()->current());
    	
    	return view('military_data.create', ['title'=>'Military Data',
                    'data'=>array_column(MilitaryArea::all()->toArray(),'military_area_name','id'),
                    'add_url'=>$add_url, 'back' => $this->create_url."/".$id ]);
    	//return response()->json($data);
    }

    public function store_military_data($id,Request $request)
    {
    	$student_military_data = MilitaryData::where('student_admission_id','=',$id)->get()->toArray();
         // dd($student_military_data);
        if(count($student_military_data) == 0){

            $student_military_data = new MilitaryData;
            if ($student_military_data->validate($request->all())) {

                foreach ($request->except('_token') as $key => $value){
                    if($key === 'military_delay_date'){
                        $student_military_data[$key] = Carbon::createFromFormat('d-m-Y', $value);
                    }else{
                        $student_military_data[$key] = $value;
                    }
                }
                $student_military_data['student_admission_id'] = $id;
                // dd($student_military_data);
                $student_military_data->save();
                $url = substr(url()->previous(), 0,strrpos(url()->previous(), '/', -5));
                // dd($url);
                return redirect($url);

            }else{
                $url = str_replace('store', 'add', url()->current());
                // dd($url);
                return redirect($url)->withInput()->withErrors($student_military_data->errors());
            }

        }    
    }

    public function edit_military_data($id)
    {
       	$student_military_data = MilitaryData::where('student_admission_id','=',$id)->first()->toArray();
    	$military_areas = array_column(MilitaryArea::all()->toArray(),'military_area_name','id');
    	$update_url = str_replace('edit', 'update', url()->current());;

        if($student_military_data['military_delay'] == 'no')
            unset($student_military_data['military_delay_number'],$student_military_data['military_delay_date']);
        else
            $student_military_data['military_delay_date'] = date('d-m-Y',strtotime($student_military_data['military_delay_date']));

    	return view('military_data.edit', ['title'=>'Military Data',
                    'student_military_data'=>$student_military_data,
                    'military_areas'=>$military_areas,
                    'update_url'=>$update_url, 'back' => $this->create_url."/".$id ]); 
    }

    public function update_military_data($id,Request $request)
    {
        // $military_temp = MilitaryData::find($id);
    	$student_military_data = MilitaryData::where('student_admission_id','=',$id)->first();
        $this->FixUniqueFields($student_military_data,$id,'student_admission_id');

        if ($student_military_data->validate($request->all())) {
           foreach ($request->except('_method','_token') as $key => $value) {
                if($key === 'military_delay_date'){
                    $student_military_data[$key] = Carbon::createFromFormat('d-m-Y', $value);
                }else{
                    $student_military_data[$key] = $value;
                }
            }
            $student_military_data->save();

            $url = substr(url()->current(), 0,strripos(url()->current(), '/'));
            // dd($url);
            return redirect($url);
        }else{
            $url = str_replace('update', 'edit', url()->current());
            // dd($url);
            return redirect($url)->withInput()->withErrors($student_military_data->errors());
        }

    }
}
