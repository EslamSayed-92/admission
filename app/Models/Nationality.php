<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 23:11:13 +0000.
 */

namespace App\Models;

// use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Nationality
 * 
 * @property int $nationality_id
 * @property string $nationality_name
 *
 * @package App\Models
 */
class Nationality extends GenericModel
{
	protected $table = 'nationality';
	protected $primaryKey = 'nationality_id';
	public $timestamps = false;

	protected $fillable = [
		'nationality_name'
	];

	public $rules = [
		'nationality_name'=>'required|max:30|alpha|unique:nationality,nationality_name',
	];
}
