@extends('layout')


@section('title')
    {{ __('welcome.admission') }}
@endsection

@section('content')
    <div class="container full-height flex-center">
        <h1 class="title m-b-md">
            {{ __('welcome.admission') }}
        </h1>

        <div class="links">
            <a href="/StudentAdmission/create">{{ __('welcome.new') }}</a>
            <a href="/StudentAdmission">{{ __('welcome.all') }}</a>
            <a href="/excel">{{ __('welcome.upload') }}</a>
        </div>
    </div>

@endsection
