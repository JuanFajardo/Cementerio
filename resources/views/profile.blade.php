        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
               {{\Auth::user()->email}} -  {{\Auth::user()->grupo}}
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">

              <a class="dropdown-item" href="{{ url('/clave')}}">
                <i class="ti-settings text-primary"></i>
                Cambiar Clave
              </a>

              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="ti-power-off text-primary"></i>
                Cerrar Session
              </a>

            </div>
          </li>
        </ul>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
          {{ csrf_field() }}
        </form>
