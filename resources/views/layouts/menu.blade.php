<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('payments.stk_push_form') }}" class="nav-link {{ Request::is('stk_push_form') ? 'active' : '' }}">
    <i class="fas fa-money-bill-wave-alt"></i>
        <p>STK Push</p>
    </a>
</li>




