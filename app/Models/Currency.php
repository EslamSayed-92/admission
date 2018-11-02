<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 23:11:13 +0000.
 */

namespace App\Models;

// use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Currency
 * 
 * @property int $currency_id
 * @property string $currency_description
 *
 * @package App\Models
 */
class Currency extends GenericModel
{
	protected $table = 'currency';
	protected $primaryKey = 'currency_id';
	public $timestamps = false;

	protected $fillable = [
		'currency_description'
	];

	public $rules = [
		'currency_description'=>'required|max:5|alpha|unique:currency,currency_description'
	];
}
