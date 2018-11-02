<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 23:11:13 +0000.
 */

namespace App\Models;

// use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class MilitaryStatus
 * 
 * @property int $military_status_id
 * @property string $military_status_description
 *
 * @package App\Models
 */
class MilitaryArea extends GenericModel
{
	protected $table = 'military_area';
	protected $primaryKey = 'id';
	public $timestamps = false;

	protected $fillable = [
		'military_area_name'
	];

	public $rules = [
		'military_area_name'=>'required|max:30|string|unique:military_area,military_area_name',
	];
}
