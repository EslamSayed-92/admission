<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 23:11:13 +0000.
 */

namespace App\Models;

// use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Faculty
 * 
 * @property int $faculty_id
 * @property string $faculty_name
 * @property int $university_id
 * @property boolean $faculty_logo
 *
 * @package App\Models
 */
class Faculty extends GenericModel
{
	protected $table = 'faculty';
	protected $primaryKey = 'faculty_id';
	public $timestamps = false;

	protected $casts = [
		'university_id' => 'int',
		'faculty_logo' => 'boolean'
	];

	protected $fillable = [
		'faculty_name',
		'university_id',
		'faculty_logo'
	];

	public $rules = [
		'faculty_name'=>'required|max:50|string',
		'university_id'=>'required|numeric',
	];

	#---------------- Relation Ships ------------------------------------#
	public function university()
	{
		return $this->belongsTo('App\Models\University');
	}
}
