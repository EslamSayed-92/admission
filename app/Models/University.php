<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 23:11:13 +0000.
 */

namespace App\Models;

// use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class University
 * 
 * @property int $university_id
 * @property string $university_name
 * @property boolean $university_logo
 *
 * @package App\Models
 */
class University extends GenericModel
{
	protected $table = 'university';
	protected $primaryKey = 'university_id';
	public $timestamps = false;

	protected $casts = [
		'university_logo' => 'boolean'
	];

	protected $fillable = [
		'university_name',
		'university_logo'
	];

	public $rules = [
		'university_name'=>'required|string|max:50|unique:university,university_name',
	];
}
