<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 23:11:13 +0000.
 */

namespace App\Models;

// use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Document
 * 
 * @property int $document_id
 * @property string $document_name
 *
 * @package App\Models
 */
class Document extends GenericModel
{
	protected $table = 'document';
	protected $primaryKey = 'document_id';
	public $timestamps = false;

	protected $fillable = [
		'document_name'
	];

	public $rules = [
		'document_name'=>'required|max:50|string|unique:document,document_name',
	];
}
