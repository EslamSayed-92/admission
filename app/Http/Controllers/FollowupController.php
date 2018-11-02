<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\StudentDocument;
use App\Models\MilitaryArea;
use App\Models\StudentAdmission;
use App\Models\MilitaryData;

class FollowupController extends GenericController
{
    //
    public function document_checklist($id)
    {
    	$documents = array_column(Document::all()->toArray(),'document_name','document_id');
    	$student_documents = StudentDocument::where('student_admission_id',$id)->pluck('document_id')->toArray();
    	// dd($student_documents);
    	
    	foreach ($documents as $key => $val) {
    		if(in_array($key, $student_documents))
    			$documents[$key]=['name'=>$val,'submitted'=>true];
    		else
    			$documents[$key]=['name'=>$val,'submitted'=>false];
    	}

		return response()->json(['title'=>trans('Followup.document_check_list'),'documents'=>$documents]);
    }

    public function add_sudent_document($id, Request $request)
    {
    	$document = array_flatten(Document::where('document_name',$request->get('document'))->pluck('document_id')->toArray());

    	$student_document = new StudentDocument;
    	$student_document['student_admission_id'] = $id;
    	$student_document['document_id'] = $document[0];
    	$student_document->save();

    	if($student_document->save()){
    		return response()->json(['state'=>true,'message'=>$request->get('document').' Add Succefully']);
    	}else{
    		return response()->json(['state'=>false,'message'=>'Error Adding '.$request->get('document')]);
    	}
    }

    public function document_check($id)
    {
    	$documents = Document::all()->count();
    	$student_documents = StudentDocument::where('student_admission_id',$id)->count();
    	if($documents == $student_documents)
    	{
            $student_military_data = MilitaryData::SelectRaw('military_number, ma.military_area_name as military_area, military_delay, military_delay_number, military_delay_date')
            ->join('military_area as ma','ma.id','=','military_area_id')
            ->where('student_admission_id','=',$id)->get()->toArray();

            // $student_military_data = $student_military_data[0];
    		if(count($student_military_data) > 0)
            {
                if($student_military_data[0]['military_delay'] == 'no' || is_null($student_military_data[0]['military_delay']))
                    unset($student_military_data[0]['military_delay'],$student_military_data[0]['military_delay_number'],$student_military_data[0]['military_delay_date']);
                return response()->json(['title'=>trans('Followup.student_military_data'),'complete'=>2,'data'=>$student_military_data]);
    		}
            else 
    			return response()->json(['title'=>trans('Followup.student_military_data'),'complete'=>1,'message'=>trans('Followup.military_data_complete')]);
    	}
    	else
    		return response()->json(['title'=>trans('generic.error'), 'complete'=>0,'message'=>trans('Followup.military_data_notcomplete')]);
    }
  
}
