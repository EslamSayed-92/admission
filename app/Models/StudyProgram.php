<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 23:11:13 +0000.
 */

namespace App\Models;

// use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class StudyProgram
 * 
 * @property int $study_program_id
 * @property string $study_program_description
 * @property int $department_id
 *
 * @package App\Models
 */
class StudyProgram extends GenericModel
{
	protected $table = 'study_program';
	protected $primaryKey = 'study_program_id';
	public $timestamps = false;

	protected $casts = [
		'department_id' => 'int'
	];

	protected $fillable = [
		'study_program_description',
		'department_id'
	];

	public $rules = [
		'study_program_description'=>'required|alpha|max:20|unique:study_program,study_program_description',
		'department_id'=>'required|numeric'
	];

	#---------------- Relation Ships ------------------------------------#
	public function department()
	{
		return $this->belongsTo('App\Models\Department');
	}
}
