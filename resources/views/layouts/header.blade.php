<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a href="#" data-toggle="dropdown" aria-expanded="false" class="btn btn-block btn-sm btn-outline-secondary">
                <i class="fas fa-user"> {{ auth()->user()->name }}</i>
            </a>

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                <div class="card card-widget widget-user">
                    <div class="widget-user-header text-white" style="background: url('img/Logo.png') center;">
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle" src="{{ asset('img/undraw_profile_2.svg') }}"
                            alt="User Avatar">
                    </div>
                </div>

                <div class="card-footer">
                    <br>
                    <h3 class="widget-user-username text-center">{{ auth()->user()->name }}</h3>
                    <h6 class="widget-user-desc text-center">{{ auth()->user()->email }}</h6>
                    <br>

                    <div class="row">

                        <div class="col-sm-6"">
                      <a href="{{ route('user.profil') }}" class="btn btn-sm bg-gradient-info float-left">
                            <i class="fas fa-user"> Profile</i>
                            </a>
                        </div>

                        <div class="col-sm-6">
                            <a class="btn btn-sm bg-gradient-secondary float-right" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt">
                                    {{ __('Logout') }}
                                </i>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    </ul>

    <!-- Fullscreen -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>

</nav>