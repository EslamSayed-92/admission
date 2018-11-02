@extends('layout')


@section('title')
    {{ trans( "$model.title" ) }}
@endsection

@section('content')
	<div class="container">
        <h1 class="title m-b-md">
            {{  trans( "$model.edit" )}}
        </h1>
		
		{!! Form::open(['url' => "$edit_url", 'method' => 'put']) !!}

		{!! Form::token() !!}

		<div class="form-group row center-block">
	      @include('partials.errors')
	    </div>

		@foreach ($data as $key => $val)

		    @if ($val['type'] === 'string')
		    	<div class="form-group row">
		    		{!! Form::Label($key, trans( "$model.$key" ), ['class'=>'col-sm-3 col-form-label']) !!}
				    <div class="col-sm-9">
				    	{!! Form::text($key,$val['value'],['class'=>'form-control','autocomplete'=>'off']); !!}
				    </div>
			    </div>

			@elseif( $val['type'] == 'date')
				<div class="form-group row">
		    		{!! Form::Label($key, trans( "$model.$key" ),['class'=>'col-sm-3 col-form-label']) !!}
				    <div class="col-sm-9">
				    	{!! Form::text($key, $val['value'], ['class' => 'datepicker form-control','autocomplete'=>'off']); !!}
				    </div>
				</div>
		    

		    @elseif( $val['type'] == 'int' || $val['type'] == 'float' || $val['type'] == 'double') 
		    	<div class="form-group row">
				    {!! Form::Label($key, trans( trim($model,'/').".".$key ), ['class'=>'col-sm-3 col-form-label', 'step'=>'any' ]) !!}
				    <div class="col-sm-9">
				    	{!! Form::number($key,$val['value'],['class'=>'form-control','autocomplete'=>'off']); !!}
				    </div>
			    </div>

			@elseif(is_array($val['type']))
				<div class="form-group row">
				    {!! Form::Label($key, trans( "$model.$key" ), ['class'=>'col-sm-3 col-form-label']) !!}
				    <div class="col-sm-9">
				    {!! Form::select($key,$val['type'], $val['value'],['placeholder' => 'select...','class'=>'form-control']); !!}
				    </div>
			    </div>

		    @endif

		@endforeach
 
		<div class="form-group row center-block">
			<div class="col-md-4"></div>
			<div class="col-md-7">
				{!! Form::submit(trans("generic.save"),['class'=>'btn btn-primary col-md-4 center-block']) !!}

				<a class="btn btn-secondary ml-2" href="{{ $back }}">{{ trans("generic.cancel") }}</a>
			</div>
		</div>

		{!! Form::close() !!}
		
		
	</div>

@endsection