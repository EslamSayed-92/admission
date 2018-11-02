<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 23:11:13 +0000.
 */

namespace App\Models;

// use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class StudentQualification
 * 
 * @property int $student_qualification_id
 * @property int $student_id
 * @property int $qualification_id
 * @property int $specialization_id
 * @property float $grade
 * @property \Carbon\Carbon $qualification_earn_date
 * @property int $school_id
 *
 * @package App\Models
 */
class StudentQualification extends GenericModel
{
	protected $table = 'student_qualification';
	protected $primaryKey = 'student_qualification_id';
	public $timestamps = false;

	protected $casts = [
		'student_id' => 'int',
		'qualification_id' => 'int',
		'specialization_id' => 'int',
		'grade' => 'float',
		'school_id' => 'int'
	];

	protected $dates = [
		'qualification_earn_date'
	];

	protected $fillable = [
		'student_id',
		'qualification_id',
		'specialization_id',
		'grade',
		'qualification_earn_date',
		'school_id'
	];

	public $rules = [
		'student_id' => 'required|numeric',
		'qualification_id' => 'required|numeric',
		'specialization_id' => 'required|numeric',
		'grade' => 'digits:3,4',
		'qualification_earn_date' => 'date_format:d-m-Y',
		'school_id' => 'required|numeric',
	];
	#---------------- Relation Ships ------------------------------------#
	public function student()
	{
		return $this->belongsTo('App\Models\Student');
	}

	public function qualification()
	{
		return $this->belongsTo('App\Models\Qualification');
	}

	public function specialization()
	{
		return $this->belongsTo('App\Models\Specialization');
	}

	public function school()
	{
		return $this->belongsTo('App\Models\School');
	}
}
