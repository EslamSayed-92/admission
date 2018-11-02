<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 23:11:13 +0000.
 */

namespace App\Models;

// use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class StudentLevelDatum
 * 
 * @property int $student_id
 * @property int $student_level
 * @property int $academeic_year_id
 * @property int $seat_number
 * @property float $level_GPA
 * @property int $specialization_id
 *
 * @package App\Models
 */
class StudentLevelDatum extends GenericModel
{
	protected $table = 'student_level_data';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'student_id' => 'int',
		'study_level_id' => 'int',
		'academic_year_id' => 'int',
		'seat_number' => 'int',
		'level_GPA' => 'float',
		'specialization_id' => 'int'
	];

	protected $fillable = [
		'seat_number',
		'level_GPA',
		'specialization_id'
	];

	public $rules = [
		'student_id' => 'required|numeric',
		'study_level_id' => 'required|numeric',
		'academic_year_id' => 'required|numeric',
		'seat_number' => 'numeric',
		'level_GPA' => 'required|digits:3,4',
		'specialization_id' => 'numeric'
	];

	#---------------- Relation Ships ------------------------------------#
	public function student()
	{
		return $this->belongsTo('App\Models\Student');
	}

	public function study_level()
	{
		return $this->belongsTo('App\Models\StudyLevel');
	}

	public function academic_year()
	{
		return $this->belongsTo('App\Models\AcademicYear');
	}



}
