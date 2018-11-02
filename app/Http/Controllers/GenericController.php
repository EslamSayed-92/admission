<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Validation\Validator;
use Validator;
use App\Models ;
use carbon\Carbon ;
use App;


class GenericController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @property $model
     * @property $title
     * @property $temp
     * @property $create_url
     */

    protected $model = 'App\Models';
    protected $model_name;
    protected $title ;
    protected $model_title;
    protected $temp ;
    protected $create_url ;

    protected function GetNameField($value) {
        if(strpos($value, '_name') || strpos($value, '_description'))
            return $value;
    }

    protected function GetUniqueField($value)
    {
        if(strpos($value, 'unique'))
            return $value;
    }

    protected function replace_id_by_name($record)
    {
        foreach (array_slice($record,1) as $key => $value) {
            if(strpos($key, '_id'))
            {
                $method_name = str_replace("_id", "", $key);
                $class_name = "App\Models\\".str_replace(" ","",ucwords(str_replace("_", " ", $method_name)));
                if(!is_null($value)){
                    $value = $class_name::find($value);
                    if(!is_null($value)){
                        $name = array_values(array_filter(array_keys($value->toArray()), array($this, 'GetNameField')));
                        // dd($name);
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
        return $record;
    }

    protected function FixUniqueFields($model,$id,$except_field)
    {
        $unique_fields  = array_filter($model->rules, array($this,"GetUniqueField"));
        foreach ($unique_fields as $key => $value)
            $model->rules[$key] = $value.",$id,$except_field";
    }

    public function index()
    {
        $data = $this->model::all()->toArray();
        
        foreach ($data as $ind => $record) {
            $record = $this->replace_id_by_name($record);
            $data[$ind] = $record;
            // dd($record);
        }
        // dd($data);
        $headers = array_keys($this->temp->get_properities());
        return view('lookups.list', ['title'=>$this->title,
                                'model'=>$this->model_title,
                                'headers'=>$headers,
                                'data'=>$data,
                                'create_url'=>$this->create_url]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd($this->temp->get_properities());
        return view('lookups.create', ['title'=>$this->title,
                                        'data'=>$this->temp->get_properities(),
                                        'create_url'=>$this->create_url, 'back'=>$this->create_url ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $new = new $this->model;

        // $validator = Validator::make($request->all(),$new->rules);
        if ($new->validate($request->all())) {
            $data = $new->get_properities();
            foreach($data as $k => $v){
                if($v === 'date'){
                    $new[$k] = Carbon::createFromFormat('d-m-Y', request($k));
                }else{
                    $new[$k] = request($k) ;
                }
            }

            $new->save();
            return redirect($this->create_url);
        }else{
            // dd($new->errors());
            return redirect()->back()->withInput()->withErrors($new->errors());
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->model::find($id)->toArray();
        $data = $this->replace_id_by_name($data);
        return view('lookups.show', ['title'=>$this->title, 'data'=>$data,
         'create_url'=>$this->create_url]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->title = 'Edit '.$this->model_title;
        $data = $this->temp->get_values_and_types($id);
        //dd($data);
        $edit_url = $this->create_url."/".$id;
        return view('lookups.edit', ['title'=>$this->title, 'data'=>$data,
         'edit_url'=>$edit_url, 'back'=>$edit_url, 'model'=>$this->create_url]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->temp->get_values_and_types($id);
        $updated = $this->model::find($id);
        $this->FixUniqueFields($updated,$id,$updated->primaryKey());
        // dd($updated);

        if ($updated->validate($request->all())) {
            foreach($data as $k => $v){
                if($v['type'] === 'date'){
                    $updated[$k] = Carbon::createFromFormat('d-m-Y', request($k));
                }else{
                    $updated[$k] = request($k) ;
                }
            }
            $updated->save();
            return redirect($this->create_url."/".$id);
        }else{
          return redirect($this->create_url."/".$id."/edit")->withInput()->withErrors($updated->errors());  
        }   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->model::destroy($id);
        return redirect($this->create_url);
    }

}
