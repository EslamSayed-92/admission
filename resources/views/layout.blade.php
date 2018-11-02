<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href=" https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}"> -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/collapsable.css') }}">
        <style type="text/css">
          li.nav-item{border-{{ trans('generic.float') }}: solid 1px rgba(255,255,255,.5);}
        </style>
    </head>
<body>
  <div class="container-fluid">
    <div class="row d-flex d-md-block flex-nowrap wrapper">
        @include('partials.sidebar')

        <main class="col-md-9 float-{{ trans('generic.float') }} col main" dir="{{ trans('generic.direction') }}">
            @include('partials.nav')
            <div class="row px-2 pl-1 pt-2">
                @yield('content')
            </div>

            <div class="row">
              @include('partials.footer')
            </div>
        </main>

    </div>
  </div>

  @include('partials.scripts')
 
    <script type="text/javascript">
      function activate_datepicker()
      {
        $( ".datepicker" ).datepicker({
          format: 'dd-mm-yyyy',
          changeMonth: true,
          changeYear: true
        });
        $('.datepicker').on('dp.change', function(event) {
          event.date.format('dd-mm-yyyy')
        });

      }

      $(function() {activate_datepicker();});
      window.locale = "{!! App::getLocale(); !!}";

    </script>

</body>
</html>