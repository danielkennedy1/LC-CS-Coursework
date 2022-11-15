<nav class="navbar navbar-expand-sm navbar-light glass" style="z-index:1">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand"> <img src="/apple-icon.png" alt="logo" style="height:1em;vertical-align:baseline"> ClisTeach </a>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item" id="nav-home">
                <a class="nav-link" href="{{ route("home") }}">Home</a>
            </li>
            <li class="nav-item" id="nav-about">
                <a class="nav-link" href="{{ route("about") }}">About us</a>
            </li>
            <li class="nav-item dropdown">
                <a  class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Products</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a href="/product" class="dropdown-item" id="nav-products">All products</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/product/1" id="nav-product1">Product 1</a>
                    <a class="dropdown-item" href="/product/2" id="nav-product2">Product 2</a>
                    <a class="dropdown-item" href="/product/3" id="nav-product3">Product 3</a>
                </div>
            </li>
            <li class="nav-item" id="nav-mission">
                <a class="nav-link" href="{{ route("mission") }}">Our Mission</a>
            </li>
        </ul>
        <!-- https://stackoverflow.com/questions/60661708/bootstrap-laravel-system-trying-to-align-a-menu-item-right -->
        <ul class="navbar-nav ms-auto">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>
<script>
    //Sets the current location's link to active
    document.getElementById("nav-{{ Route::currentRouteName() }}{{ $id ?? NULL}}").classList.add("active");
    if("{{ Route::currentRouteName() }}".includes("product")){
        document.getElementById("dropdownId").classList.add("active");  
    }
</script>
<!--  
 <span class="sr-only">(current)</span>
-->