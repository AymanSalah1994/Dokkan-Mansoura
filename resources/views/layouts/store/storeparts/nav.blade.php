<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('store.index') }}">
            <img src="{{ asset('images/logo.png') }}" width="45" height="45" alt="">
        </a>
        <a class="navbar-brand" href="{{ route('store.index') }}">{{ __('Dokkan ELMansoura') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">

                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="true">
                            {{ Auth::user()->first_name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('profile.view') }}">{{__('Profile')}}</a></li>
                            <li><a class="dropdown-item" href="{{ route('orders.all') }}">{{__('Orders')}}</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cart.view') }}">
                            {{__('Cart')}} <span class="badge badge-pill bg-danger cart_counter"></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('wish.list.view') }}">
                            {{__('Wish List')}} <span class="badge badge-pill bg-primary wish_list_counter"></span>
                        </a>
                    </li>
                @endauth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('store.categories') }}">{{__('Categories')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('merchants.all') }}">{{__('Merchants')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('store.search') }}">{{__('SEARCH')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('store.categories') }}">{{__('Services')}}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="true">
                        Lang/اللغة
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('set.locale', 'ar') }}">العربية</a></li>
                        <li><a class="dropdown-item" href="{{ route('set.locale', 'en') }}">English</a></li>
                    </ul>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('login') }}">{{__('Login')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('register') }}">{{__('Register')}}</a>
                    </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>
