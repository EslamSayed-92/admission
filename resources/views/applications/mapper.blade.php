@extends('layout')


@section('title')
    {{ trans('StudentAdmission.mapper') }}
@endsection

@section('content')
	<div class="row" style="margin-top: 1%">
		<h3>{{ trans('StudentAdmission.mapper_instruction') }}</h3>
		<br/>

		{!! Form::open(['url' => "$upload_url", 'method' => 'post', 'class' => 'col-sm-5']) !!}
		<h3><u>Database Fields</u></h3>

		{!! Form::token() !!}
			@foreach ($fields as $key => $val)

				<div class="form-group">
				{!! Form::Label($key, trans('StudentAdmission.'.$key), ['class'=>'col-sm-5 col-form-label']) !!}

				{!! Form::text($key,'',['class'=>'form-control col-sm-6', 'style'=>'display:inline',
				'ondrop'=>'drop(event)', 'ondragover'=>'allowDrop(event)']); !!}
				</div>

			@endforeach

			<div class="form-group row center-block">
				<div class="col-md-4"></div>
				<div class="col-md-7">
					{!! Form::submit({{ trans('StudentAdmission.save') }}, ['class'=>'btn btn-primary col-md-4 center-block']) !!}
					<input type="button" class="btn btn-secondary col-md-4 center-block" value="{{ trans('StudentAdmission.cancel') }}" onclick="window.history.back()">
				</div>
			</div>

		{!! Form::close() !!}

		<div class="col-sm-5" id="headers">
			<h3><u>Excel Sheet Headers</u></h3>
			<table class="table table-bordered table-hover">
			@foreach ($headers as $header)
				<tr ondrop="drop(event)" ondragover="allowDrop(event)">
					<th scope="col" draggable="true" ondragstart="drag(event)">{{ $header }}</th>
				</tr>
			@endforeach
			</table>
		</div>
	</div>

	<script>
		window.onscroll = function() {StickyHeaders()};

		// Get the header
		var headers = document.getElementById("headers");

		// Get the offset position of the navbar
		var sticky = headers.offsetTop;

		// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
		function StickyHeaders() {
		  if (window.pageYOffset > sticky) {
		    headers.classList.add("sticky");
		  } else {
		    headers.classList.remove("sticky");
		  }
		}


		var data;
		var td;
		function allowDrop(ev) {
		    ev.preventDefault();
		}

		function drag(ev) {
			data = ev.target.textContent;
			td = ev.target;
		}

		function drop(ev) {
		    ev.preventDefault();
		    ev.target.value = data;
		    td.classList.add("alert-success")
		}
	</script>
@endsection