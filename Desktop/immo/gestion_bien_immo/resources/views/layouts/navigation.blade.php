<!-- Logo -->
<a class="navbar-brand" href="{{ route('dashboard') }}">
    <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
</a>

<!-- Hamburger -->
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>


<ul class="navbar-nav">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="dropdown-item">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </li>
</ul>


</div>
