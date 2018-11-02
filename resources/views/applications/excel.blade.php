@extends('layout')


@section('title')
    {{ trans('StudentAdmission.excel') }}
@endsection

@section('content')
<!-- 
<body>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
 
    <!-- Styles 
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
            padding: 5%
        }
    </style> -->
    <div class="container">
        <h2 class="title m-b-md text-center">
            {{ trans('StudentAdmission.import') }}
        </h2>
 
        @if ( Session::has('success') )
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>{{ Session::get('success') }}</strong>
        </div>
        @endif
     
        @if ( Session::has('error') )
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>{{ Session::get('error') }}</strong>
        </div>
        @endif
     
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <div>
                @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
        </div>
        @endif
     
    <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ trans('StudentAdmission.upload') }} : <input type="file" name="file" class="form-control">
     
        <input type="submit" value="{{ trans('StudentAdmission.save') }}" class="btn btn-primary btn-lg" style="margin-top: 3%">
    </form>
     
    </div>
@endsection