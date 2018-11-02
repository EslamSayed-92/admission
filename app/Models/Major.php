<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 23:11:13 +0000.
 */

namespace App\Models;

// use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Major
 * 
 * @property int $major_id
 * @property string $major_name
 *
 * @package App\Models
 */
class Major extends GenericModel
{
	protected $table = 'major';
	protected $primaryKey = 'major_id';
	public $timestamps = false;

	protected $fillable = [
		'major_name'
	];

	public $rules = [
		'major_name'=>'required|max:20|string|unique:major,major_name',
	];
}
