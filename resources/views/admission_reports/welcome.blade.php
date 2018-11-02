@extends('layout')


@section('title')
    {{ $title }}
@endsection

@section('content')
<div class="container flex-center">
	<h1 class="font-weight-bold text-primary">{{ $header }}</h1>

	<div class="row">
		<div class="col-sm-3 rounded border border-dark shadow p-3 mb-5 bg-white rounded flex-center">
			<h3 class="font-weight-bold text-info" >Military Reports</h3>
			<ul class="flex-center">
				<li><a href="{{ url()->current() }}/MilitaryDelays">Military Delays</a></li>
			</ul>
		</div>
		<div class="col-sm-3 rounded border border-dark shadow p-3 mb-5 bg-white rounded flex-center ml-3">
			<h3 class="font-weight-bold text-info">Admission Reports</h3>
		</div>
		<div class="col-sm-3 rounded border border-dark shadow p-3 mb-5 bg-white rounded flex-center ml-3">
			<h3 class="font-weight-bold text-info">Other Reports</h3>
		</div>
	</div>
</div>
@endsection