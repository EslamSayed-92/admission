<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 23:11:13 +0000.
 */

namespace App\Models;

// use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Payment
 * 
 * @property string $payment_receipt_id
 * @property \Carbon\Carbon $payment_receipt_date
 * @property int $payment_type_id
 * @property float $payment_value
 * @property int $currency_id
 * @property int $student_id
 * @property int $semester_id
 * @property int $academic_year_id
 *
 * @package App\Models
 */
class Payment extends GenericModel
{
	protected $table = 'payment';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'payment_type_id' => 'int',
		'payment_value' => 'float',
		'currency_id' => 'int',
		// 'student_admission_id' => 'int',
		// 'semester_id' => 'int',
		// 'academic_year_id' => 'int'
	];

	protected $dates = [
		'payment_receipt_date'
	];

	protected $fillable = [
		'payment_receipt_id',
		'payment_value',
		'currency_id',
		// 'student_admission_id',
		// 'semester_id',
		// 'academic_year_id'
	];

	public $rules = [
		'payment_receipt_id'=>'required|string|max:40|unique:payment,payment_receipt_id',
		'payment_type_id' => 'required|numeric',
		'payment_value' => 'required|digits_between:1.0,6.2',
		'currency_id' => 'required|numeric',
		'payment_receipt_date' => 'required|date_format:d-m-Y'
		// 'student_admission_id' => 'required|numberic',
		// 'semester_id' => 'required|numberic',
		// 'academic_year_id' => 'required|numberic'
	];

	#---------------- Relation Ships ------------------------------------#
	public function currency()
	{
		return $this->belongsTo('App\Models\Currency');
	}

	public function payment_type()
	{
		return $this->belongsTo('App\Models\PaymentType');
	}

	public function StudentAdmission()
	{
		return $this->belongsTo('App\Models\StudentAdmission');
	}

	public function semester()
	{
		return $this->belongsTo('App\Models\Semester');
	}

	public function academic_year()
	{
		return $this->belongsTo('App\Models\AcademicYear');
	}
}
