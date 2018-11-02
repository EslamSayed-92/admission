<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 23:11:13 +0000.
 */

namespace App\Models;

// use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Governorate
 * 
 * @property int $governorate_id
 * @property int $nationality_id
 * @property string $governorate_name
 *
 * @package App\Models
 */
class Governorate extends GenericModel
{
	protected $table = 'governorate';
	protected $primaryKey = 'governorate_id';
	public $timestamps = false;

	protected $casts = [
		'nationality_id' => 'int'
	];

	protected $fillable = [
		'governorate_name',
		'nationality_id'
	];

	public $rules = [
		'governorate_name'=>'required|max:20|string|unique:governorate,governorate_name',
		'nationality_id'=>'required|numeric'
	];

	#---------------- Relation Ships ------------------------------------#
	public function nationality()
	{
		return $this->belongsTo('App\Models\Nationality');
	}

}
