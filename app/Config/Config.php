<?php

/**
 * Created by Eslam Sayed.
 * Date: Fri, 5 Oct 2018 04:00:13 +0000.
 */

namespace App\Config;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Config
 * 
 * @property string $name
 * @property string $value
 *
 * @package App\Models
 */
class Config extends Eloquent
{
	protected $table = 'config';
	protected $primaryKey = 'name';
	public $timestamps = false;

	protected $fillable = [
		'name',
		'value',
	];

	public $rules = [
        'name'=>'required|string|max:20|unique:config,name',
		'value'=>'required|string|max:10',
    ];
}
