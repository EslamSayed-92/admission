<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\StudentAdmission;
use Session;
use Excel;
use File;

class ApplicationController extends Controller
{

	private $file_path;
    public function index()
    {
        return view('applications.excel');
    }
 
    public function import(Request $request)
    {
        //validate the xls file
        $this->validate($request, array(
            'file'      => 'required'
        ));
 
        if($request->hasFile('file')){
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
 
                $path = $request->file->getRealPath();
                $data = Excel::load($path, function($reader) { })->get();
                if(!empty($data) && $data->count()){

                	$temp = new StudentAdmission;
                	$fields = $temp->get_properities();
                	$headers = array_keys($data[0]->toArray());

                	Session::flash('data', $data);
                	return view('applications.mapper', ['upload_url'=>"excel/upload",
                							'headers'=>$headers, 'fields'=>$fields]);
                } 
            }
            else {
                Session::flash('error', 'File is a '.$extension.' file.!! Please upload a valid xls/csv file..!!');
                return back();
            }
        }
    }

    public function upload(Request $request)
    {
    	$data = $request->session()->pull('data');
    	foreach ($data as $key => $value) {
    		$insert = new StudentAdmission;
    		foreach ($request->except('_token') as $k => $v) {
    			if(!is_null($v)){
    				$insert[$k] = $value{$v};
    			}
    		}

    		if(!empty($insert)){
                $insert->save();
            }
        }
    	
    }
}
