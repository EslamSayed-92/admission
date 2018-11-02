<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 23:11:13 +0000.
 */

namespace App\Models;

// use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class StudentAdditionalCourse
 * 
 * @property int $student_additional_course_id
 * @property int $student_id
 * @property int $additional_course_id
 * @property float $total_mark
 * @property \Carbon\Carbon $exam_date
 * @property bool $pass
 *
 * @package App\Models
 */
class StudentAdditionalCourse extends GenericModel
{
	protected $table = 'student_additional_course';
	public $timestamps = false;

	protected $casts = [
		'student_id' => 'int',
		'additional_course_id' => 'int',
		'total_mark' => 'float',
		'pass' => 'bool'
	];

	protected $dates = [
		'exam_date'
	];

	protected $fillable = [
		'total_mark',
		'exam_date',
		'pass'
	];

	public $rules = [
		'student_id' => 'required|numeric',
		'additional_course_id' => 'required|numeric',
		'total_mark' => 'digits:2,3',
		'exam_date' => 'date_format:d-m-Y',
		'pass' => 'digits:2,3'
	];

	#---------------- Relation Ships ------------------------------------#
	public function student()
	{
		return $this->belongsTo('App\Models\Student');
	}

	public function additional_course()
	{
		return $this->belongsTo('App\Models\AdditionalCourse');
	}
}
