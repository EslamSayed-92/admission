@extends('layout')


@section('title')
    {{ $title }}
@endsection

@section('content')
<div class="container">
	<h1 class="title m-b-md">
           {{ $title }}
    </h1>
	{!! Form::open(['url' => $update_url, 'method' => 'put']) !!}

	{!! Form::token() !!}

	<div class='form-group row center-block'>
      @include('partials.errors')
    </div>

    <div class='form-group row'>
		{!! Form::Label( 'military_number', trans('MilitaryData.number'), ['class'=>'col-sm-3 col-form-label']) !!}
	    <div class='col-sm-9'>
	    	{!! Form::number('military_number',$student_military_data['military_number'] ,['class'=>'form-control']); !!}
	    </div>
    </div>

    <div class='form-group row'>
	    {!! Form::Label('military_area_id', trans('MilitaryData.area'), ['class'=>'col-sm-3 col-form-label']) !!}
	    <div class='col-sm-9'>
	    {!! Form::select('military_area_id',$military_areas,$student_military_data['military_area_id'] ,['placeholder' => 'select...','class'=>'form-control']); !!}
	    </div>
    </div>

    <div class='form-group row'>
	    {!! Form::Label('military_delay', trans('MilitaryData.available'), ['class'=>'col-sm-3 col-form-label']) !!}
	    <div class='col-sm-9'>
	    	<div class="form-check form-check-inline">
	    		@if($student_military_data['military_delay']=='yes')
	    		<input class="form-check-input military-delay" type="radio" name="military_delay" checked value="yes">
	    		@else
	    		<input class="form-check-input military-delay" type="radio" name="military_delay" value="yes">
	    		@endif
	    		{!! Form::Label('military_delay', trans('MilitaryData.yes'), ['class'=>'form-check-label']) !!}
			</div>
			<div class="form-check form-check-inline">
			 	@if($student_military_data['military_delay']=='no')
	    		<input class="form-check-input military-delay" type="radio" name="military_delay" checked value="no">
	    		@else
	    		<input class="form-check-input military-delay" type="radio" name="military_delay" value="no">
	    		@endif
	    		{!! Form::Label('military_delay', trans('MilitaryData.no'), ['class'=>'form-check-label']) !!}
			</div>
	    </div>
    </div>

    @if($student_military_data['military_delay']=='yes')
    	<div class='form-group row'>
			{!! Form::Label('military_delay_number', trans('MilitaryData.delay_number') , ['class'=>'col-sm-3 col-form-label']) !!}
			<div class='col-sm-9'>
			{!! Form::number('military_delay_number',$student_military_data['military_delay_number'] ,['class'=>'form-control','autocomplete'=>'off']); !!}	
			</div>
		</div>
		<div class='form-group row'>
			{!! Form::Label('military_delay_date', trans('MilitaryData.delay_date') , ['class'=>'col-sm-3 col-form-label']) !!}
			<div class='col-sm-9'>
				{!! Form::text('military_delay_date',
				$student_military_data['military_delay_date'],
				['class'=>'form-control datepicker','autocomplete'=>'off']); !!}
			</div>
		</div>
    @endif

	<div class='form-group row center-block'>
		<div class='col-md-4'></div>
		<div class='col-md-7'>
			{!! Form::submit(trans('generic.save'),['class'=>'btn btn-primary col-md-4 center-block']) !!}
			<a class="btn btn-secondary col-md-2 center-block" href="{{ $back }}">{{ trans('generic.cancel') }}</a>
		</div>
	</div>
{!! Form::close() !!}
</div>
@endsection