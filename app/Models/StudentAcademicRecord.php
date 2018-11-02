<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 23:11:13 +0000.
 */

namespace App\Models;

// use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class StudentAcademicRecord
 * 
 * @property int $student_admission_id
 * @property int $academic_year_id
 * @property int $semester_id
 * @property int $student_academic_record_id
 * @property int $number_of_registered_courses
 * @property int $number_of_registered_credit_hours
 * @property int $number_of_withdrawed_courses
 * @property int $number_of_withdrawed_credit_hours
 * @property int $semester_status
 * @property float $smester_GPA
 * @property int $accumlated_GPA
 * @property int $major_id
 * @property int $specialization_id
 * @property int $minor_id
 * @property int $student_major_sheet_id
 * @property int $total_number_of_alerts
 * @property int $faculty_id
 * @property int $department_id
 * @property int $student_exam_seat_number
 * @property string $comments
 *
 * @package App\Models
 */
class StudentAcademicRecord extends GenericModel
{
	protected $table = 'student_academic_record';
	protected $primaryKey = 'student_academic_record_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		// 'student_code' => 'int',
		'academic_year_id' => 'int',
		'semester_id' => 'int',
		'number_of_registered_courses' => 'int',
		'number_of_registered_credit_hours' => 'int',
		'number_of_withdrawed_courses' => 'int',
		'number_of_withdrawed_credit_hours' => 'int',
		'semester_status' => 'int',
		'smester_GPA' => 'float',
		'accumlated_GPA' => 'int',
		'major_id' => 'int',
		'specialization_id' => 'int',
		'minor_id' => 'int',
		'student_major_sheet_id' => 'int',
		'total_number_of_alerts' => 'int',
		'faculty_id' => 'int',
		'department_id' => 'int',
		'student_exam_seat_number' => 'int'
	];

	protected $fillable = [
		'academic_year_id',
		'semester_id',
		'number_of_registered_courses',
		'number_of_registered_credit_hours',
		'number_of_withdrawed_courses',
		'number_of_withdrawed_credit_hours',
		'semester_status',
		'smester_GPA',
		'accumlated_GPA',
		'major_id',
		'specialization_id',
		'minor_id',
		'student_major_sheet_id',
		'total_number_of_alerts',
		'faculty_id',
		'department_id',
		'student_exam_seat_number',
		'comments'
	];

	public $rules = [
		// 'student_code' => 'digits:13|unique:student_admission,student_code',
		'academic_year_id'=>'required|numeric',
		'semester_id'=>'required|numeric',
		'number_of_registered_courses'=>'required|digits:1',
		'number_of_registered_credit_hours'=>'required|digits_between:1,2',
		'number_of_withdrawed_courses'=>'required|digits:1',
		'number_of_withdrawed_credit_hours'=>'required|digits_between:1,2',
		'semester_status'=>'required|alpha|max:10',
		'smester_GPA'=>'required|digits:3,4',
		'accumlated_GPA'=>'required|digits:3,4',
		'major_id'=>'required|numeric',
		'specialization_id'=>'required|numeric',
		'minor_id'=>'required|numeric',
		'student_major_sheet_id'=>'numeric',
		'total_number_of_alerts'=>'digits:1',
		'faculty_id'=>'required|numeric',
		'department_id'=>'required|numeric',
		'student_exam_seat_number'=>'numeric',
		'comments'=>'string'
	];

	#---------------- Relation Ships ------------------------------------#
	public function student_code()
	{
		return $this->belongsTo('App\Models\StudentAdmission','student_code','student_code');
	}

	public function academic_year()
	{
		return $this->belongsTo('App\Models\AcademicYear');
	}

	public function semester()
	{
		return $this->belongsTo('App\Models\Semester');
	}

	public function major()
	{
		return $this->belongsTo('App\Models\Major');
	}

	public function specialization()
	{
		return $this->belongsTo('App\Models\Specialization');
	}

	public function minor()
	{
		return $this->belongsTo('App\Models\Major');
	}

	public function faculty()
	{
		return $this->belongsTo('App\Models\Faculty');
	}

	public function department()
	{
		return $this->belongsTo('App\Models\Department');
	}
}
