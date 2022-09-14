<div class="sidebar" data-color="purple" data-background-color="white" data-image="">
    <div class="logo">
        <a href="#" class="simple-text logo-normal">
            Mansoura Shop
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{ Request::is('dashboard') ? "active" :"" }}">
                {{-- nav-item active --}}
                <a class="nav-link" href="{{ route('admin.dashboard')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            {{-- ELELMENT 2  --}}
            <li class="nav-item {{ Request::is('categories') ? "active" :"" }}">
                <a class="nav-link" href="{{ route('categories.index')}}">
                    <i class="material-icons">add_circle</i>
                    <p>Categories</p>
                </a>
            </li>
            {{-- Element 3  --}}
            <li class="nav-item {{ Request::is('products') ? "active" :"" }}">
                <a class="nav-link" href="{{ route('products.index')}}">
                    <i class="material-icons">favorite</i>
                    <p>Products</p>
                </a>
            </li>
        </ul>
    </div>
</div>
