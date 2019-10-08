<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item @yield('menu')">
      <a class="nav-link" href="{{ asset('/index.php') }}">
        <i class="ti-home menu-icon"></i>
        <span class="menu-title" accesskey="i"><u>I</u>nicio</span>
      </a>
    </li>

    @if( trim(\Auth::user()->grupo) == "Administrador" ||  trim(\Auth::user()->grupo) == "Encargado" )
    <li class="nav-item @yield('buscar')">
      <a class="nav-link" href="{{ asset('/index.php/Buscar') }}">
        <i class="ti-search menu-icon"></i>
        <span class="menu-title" accesskey="d"><u>B</u>uscar</span>
      </a>
    </li>

    <li class="nav-item @yield('difunto')">
      <a class="nav-link" href="{{ asset('/index.php/Difunto') }}">
        <i class="ti-heart-broken menu-icon"></i>
        <span class="menu-title" accesskey="d"><u>D</u>ifuntos</span>
      </a>
    </li>

    <li class="nav-item @yield('centro')">
      <a class="nav-link" href="{{ asset('/index.php/Reporte') }}">
        <i class="ti-bookmark-alt menu-icon"></i>
        <span class="menu-title" accesskey="r"><u>R</u>eporte</span>
      </a>
    </li>

    <li class="nav-item @yield('usuario')">
      <a class="nav-link" href="{{ asset('/index.php/Usuario') }}">
        <i class="ti-user menu-icon"></i>
        <span class="menu-title" accesskey="u"><u>U</u>suarios</span>
      </a>
    </li>
    @endif
  </ul>
</nav>
