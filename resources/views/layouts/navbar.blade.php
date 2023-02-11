<nav class="navbar bg-body-tertiary mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="@yield('navbar_title_target')">@yield('navbar_title')</a>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                {{config('app.app_locales')[app()->getLocale()]}}
            </button>
            <ul class="dropdown-menu">
                @foreach (config('app.app_locales') as $code => $name)
                    <li><a class="dropdown-item" href="{{ route('language.index', ['locale' => $code]) }}">{{ $name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
