<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 23:11:13 +0000.
 */

namespace App\Models;

// use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class StudentCourseRegistrationRecord
 * 
 * @property float $student_id
 * @property int $course_id
 * @property int $semester_id
 * @property int $academic_year_id
 * @property int $group_number
 * @property float $classwork
 * @property float $final_exam_mark
 * @property string $Grade
 *
 * @package App\Models
 */
class StudentCourseRegistrationRecord extends GenericModel
{
	protected $table = 'student_course_registration_record';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'student_id' => 'float',
		'course_id' => 'int',
		'semester_id' => 'int',
		'academic_year_id' => 'int',
		'group_number' => 'int',
		'classwork' => 'float',
		'final_exam_mark' => 'float'
	];

	protected $fillable = [
		'classwork',
		'final_exam_mark',
		'Grade'
	];

	public $rules = [
		'student_id' => 'required|numeric',
		'course_id' => 'required|numeric',
		'semester_id' => 'required|numeric',
		'academic_year_id' => 'required|numeric',
		'group_number' => 'required|numeric',
		'classwork' => 'digits:2,3',
		'final_exam_mark' => 'digits:2,3',
		'Grade'=>'alpha|max:1'
	];

	#---------------- Relation Ships ------------------------------------#
	public function student()
	{
		return $this->belongsTo('App\Models\Student');
	}

	public function course()
	{
		return $this->belongsTo('App\Models\Course');
	}

	public function semester()
	{
		return $this->belongsTo('App\Models\Semester');
	}

	public function academic_year()
	{
		return $this->belongsTo('App\Models\AcademicYear');
	}
}
