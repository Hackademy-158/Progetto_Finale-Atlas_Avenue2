<div class="lang-dropdown">
    <button class="nav-link dropdown-toggle d-flex align-items-center lang-menu" type="button" id="languageDropdown" data-bs-toggle="dropdown">
        <img src="{{ asset('vendor/blade-flags/language-' . app()->getLocale() . '.svg') }}" width="24" height="24" alt="{{ app()->getLocale() }}" class="me-2">
        {{ strtoupper(app()->getLocale()) }}
    </button>
    <ul class="dropdown-menu dropdown-menu-end">
        @foreach(['it', 'en', 'de'] as $locale)
            @if($locale !== app()->getLocale())
                <li>
                    <a href="{{ route('setLocale', $locale) }}" class="dropdown-item d-flex align-items-center">
                        <img src="{{ asset('vendor/blade-flags/language-' . $locale . '.svg') }}" width="24" height="24" alt="{{ $locale }}" class="me-2">
                        {{ strtoupper($locale) }}
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
</div>
