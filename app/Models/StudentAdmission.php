<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 17 Jul 2018 21:09:48 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class StudentAdmission
 * 
 * @property int $student_admission_id
 * @property string $student_first_name
 * @property string $student_middle_name
 * @property string $student_last_name
 * @property int $religion_id
 * @property int $gender_id
 * @property int $nationality_id
 * @property int $governorate_id
 * @property \Carbon\Carbon $birth_date
 * @property string $national_security_number
 * @property int $home_phone_number
 * @property string $mobile_number
 * @property string $student_address
 * @property string $email_address
 * @property boolean $student_picture
 * @property string $medical_investigation_report
 * @property bool $medical_investigation_result
 * @property int $military_status_id
 * @property int $admission_status_id
 * @property int $admission_study_status_id
 * @property int $semester_id
 * @property int $academic_year_id
 * @property int $number_of_additional_courses
 *
 * @package App\Models
 */
class StudentAdmission extends GenericModel
{
	protected $table = 'student_admission';
	protected $primaryKey = 'student_admission_id';
	public $timestamps = false;

	protected $casts = [
		'religion_id' => 'int',
		'gender_id' => 'int',
		'nationality_id' => 'int',
		'governorate_id' => 'int',
		'home_phone_number' => 'int',
		'military_status_id' => 'int',
		'admission_status_id' => 'int',
		'admission_study_status_id' => 'int',
		
		// 'student_picture' => 'boolean',
		// 'medical_investigation_result' => 'bool',
		'semester_id' => 'int',
		'academic_year_id' => 'int',
		'number_of_additional_courses' => 'int',
	];

	protected $dates = [
		'birth_date'
	];

	protected $fillable = [
		'student_first_name',
		'student_middle_name',
		'student_last_name',
		'national_security_number',

		'nationality_id',
		'governorate_id',
		'birth_date',
		
		'home_phone_number',
		'mobile_number',
		'student_address',
		'email_address',

		'religion_id',
		'gender_id',
		'military_status_id',
		'admission_status_id',
		'admission_study_status_id',

		// 'student_picture',
		// 'medical_investigation_report',
		// 'medical_investigation_result',		
		'semester_id',
		'academic_year_id',
		'number_of_additional_courses'
	];

	public $rules = [
		'student_code' => 'digits:13|unique:student_admission,student_code',
        'student_first_name' => 'required|string|max:15',
        'student_middle_name' => 'required|string|max:15',
        'student_last_name' => 'required|string|max:15',
        'birth_date' => 'required|date_format:d-m-Y',
        'national_security_number' => 'required|digits:14|unique:student_admission,national_security_number',
        'mobile_number' => 'required|digits:11|unique:student_admission,mobile_number',
        'student_address' => 'required|string|max:100',
        'email_address' => 'required|string|max:100|email|unique:student_admission,email_address',
        
        'religion_id' => 'required|numeric',
        'gender_id' => 'required|numeric',
        'nationality_id' => 'required|numeric',
        'governorate_id' => 'required|numeric',
        'home_phone_number' => 'required|digits:10',
        
        'military_status_id' => 'required|numeric',
        'admission_status_id' => 'required|numeric',
        'admission_study_status_id' => 'required|numeric',

        'semester_id' => 'required|numeric',
        'academic_year_id' => 'required|numeric',
        'number_of_additional_courses' => 'numeric|max:5'
        // 'medical_investigation_report' => 'required|alpha_num|max:1000',
        // 'medical_investigation_result' => 'required|alpha_num|max:20',
    ];

	#---------------- Relation Ships ------------------------------------#
	public function religion()
	{
		return $this->belongsTo('App\Models\Religion');
	}

	public function gender()
	{
		return $this->belongsTo('App\Models\Gender');
	}

	public function nationality()
	{
		return $this->belongsTo('App\Models\Nationality');
	}

	public function governorate()
	{
		return $this->belongsTo('App\Models\Governorate');
	}

	public function military_status()
	{
		return $this->belongsTo('App\Models\MilitaryStatus');
	}

	public function Admission_status()
	{
		return $this->belongsTo('App\Models\AdmissionStatus');
	}

	public function admission_study_status()
	{
		return $this->belongsTo('App\Models\AdmissionStudyStatus');
	}

	public function semester()
	{
		return $this->belongsTo('App\Models\Semester');
	}

	public function academic_year()
	{
		return $this->belongsTo('App\Models\AcademicYear');
	}

	public function military_data()
    {
        return $this->hasOne('App\Models\MilitaryData');
    }
}
