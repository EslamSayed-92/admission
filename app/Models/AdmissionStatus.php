<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 23:11:13 +0000.
 */

namespace App\Models;

// use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AdmissionStatus
 * 
 * @property int $admission_status_id
 * @property string $admission_status_description
 *
 * @package App\Models
 */
class AdmissionStatus extends GenericModel
{
	protected $table = 'admission_status';
	protected $primaryKey = 'admission_status_id';
	public $timestamps = false;

	protected $fillable = [
		'admission_status_description'
	];

	public $rules = [
		'admission_status_description'=>'required|max:20|string|unique:admission_status,admission_status_description'
	];
}
