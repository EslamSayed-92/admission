<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 23:11:13 +0000.
 */

namespace App\Models;

// use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class StudyLevel
 * 
 * @property int $level_id
 * @property string $level_description
 *
 * @package App\Models
 */
class StudyLevel extends GenericModel
{
	protected $table = 'study_level';
	protected $primaryKey = 'level_id';
	public $timestamps = false;

	protected $fillable = [
		'level_description'
	];

	public $rules = [
		'level_description'=>'required|alpha|max:20|unique:level_description,study_level'
	];
}
