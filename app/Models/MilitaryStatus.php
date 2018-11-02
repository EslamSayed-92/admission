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
class MilitaryStatus extends GenericModel
{
	protected $table = 'military_status';
	protected $primaryKey = 'military_status_id';
	public $timestamps = false;

	protected $fillable = [
		'military_status_description'
	];

	public $rules = [
		'military_status_description'=>'required|max:15|alpha|unique:military_status,military_status_description',
	];
}
