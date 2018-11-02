@extends('layout')


@section('title')
    {{ trans( "$model.title" ) }}
@endsection

@section('content')
	<div class="container">
        <h1 class="title m-b-md">
            {{ trans( "$model.new" ) }}
        </h1>

		{!! Form::open(['url' => "$create_url", 'method' => 'post']) !!}

		{!! Form::token() !!}

		<div class="form-group row center-block" >
	      @include('partials.errors')
	    </div>

		@foreach ($data as $key => $val)

		    @if ($val === 'string')
		    	<div class="form-group row">
		    		{!! Form::Label($key, trans( "$model.$key" ), ['class'=>'col-sm-3 col-form-label']) !!}
				    <div class="col-sm-9">
				    	{!! Form::text($key,'',['class'=>'form-control','autocomplete'=>'off']); !!}
				    </div>
			    </div>

			@elseif( $val == 'date')
				<div class="form-group row">
		    		{!! Form::Label($key, trans( "$model.$key" ),['class'=>'col-sm-3 col-form-label']) !!}
				    <div class="col-sm-9">
				    	{!! Form::text($key, '', ['class' => 'datepicker form-control','autocomplete'=>'off']); !!}
				    </div>
				</div>
		    

		    @elseif( $val == 'int' || $val == 'float' || $val == 'double') 
		    	<div class="form-group row">
				    {!! Form::Label($key, trans( "$model.$key" ), ['class'=>'col-sm-3 col-form-label']) !!}
				    <div class="col-sm-9">
				    	{!! Form::number($key,'',['class'=>'form-control','step'=>'any','autocomplete'=>'off']); !!}
				    </div>
			    </div>

			@elseif(is_array($val))
				<div class="form-group row">
				    {!! Form::Label($key, trans( "$model.$key" ), ['class'=>'col-sm-3 col-form-label']) !!}
				    <div class="col-sm-9">
				    {!! Form::select($key,$val, null,['placeholder' => 'select...','class'=>'form-control']); !!}
				    </div>
			    </div>

		    @endif

		@endforeach
 
		<div class="form-group row center-block">
			<div class="col-md-4"></div>
			<div class="col-md-7">
				{!! Form::submit( trans("generic.save"),['class'=>'btn btn-primary col-md-4 center-block']) !!}

				<a class="btn btn-secondary ml-2" href="{{ $back }}">{{ trans("generic.cancel")  }}</a>
			</div>
		</div>
		{!! Form::close() !!}
		
		

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