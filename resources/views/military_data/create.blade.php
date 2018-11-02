@extends('layout')


@section('title')
    {{ $title }}
@endsection

@section('content')
<div class="container">
	<h1 class="title m-b-md">
           {{ $title }}
    </h1>
	{!! Form::open(['url' => $add_url, 'method' => 'post']) !!}

	{!! Form::token() !!}

	<div class='form-group row center-block'>
      @include('partials.errors')
    </div>

    <div class='form-group row'>
		{!! Form::Label( 'military_number', trans('MilitaryData.number') , ['class'=>'col-sm-3 col-form-label']) !!}
	    <div class='col-sm-9'>
	    	{!! Form::number('military_number','',['class'=>'form-control']); !!}
	    </div>
    </div>

    <div class='form-group row'>
	    {!! Form::Label('military_area_id', trans('MilitaryData.area') , ['class'=>'col-sm-3 col-form-label']) !!}
	    <div class='col-sm-9'>
	    {!! Form::select('military_area_id',$data, null,['placeholder' => 'select...','class'=>'form-control']); !!}
	    </div>
    </div>

    <div class='form-group row'>
	    {!! Form::Label('military_delay', trans('MilitaryData.available'), ['class'=>'col-sm-3 col-form-label']) !!}
	    <div class='col-sm-9'>
	    	<div class="form-check form-check-inline">
	    		<input class="form-check-input military-delay" type="radio" name="military_delay" value="yes">
	    		{!! Form::Label('military_delay', trans('MilitaryData.yes'), ['class'=>'form-check-label']) !!}
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input military-delay" type="radio" name="military_delay" value="no">
	    		{!! Form::Label('military_delay', trans('MilitaryData.no'), ['class'=>'form-check-label']) !!}
			</div>
	    </div>
    </div>

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