@extends('layout')


@section('title')
    {{ trans( trim($create_url,'/').".title" ) }}
@endsection

@section('content')
	<div class="container mt-5">

        @foreach ($data as $key => $val)
		<div class="row">
			<div class="col-sm-5 font-weight-bold">
			{{ trans( trim($create_url,'/').".".$key ) }} :
			</div>
			<div class="col-sm-7">{{ $val }}</div>
		</div> 
		@endforeach
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-7 text-center">
				<a class="btn btn-primary" href="{{ $create_url }}/{{ reset($data) }}/edit">
				{{ trans( trim($create_url,'/').".edit" ) }}</a>
				<a class="btn btn-danger" data-method="delete" data-token="<?php echo csrf_token();?>"
				 href="{{ $create_url }}/{{ reset($data) }}" data-confirm="Are you sure you want to delete this item ?">{{ trans( trim($create_url,'/').".delete" ) }}</a>
				<a class="btn btn-success" href="{{ $create_url }}">{{ trans("generic.list" ) }} {{ trans( trim($create_url,'/').".title" ) }}</a>
			</div>
			<div class="col-sm-2"></div>
			
		</div>
	</div>

@endsection