<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\StudentAdmission;
use carbon\Carbon ;


class PaymentController extends GenericController
{
    
	public function __construct()
    {
        $this->create_url = "/Payment";
        $this->model = $this->model.'\Payment';
        $this->model_name = 'Payment';
        $this->temp = new $this->model;
        $this->title = 'Payments';
        $this->model_title = 'Payment';
    }

    public function fees_check($id)
    {
        $student_admission_fees = Payment::where('student_admission_id','=',$id)->get()->toArray();

        if(count($student_admission_fees) > 0){
            $student_admission_fees = $this->replace_id_by_name($student_admission_fees[0]);
            unset($student_admission_fees['student_admission_id']);
            // dd($student_admission_fees);
            return response()->json(['title'=>trans('Payment.student_admission_fees'),'complete'=>1,'message'=>trans('Payment.paid_message'),'data'=>$student_admission_fees]);
        }else
            return response()->json(['title'=>trans('Payment.student_admission_fees'),'complete'=>0,'message'=>trans('Payment.notpaid_message')]);
    }

    public function student_admission_fees($id)
    {
        $temp = new Payment;
        $create_url = str_replace(__FUNCTION__, "store_student_fees", url()->current());
        $back = substr(url()->current(), 0,strrpos(url()->current(), '/'));

        return view('lookups.create', [trans('Payment.student_admission_fees'),
                                        'data'=>$temp->get_properities(),'payment'=>false,
                                        'create_url'=>$create_url, 'model'=>$this->model_name,
                                        'back'=>$back ]);
    }

    public function store_student_fees($id, Request $request)
    {
        $back = substr(url()->current(), 0,strrpos(url()->current(), '/', -5));

        $student_payment = new Payment;
        $student_admission = StudentAdmission::find($id)->toArray();
        // $validator = Validator::make($request->all(),$new->rules);
        if ($student_payment->validate($request->all())) {
            $data = $student_payment->get_properities();
            foreach($data as $k => $v){
                if($v === 'date'){
                    $student_payment[$k] = Carbon::createFromFormat('d-m-Y', request($k));
                }else{
                    $student_payment[$k] = request($k) ;
                }
            }

            $student_payment['student_admission_id'] = $id;
            $student_payment['academic_year_id'] = $student_admission['academic_year_id'];
            $student_payment['semester_id'] = $student_admission['semester_id'];


            if($student_payment->save()){
                try {
                    $student_code = StudentAcademicRecordController::create_student_code($id);
                    StudentController::create_student($student_code, $id);
                    return redirect($back)->with('student_code',$student_code);
                } catch (Exception $e) {
                    return redirect($back)->withErrors([$e]);
                }
            }else
                return redirect()->back()->withInput()->withErrors(['Student Payment was not saved']);
            
        }else{
            return redirect()->back()->withInput()->withErrors($student_payment->errors());
        }   
    }

    public function edit_student_fees($id)
    {
        $student_payment = Payment::where('student_admission_id','=',$id)->first();
        $student_payment = $student_payment->get_values_and_types(0,$student_payment);
        // dd($student_payment);

        $edit_url = str_replace('edit', 'update', url()->current());
        $back =  substr(url()->current(), 0,strrpos(url()->current(), '/', -5));
        return view('lookups.edit', ['title'=>'Student Admission Fees',
                                        'data'=>$student_payment,'payment'=>true,
                                        'edit_url'=>$edit_url, 'model'=>$this->model_name,
                                        'back'=>$back ]);
    }

    public function update_student_fees($id, Request $request)
    {
        $student_payment = Payment::where('student_admission_id','=',$id)->first();

		$this->FixUniqueFields($student_payment,$id,"student_admission_id");       
        // dd($student_payment->rules);

        if ($student_payment->validate($request->all())) {
            $data = $student_payment->get_properities();
            foreach($data as $k => $v){
                if($v === 'date'){
                    $student_payment[$k] = Carbon::createFromFormat('d-m-Y', request($k));
                }else{
                    $student_payment[$k] = request($k) ;
                }
            }

            $student_payment['student_admission_id'] = $id;
            // dd($student_payment);
            Payment::where('student_admission_id',$id)->update($student_payment->toArray());
            $back = substr(url()->current(), 0,strrpos(url()->current(), '/', -5));
            return redirect($back);
        }else{
            // dd($new->errors());
            return redirect()->back()->withInput()->withErrors($student_payment->errors());
        }   
    }

}
