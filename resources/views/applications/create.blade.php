@extends('layout')


@section('title')
    {{ $title }}
@endsection

@section('content')
  <div class="container">
        <!-- <h1 class="title m-b-md">
            {{ $title }}
        </h1> -->
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="name-tab" data-toggle="tab" href="#name" role="tab" aria-controls="personal" aria-selected="true">{{ trans('StudentAdmission.name') }}</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="birth-tab" data-toggle="tab" href="#birth" role="tab" aria-controls="birth" aria-selected="false">{{ trans('StudentAdmission.birth') }}</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">{{ trans('StudentAdmission.contact') }}</a>
    </li>
    <li class="nav-item">
      <a class="nav-link id="extra-tab" data-toggle="tab" href="#extra" role="tab" aria-controls="extra" aria-selected="false">{{ trans('StudentAdmission.extra') }}</a>
    </li>
    <li class="nav-item">
      <a class="nav-link id="new-admission-tab" data-toggle="tab" href="#new-admission" role="tab" aria-controls="new-admission" aria-selected="false">{{ trans('StudentAdmission.admission') }}</a>
    </li>
  </ul>

  <!-- <div class="form-group row center-block">
        @include('partials.errors')
  </div> -->
  <div class="tab-content" id="myTabContent">

    <form action="{{ $create_url }}" method="post" autocomplete='off'>
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <div class="tab-pane fade show active" id="name" role="tabpanel" aria-labelledby="name-tab">
        <div class="mt-4">{!! MakeForm($data['name'], $errors) !!}</div>
        <a class="btn btn-primary continue float-sm-right">{{ trans('StudentAdmission.continue') }}</a>
      </div>
      <div class="tab-pane fade" id="birth" role="tabpanel" aria-labelledby="birth-tab">
        <div class="mt-4">{!! MakeForm($data['birth'], $errors) !!}</div>
        <a class="btn btn-primary continue float-sm-right">{{ trans('StudentAdmission.continue') }}</a>
      </div>
      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        <div class="mt-4">{!! MakeForm($data['contact'], $errors) !!}</div>
        <a class="btn btn-primary continue float-sm-right">{{ trans('StudentAdmission.continue') }}</a>
      </div>
      <div class="tab-pane fade" id="extra" role="tabpanel" aria-labelledby="extra-tab">
        <div class="mt-4">{!! MakeForm($data['extra'], $errors) !!}</div>
        <a class="btn btn-primary continue float-sm-right">{{ trans('StudentAdmission.continue') }}</a>
      </div>
      <div class="tab-pane fade" id="new-admission" role="tabpanel" aria-labelledby="new-admission-tab">
        <div class="mt-4">{!! MakeForm($data['academic'], $errors) !!}</div>
        <a class="btn btn-secondary ml-2 float-sm-right" href="{{ $create_url }}">{{ trans('StudentAdmission.cancel') }}</a>
        <input type="submit" value="{{ trans('StudentAdmission.save') }}" class="btn btn-primary continue float-sm-right">
      </div>

    </form>
  </div>

</div>

@endsection