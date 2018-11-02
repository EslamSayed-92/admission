<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 23:11:13 +0000.
 */

namespace App\Models;

// use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Student
 * 
 * @property float $student_id
 * @property string $first_name
 * @property string $middle_name
 * @property string $sur_name
 * @property string $family_name
 * @property int $student_phone_number
 * @property int $batch_year
 * @property int $major_id
 * @property int $department_id
 * @property int $number_of_under_probation_semester
 *
 * @package App\Models
 */
class Student extends GenericModel
{
	protected $table = 'student';
	protected $primaryKey = 'student_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'student_admission_id' => 'int',
		'admission_year_id' => 'int',
		'major_id' => 'int',
		'faculty_id' => 'int',
	];

	protected $fillable = [
		'student_admission_id',
		'first_name',
		'middle_name',
		'last_name',
		'mobile_number',
		'admission_year_id',
		'major_id',
		'faculty_id'
	];

	public $rules = [
		'first_name'=>'required|alpha|between:10,24',
		'middle_name'=>'required|alpha|between:10,29',
		'last_name'=>'required|alpha|between:10,24',
		'mobile_number'=>'required|numeric|digits:11',
		'admission_year_id'=>'required|numeric',
		'major_id'=>'required|numeric',
		'faculty_id'=>'required|numeric',
	];

	#---------------- Relation Ships ------------------------------------#
	public function major()
	{
		return $this->belongsTo('App\Models\Major');
	}

	public function department()
	{
		return $this->belongsTo('App\Models\Department');
	}
}
