<!-- Header Navigation -->
<header>
    @push('styles')
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('js/header.js') }}" defer></script>
@endpush

<nav class="navbar">
        <div class="logo">
            <a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt="Logo"></a>
        </div>
        <ul class="nav-menu">
            <li class="nav-item"><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
            <li class="nav-item"><a href="{{ route('dataset-page') }}" class="{{ request()->routeIs('dataset-page') ? 'active' : '' }}">DataSet</a></li>
            <li class="nav-item"><a href="{{ route('artikel-page') }}" class="{{ request()->routeIs('artikel-page') ? 'active' : '' }}">Artikel</a></li>
            <li class="nav-item"><a href="#" class="{{ request()->routeIs('tentang') ? 'active' : '' }}">Tentang</a></li>
            <li class="nav-item"><a href="https://data.pesawarankab.go.id/dokumen_sk/SK%20Forum%20SDI.pdf" target="_blank" class="{{ request()->routeIs('kebijakan') ? 'active' : '' }}">Kebijakan</a></li>
        </ul>
        <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </nav>
</header>