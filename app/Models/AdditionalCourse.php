<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 23:11:13 +0000.
 */

namespace App\Models;

// use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AdditionalCourse
 * 
 * @property string $additional_course_id
 * @property string $additional_course_name
 * @property float $final_mark
 * @property float $pass_mark
 *
 * @package App\Models
 */
class AdditionalCourse extends GenericModel
{
	protected $table = 'additional_course';
	protected $primaryKey = 'additional_course_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'final_mark' => 'float',
		'pass_mark' => 'float'
	];

	protected $fillable = [
		'additional_course_name',
		'final_mark',
		'pass_mark'
	];

	public $rules = [
		'additional_course_name'=>'required|string|max:50|unique:additional_course,additional_course_name',
		'final_mark'=>'required|digits_between:2,3',
		'pass_mark'=>'required|digits_between:2,3',
	];
}
