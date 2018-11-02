<div class="page-header">
  <nav class="navbar navbar-expand-lg navbar-dark flex-column flex-md-row bd-navbar">
      <a href="#" data-target="#sidebar" data-toggle="collapse"><i class="fa fa-navicon fa-2x py-2 p-1"></i></a>

      <!-- Links  -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <!-- Brand  -->
          <a class="nav-link" href="/">{{ trans('navbar.home') }}</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/StudentAdmission/create">{{ trans('navbar.new') }}</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/StudentAdmission">{{ trans('navbar.all') }}</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/excel">{{ trans('navbar.upload') }}</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/AdmissionReports">{{ trans('navbar.reports') }}</a>
        </li>

        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ trans('navbar.lang') }}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item change-lang" value="{{ trans('navbar.en') }}">{{ trans('navbar.english') }}</a>
          <a class="dropdown-item change-lang" value="{{ trans('navbar.ar') }}">{{ trans('navbar.arabic') }}</a>
        </div>
      </li>

        @if (Route::has('login'))
        <li class="nav-item">
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">{{ trans('navbar.home') }}</a>
                @else
                    <a href="{{ route('login') }}">{{ trans('navbar.login') }}</a>
                    <a href="{{ route('register') }}">{{ trans('navbar.register') }}</a>
                @endauth
            </div>
        </li>
        @endif
      </ul>
  </nav>
</div>

