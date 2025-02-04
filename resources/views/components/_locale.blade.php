<div class="lang-dropdown">
    <button class="nav-link dropdown-toggle d-flex align-items-center lang-menu" type="button" id="languageDropdown" data-bs-toggle="dropdown">
        <img src="{{ asset('vendor/blade-flags/language-' . app()->getLocale() . '.svg') }}" width="24" height="24" alt="{{ app()->getLocale() }}" class="me-2">
    </button>
    <ul class="dropdown-menu dropdown-menu-end">
        <li>
            <a href="{{ route('setLocale', 'en') }}" class="dropdown-item d-flex align-items-center">
                <img src="{{ asset('vendor/blade-flags/language-en.svg') }}" width="24" height="24" alt="en" class="me-2">
            </a>
        </li>
        <li>
            <a href="{{ route('setLocale', 'de') }}" class="dropdown-item d-flex align-items-center">
                <img src="{{ asset('vendor/blade-flags/language-de.svg') }}" width="24" height="24" alt="de" class="me-2">
            </a>
        </li>
    </ul>
</div>
