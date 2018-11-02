<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 23:11:13 +0000.
 */

namespace App\Models;

// use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Specialization
 * 
 * @property int $specialization_id
 * @property string $specialization_name
 *
 * @package App\Models
 */
class Specialization extends GenericModel
{
	protected $table = 'specialization';
	protected $primaryKey = 'specialization_id';
	public $timestamps = false;

	protected $casts = [
		'major_id' => 'int'
	];

	protected $fillable = [
		'specialization_name',
		'major_id'
	];

	public $rules = [
		'specialization_name'=>'required|max:30|string|unique:specialization,specialization_name',
		'major_id'=>'required|numeric'
	];

	#---------------- Relation Ships ------------------------------------#
	public function major()
	{
		return $this->belongsTo('App\Models\Major');
	}
}
