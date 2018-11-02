<?php

/**
 * Created by Eslam Sayed.
 * Date: Fri, 5 Oct 2018 04:00:13 +0000.
 */

namespace App\Config;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Lang
 * 
 * @property string $name
 * @property string $value
 *
 * @package App\Models
 */
class Lang extends Eloquent
{
	protected $table = 'lang';
	protected $primaryKey = 'value';
	public $timestamps = false;

	protected $fillable = [
		'name',
		'value',
	];

	public $rules = [
        'name'=>'required|string|max:20',
		'value'=>'required|string|max:2|unique:config,value',
    ];
}
