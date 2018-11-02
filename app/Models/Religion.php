<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 23:11:13 +0000.
 */

namespace App\Models;

// use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Religion
 * 
 * @property int $religion_id
 * @property string $religion_name
 *
 * @package App\Models
 */
class Religion extends GenericModel
{
	protected $table = 'religion';
	protected $primaryKey = 'religion_id';
	public $timestamps = false;

	protected $fillable = [
		'religion_name'
	];

	public $rules = [
		'religion_name'=>'required|max:10|alpha|unique:religion,religion_name',
	];
}
