<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 25 Jun 2018 15:06:58 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;
use Validator;
/**
 * Class MyModel
 * 
 *
 * @package App\Models
 */
class GenericModel extends Eloquent
{
	
	public $timestamps = false;
	protected $casts = [];
	protected $dates = [];
	protected $fillable = [];
	protected $guarded = [];
	protected $errors = "";
	protected $primaryKey="";

	protected $dateFormat = 'Y-m-d H:i:s';
	
	function GetNameField($value) {
		if(strpos($value, '_name') || strpos($value, '_description'))
	    	return $value;
	}

	public function get_properities()
	{
		$props = array();
		foreach ($this->fillable as $k => $v)
			$props[$v] = 'string';
		foreach ($this->dates as $k => $v)
			$props[$v] = 'date';
		
		$props = array_merge($props,$this->casts);

		foreach ($props as $key => $value) {

			if( method_exists($this,str_replace("_id", "", $key)) ){

				$method_name = str_replace("_id", "", $key);
				$class_name = "App\Models\\".str_replace(" ","",ucwords(str_replace("_", " ", $method_name)));
				
				if(class_exists($class_name))
				{
					$props[$key] = [];
					foreach ($class_name::all()->toArray() as $k => $v){
						$name = array_values(array_filter(array_keys($v), array($this, 'GetNameField')));
						$props[$key][reset($v)] = $v[$name[0]];
					}
				}
				else
					$props[$key] = $value;
			}
			else
				$props[$key] = $value;
		}
		//dd($props);
		return $props;
	}


	public function get_values_and_types($id=0,$model='')
	{
		$checked_data = $this->get_properities();
		$data='';

		if($id>0){
			$data = $this->find($id)->toArray();
			$data = array_slice($data, 1);
		}
		elseif($model!='')
			$data = $model->toArray();

		foreach ($data as $key => $value) {
			if(!array_key_exists($key, $checked_data)){
				unset($data[$key]);
				continue;
			}
			$data[$key] = [];
			$data[$key]['value'] = $value;

			if( method_exists($this,str_replace("_id", "", $key)) )
			{	

				$method_name = str_replace("_id", "", $key);
			$class_name = "App\Models\\".str_replace(" ","",ucwords(str_replace("_", " ", $method_name)));
				$data[$key]['value'] = $value;
				if(class_exists($class_name))
				{
					
					$data[$key]['type'] = [];
				
					foreach ($class_name::all()->toArray() as $k => $v) {
						$data[$key]['type'][reset($v)] = array_values($v)[1];
					}
				}
				//unset($data[$key]);
			}
			elseif(in_array($key, $this->dates)){
				$data[$key]['type'] = 'date';
				$data[$key]['value'] = date('d-m-Y',strtotime($value));
			}
			elseif(array_key_exists($key, $this->casts)){
				$data[$key]['type'] = $this->casts[$key];
			}
			else
				$data[$key]['type'] = 'string';
		}
		return $data;
	}

	public function getTableColumns() {
        $props = $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
        foreach ($props as $key => $value) {
        	$props[$key] = ucwords(str_replace("_", " ", str_replace("_id", "", $value)));
        }
        return array_slice($props, 1);
    }

    public function validate($data)
    {
        // make a new validator object
        $v = Validator::make($data, $this->rules);
        // dd($v->messages());
        
        if ($v->fails())
        {
            // set errors and return false
            // $messages=$v->errors();
            // dd($messages->get('student_first_name'));
            $this->errors = $v;
            return false;
        }
        // validation pass
        return true;
    }

    public function errors()
    {
    	return $this->errors;
    }

    public function primaryKey()
    {
    	return $this->primaryKey;
    }
}