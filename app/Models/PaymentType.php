<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 23:11:13 +0000.
 */

namespace App\Models;

// use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PaymentType
 * 
 * @property int $payment_type_id
 * @property string $payment_type_name
 *
 * @package App\Models
 */
class PaymentType extends GenericModel
{
	protected $table = 'payment_type';
	protected $primaryKey = 'payment_type_id';
	public $timestamps = false;

	protected $casts =[
		'payment_value'=>'float'
	];

	protected $fillable = [
		'payment_type_name',
		'payment_value'
	];

	public $rules = [
		'payment_type_name'=>'required|max:20|string|unique:payment_type',
		'payment_value' => 'required|numeric|between:1.0,9999.99'
	];
}
