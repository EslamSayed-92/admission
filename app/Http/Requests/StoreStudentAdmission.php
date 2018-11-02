<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentAdmission extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'student_first_name' => 'required',
            'student_middle_name' => 'required',
            'student_last_name' => 'required',
            'birth_date' => 'required',
            'national_security_number' => 'required',
            'mobile_number' => 'required',
            'student_address' => 'required',
            'email_address' => 'required',
            'medical_investigation_report' => 'required',
            'medical_investigation_result' => 'required',
            //'number_of_additional_courses'
            'religion_id' => 'required',
            'gender_id' => 'required',
            'nationality_id' => 'required',
            'governorate_id' => 'required',
            'home_phone_number' => 'required',
            //'student_picture' => 'boolean',
            //'medical_investigation_result' => 'bool',
            'military_status_id' => 'required',
            'admission_status_id' => 'required',
            'admission_study_status_id' => 'required',
            'semester_id' => 'required',
            'academic_year_id' => 'required',
            'number_of_additional_courses' => 'required'
        ];

    }
}
