<div id="app">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                
    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('storage/logo.png') }}" width="150" class="d-inline-block align-top" alt="logo solo notebook">
    </a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor02">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav mr-auto">
          <li class="nav-item">
          <a class="nav-link" href="{{ route('inicio') }}">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ route('productos') }}">Productos</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ route('categorias') }}">Categorias</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ route('marcas') }}">Marcas</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ route('carrito') }}"><i class="fa fa-shopping-cart"></i>Carrito</a>
          </li>
      </ul>
        
      <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search">
          <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
    

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
          @endif
        @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
        
        @endguest
      
      </ul>
    </div>
                
  </nav>
</div>
        