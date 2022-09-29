<div class="sidebar" data-color="green" data-background-color="white" data-image="">
    <div class="logo">
        <a href="{{ route('store.index') }}" class="simple-text logo-normal">
            Dokkan ElMansoura
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{ Request::is('merchant/home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dealer.panel.view.checked.orders') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Checked Orders</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('merchant/products') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dealer.panel.view.prepared.orders') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Prepared Orders</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('merchant/product/create/new') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dealer.panel.view.done.orders') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Done Orders</p>
                </a>
            </li>
        </ul>
    </div>
</div>
