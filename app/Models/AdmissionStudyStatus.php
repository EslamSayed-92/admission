<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 23:11:13 +0000.
 */

namespace App\Models;

// use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AdmissionStudyStatus
 * 
 * @property int $admission_study_status_id
 * @property string $admission_study_status_description
 *
 * @package App\Models
 */
class AdmissionStudyStatus extends GenericModel
{
	protected $table = 'admission_study_status';
	protected $primaryKey = 'admission_study_status_id';
	public $timestamps = false;

	protected $fillable = [
		'admission_study_status_description'
	];
	
	public $rules = [
		'admission_study_status_description'=>'required|max:20|alpha|unique:admission_study_status,admission_study_status_description'
	];
}
