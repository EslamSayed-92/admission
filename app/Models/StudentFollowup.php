<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 23:11:13 +0000.
 */

namespace App\Models;

// use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class StudentFollowup
 * 
 * @property float $student_id
 * @property string $semester_id
 * @property float $GPA
 * @property int $status_id
 * @property int $absent_percentage
 *
 * @package App\Models
 */
class StudentFollowup extends GenericModel
{
	protected $table = 'student_followup';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'student_id' => 'float',
		'GPA' => 'float',
		'status_id' => 'int',
		'absent_percentage' => 'int'
	];

	protected $fillable = [
		'GPA',
		'status_id',
		'absent_percentage'
	];

	public $rules = [
		'student_id' => 'required|numeric',
		'GPA' => 'required|digits_between:2,4',
		'status_id' => 'required|numeric',
		'absent_percentage' => 'digits_between:2,3'
	];

	#---------------- Relation Ships ------------------------------------#
	public function student()
	{
		return $this->belongsTo('App\Models\Student');
	}
}
