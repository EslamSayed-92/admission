<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 23:11:13 +0000.
 */

namespace App\Models;

// use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Semester
 * 
 * @property int $semester_id
 * @property string $semester_name_arabic
 * @property string $semester_name_english
 *
 * @package App\Models
 */
class Semester extends GenericModel
{
	protected $table = 'semester';
	protected $primaryKey = 'semester_id';
	public $timestamps = false;

	protected $fillable = [
		'semester_name_english',
		'semester_name_arabic'
	];

	public $rules = [
		'semester_name_english'=>'required|max:10|alpha|unique:semester,semester_name_english',
		'semester_name_arabic'=>'sometimes|max:10|alpha|unique:semester,semester_name_arabic',
	];
}
