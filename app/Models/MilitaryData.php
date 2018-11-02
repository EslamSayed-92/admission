<?php

namespace App\Models;

//use App\Traits\Enums;
// use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class MiltaryData
 *  
 * @property string $military_number
 * @property int $military_area_id
 * @property string $military_delay_number
 * @property date $military_delay_date
 *
 * @package App\Models
 */
class MilitaryData extends GenericModel
{
	protected $table = 'military_data';
	protected $primaryKey = 'id';
	public $timestamps = false;
	protected $enummilitary_delays = [
        'yes',
        'no',
    ];

	protected $casts =[
		'military_area_id' => 'int',
		'student_admission_id' => 'int'
	];


	protected $dates = [
		'military_delay_date'
	];
	protected $fillable = [
		'military_number',
		'military_area_id',
		'military_delay',
		'military_delay_number',
		'military_delay_date'
	];

	public $rules = [
		'military_number'=>'required|digits:16|numeric|unique:military_data,military_number',
		'military_area_id'=>'required|numeric',
		'military_delay'=>'required|alpha|max:3',
		'military_delay_number'=>'digits:16|numeric|unique:military_data,military_delay_number',
		'military_delay_date'=>'date_format:d-m-Y',
		'student_admission_id'=>'numeric|unique:military_data,student_admission_id',
	];

	public function student_admission()
	{
	    return $this->belongsTo('App\Models\StudentAdmission', 'student_admission_id', 'student_admission_id');
	}
}
