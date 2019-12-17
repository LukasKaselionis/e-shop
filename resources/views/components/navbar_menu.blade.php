<nav class="navbar-menu navbar-expand-md navbar-light bg-white shadow-sm" onscroll="showNavigationMenu()">
    <div class="container">
        <!-- Left Side of Navbar -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <a class="nav-link" href="{{ url('/') }}">
                <i class="icon home material-icons">
                    home
                </i>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Right Side Of Navbar -->
            <ul class="navigation navbar-nav ml-auto">
                <!-- Authentication Links -->
                <li class="nav-item-count">
                    <a class="nav-link" href="{{ route('cart') }}">
                        <i class="icon material-icons">shopping_cart</i>
                        <span class="cart-qty">
                                @if(!empty(session()->get('cart'))) {{ count(session()->get('cart')) }} items @else
                                Cart @endif
                            </span>
                    </a>
                </li>
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
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<script>

</script>