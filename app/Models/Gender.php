<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 23:11:13 +0000.
 */

namespace App\Models;

// use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Gender
 * 
 * @property int $gender_id
 * @property string $gender_name
 *
 * @package App\Models
 */
class Gender extends GenericModel
{
	protected $table = 'gender';
	protected $primaryKey = 'gender_id';
	public $timestamps = false;

	protected $fillable = [
		'gender_name'
	];

	public $rules = [
		'gender_name'=>'required|max:6|alpha|unique:gender,gender_name',
	];
}
