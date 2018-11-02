<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 23:11:13 +0000.
 */

namespace App\Models;

// use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AcademicYear
 * 
 * @property int $academic_year_id
 * @property string $academic_year_description
 * @property \Carbon\Carbon $academic_year_start_date
 * @property \Carbon\Carbon $academic_year end_date
 *
 * @package App\Models
 */
class AcademicYear extends GenericModel
{
	protected $table = 'academic_year';
	protected $primaryKey = 'academic_year_id';
	public $timestamps = false;

	protected $dates = [
		'academic_year_start_date',
		'academic_year_end_date'
	];

	protected $fillable = [
		'academic_year_description',
		'academic_year_start_date',
		'academic_year_end_date'
	];

	public $rules = [
        'academic_year_description'=>'required|string|max:10|unique:academic_year,academic_year_description',
		'academic_year_start_date'=>'required|date',
		'academic_year_end_date'=>'required|date'
    ];
}
