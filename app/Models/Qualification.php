<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 23:11:13 +0000.
 */

namespace App\Models;

// use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Qualification
 * 
 * @property int $qualification_id
 * @property string $qualification_name
 *
 * @package App\Models
 */
class Qualification extends GenericModel
{
	protected $table = 'qualification';
	protected $primaryKey = 'qualification_id';
	public $timestamps = false;

	protected $fillable = [
		'qualification_name'
	];

	public $rules = [
		'qualification_name'=>'required|max:50|alpha_dash|unique:qualification,qualification_name',
	];
}
