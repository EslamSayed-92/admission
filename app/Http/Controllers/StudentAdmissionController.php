<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentAdmission;
use App\Models\Student;

class StudentAdmissionController extends GenericController
{
    
    private $all_fields;
	public function __construct()
    {
        $this->create_url = "/StudentAdmission";
        $this->model = $this->model.'\StudentAdmission';
        $this->temp = new $this->model;
        $this->title = 'Student Admissions';
        $this->model_title = 'Student Admission';
        $this->all_fields = array_keys($this->temp->get_properities());
    }

    function LabelFromKey($value)
    {
        return ucwords(str_replace("_", " ", str_replace("_id","",$value)));
    }

    protected function replace_id_by_name($record)
    {
        $id = reset($record);
        // dd($id);
        foreach (array_slice($record,1)  as $key => $value) {
            // dd($key);
            if(!in_array($key, $this->all_fields)){
                unset($record[$key]);
               
            }elseif(strpos($key, '_id')){

                $method_name = str_replace("_id", "", $key);
                $class_name = "App\Models\\".str_replace(" ","",ucwords(str_replace("_", " ", $method_name)));

                if(!is_null($value)){

                    $value = $class_name::find($value);

                    if(!is_null($value)){
                        $name = array_values(array_filter(array_keys($value->toArray()), array($this, 'GetNameField')));
                        $value = $value[$name[0]];
                         // dd($value);
                        $record[$key] = $value;
                    }
                    // dd($value);
                }

            }elseif (strpos($key, '_date')) {
                $record[$key] = date('d-m-Y',strtotime($value));
            }   
        }
         // dd($record);
        $record = array_replace(array_flip($this->all_fields), array_slice($record,1) );
        array_unshift($record,$id);
        return $record;
    }

    public function index()
    {
        
        $data = $this->model::all()->toArray();
        foreach ($data as $ind => $record) {
            $record = $this->replace_id_by_name($record);
            // dd($record);
            $data[$ind] = $record;
        }
        // dd($data);
        $headers = array_intersect(array_map(array($this,"LabelFromKey"), $this->all_fields), $this->temp->getTableColumns());
        return view('lookups.list', ['title'=>$this->title,
                                'model'=>$this->model_title,
                                'headers'=>$this->all_fields,
                                'data'=>$data,
                                'create_url'=>$this->create_url]);
    }

    public function create()
    {
        $admission_fields = ['name'=>[],'birth'=>[],'contact'=>[],'extra'=>[]];
        $all_fields = $this->temp->get_properities();
        // dd($this->all_fields);
        $admission_fields['name'] = array_slice($all_fields,0, 4);
        $admission_fields['birth'] = array_slice($all_fields,4, 3);
        $admission_fields['contact'] = array_slice($all_fields,7, 4);
        $admission_fields['extra'] = array_slice($all_fields,11, 5);
        $admission_fields['academic'] = array_slice($all_fields,16, 3);
        // dd($admission_fields['academic']);
        return view('applications.create', ['title'=>$this->title,
                                        'data'=>$admission_fields,
                                        'create_url'=>$this->create_url ]);
    }

    // *
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    public function show($id)
    {
        $data = $this->model::find($id)->toArray();
        $data = $this->replace_id_by_name($data);

        $data = array('student_admission_id' => $data[0])+$data;
        unset($data[0]);
        
        $student_code = Student::where('student_admission_id',$id)->value('student_id');
        $data['student_code'] = $student_code;
        
        return view('applications.show', ['title'=>$this->title, 'data'=>$data,
         'create_url'=>$this->create_url]);
    }

}