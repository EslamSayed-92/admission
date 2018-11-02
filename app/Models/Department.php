<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 23:11:13 +0000.
 */

namespace App\Models;

// use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Department
 * 
 * @property int $department_id
 * @property string $department_name
 * @property int $faculty_id
 *
 * @package App\Models
 */
class Department extends GenericModel
{
	protected $table = 'department';
	protected $primaryKey = 'department_id';
	public $timestamps = false;

	protected $casts = [
		'faculty_id' => 'int'
	];

	protected $fillable = [
		'department_name',
		'faculty_id'
	];

	public $rules = [
		'department_name'=>'required|max:50|alpha',
		'faculty_id'=>'required|numeric'
	];
	#---------------- Relation Ships ------------------------------------#
	public function faculty()
	{
		return $this->belongsTo('App\Models\Faculty');
	}
}
