@extends('layout')


@section('title')
    {{ trans('StudentAdmission.title') }}	
@endsection

@section('content')
	<div class="container">

        <div class="row">
	        <div class="col-md-10">
	        	{!! AddCode($data) !!}
		        @foreach ($data as $key => $val)
				<div class="row">
					<div class="col-sm-5 font-weight-bold">
					{{ trans('StudentAdmission.'.$key) }} :
					</div>
					<div class="col-sm-6">{{ $val }}</div>
				</div> 
				@endforeach
			</div>
			<div class="col-md-2 text-center">
				<input type="button" value="{{ trans('StudentAdmission.documents') }}" id="doc_check_list" class="btn btn-primary mb-1" data-toggle="modal" data-target="#exampleModal">

				<input type="button" value="{{ trans('StudentAdmission.military_data') }}" id="military-data" class="btn btn-primary mb-1" data-toggle="modal" data-target="#exampleModal">

				<!-- <a class="btn btn-primary mb-1" href="">Admission Fees</a> -->
				<input type="button" value="{{ trans('StudentAdmission.admission_fees') }}" id="admission-fees" class="btn btn-primary mb-1" data-toggle="modal" data-target="#exampleModal">

				@if($data['student_code'] !== null)
					<input type="button" value="{{ trans('StudentAdmission.add_academic_data') }}" id="edit_acad_record" class="btn btn-success mb-1" data-toggle="modal" data-target="#exampleModal">
				@endif
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-7 text-center">
				<a class="btn btn-primary" href="{{ $create_url }}/{{ reset($data) }}/edit">{{ trans('StudentAdmission.edit') }}</a>
				<a class="btn btn-danger" data-method="delete" data-token="<?php echo csrf_token();?>"
				 href="{{ $create_url }}/{{ reset($data) }}" data-confirm="Are you sure you want to delete this item ?">{{ trans('StudentAdmission.delete') }}</a>
				<a class="btn btn-success" href="{{ $create_url }}">{{ trans('generic.list') }} {{ trans('StudentAdmission.title') }}</a>
			</div>
			<div class="col-sm-2"></div>
			
		</div>

		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel"></h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		          <input type="hidden" value="<?php echo csrf_token();?>" name="_token">
		        </button>
		      </div>	
		      <div class="modal-body">
		        
		      </div>

		    </div>
		  </div>
		</div>
	</div>

@endsection