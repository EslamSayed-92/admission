<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 23:11:13 +0000.
 */

namespace App\Models;

// use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class School
 * 
 * @property int $school_id
 * @property string $school_name
 *
 * @package App\Models
 */
class School extends GenericModel
{
	protected $table = 'school';
	protected $primaryKey = 'school_id';
	public $timestamps = false;

	protected $fillable = [
		'school_name'
	];

	public $rules = [
		'school_name'=>'required|max:30|alpha|unique:school,school_name',
	];
}
