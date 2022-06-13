<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Pisos</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/home">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/usuarios">Usuarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/roles">Roles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/pisos">Pisos</a>
            </li>
            @if(\Illuminate\Support\Facades\Auth::user())
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown"
                       class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <img alt="image" src="{{ asset('img/logo.jpg') }}"
                             class="rounded-circle mr-1 thumbnail-rounded user-thumbnail ">
                        <div class="d-sm-none d-lg-inline-block">
                            ¡Hola! {{\Illuminate\Support\Facades\Auth::user()->first_name}}</div>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-title">
                            Bienvenido, {{\Illuminate\Support\Facades\Auth::user()->name}}</div>
                        <a class="dropdown-item has-icon edit-profile" href="#" data-id="{{ \Auth::id() }}">
                            <i class="fa fa-user"></i>Editar Perfil de Usuario</a>
                        <a class="dropdown-item has-icon" data-toggle="modal" data-target="#changePasswordModal" href="#" data-id="{{ \Auth::id() }}"><i
                                class="fa fa-lock"> </i>Cambiar Password</a>
                        <a href="{{ url('logout') }}" class="dropdown-item has-icon text-danger"
                           onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            @else
                <li class="dropdown"><a href="#" data-toggle="dropdown"
                                        class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        {{--                <img alt="image" src="#" class="rounded-circle mr-1">--}}
                        <div class="d-sm-none d-lg-inline-block">{{ __('messages.common.hello') }}</div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-title">{{ __('messages.common.login') }}
                            / {{ __('messages.common.register') }}</div>
                        <a href="{{ route('login') }}" class="dropdown-item has-icon">
                            <i class="fas fa-sign-in-alt"></i> {{ __('messages.common.login') }}
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('register') }}" class="dropdown-item has-icon">
                            <i class="fas fa-user-plus"></i> {{ __('messages.common.register') }}
                        </a>
                    </div>
                </li>
            @endif
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
