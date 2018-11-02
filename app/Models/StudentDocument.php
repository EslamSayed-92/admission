<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 23:11:13 +0000.
 */

namespace App\Models;

// use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class StudentDocument
 * 
 * @property int $student_document_id
 * @property int $student_id
 * @property int $document_description_id
 * @property boolean $document_picture
 *
 * @package App\Models
 */
class StudentDocument extends GenericModel
{
	protected $table = 'student_document';
	protected $primaryKey = 'student_document_id';
	public $timestamps = false;

	protected $casts = [
		'student_admission_id' => 'int',
		'document_id' => 'int',
		'document_picture' => 'boolean'
	];

	protected $fillable = [
		'student_admission_id',
		'document_id',
		'document_picture'
	];

	public $rules = [
		'student_admission_id' => 'required|numeric',
		'document_id' => 'required|numeric',
	];
	#---------------- Relation Ships ------------------------------------#
	public function student_admission()
	{
		return $this->belongsTo('App\Models\StudentAdmission');
	}

	#---------------- Relation Ships ------------------------------------#
	public function document()
	{
		return $this->belongsTo('App\Models\Document');
	}
}
