@extends('layout')


@section('title')
    {{ $title }}
@endsection

@section('content')
<div class="container flex-center">
	<h1 class="font-weight-bold text-primary">{{ $title }}</h1>
	{!! CreateTable($data) !!}
</div>
@endsection