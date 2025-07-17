<div>
    <!-- Include CSS and JS -->
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
    @endpush
    
    @push('scripts')
        <script src="{{ asset('js/homepage.js') }}" defer></script>
    @endpush

    <!-- Header Component -->
    <x-header />

    <!-- Hero Section -->
    <section id="home" class="hero-section">
    <div class="hero-container">
        <div class="hero-left">
            <div class="hero-content">
                <h1>OpenData Pesawaran</h1>
                <p>Platform yang menyediakan data terbuka terkait pengadaan barang dan jasa pemerintah dalam berbagai sektor seperti pendidikan, kesehatan, ekonomi, dan infrastruktur.</p>
                
                <div class="search-container" 
                     x-data="{}"
                     @click.away="$wire.hideSuggestions()">
                    <div class="search-box">
                        <input type="text" 
                               wire:model.live="searchQuery" 
                               wire:keydown.enter="search"
                               placeholder="Cari dataset, kategori, atau instansi..." 
                               class="search-input"
                               autocomplete="off">
                        <button class="search-btn" wire:click="search">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 21L16.514 16.506L21 21ZM19 10.5C19 15.194 15.194 19 10.5 19C5.806 19 2 15.194 2 10.5C2 5.806 5.806 2 10.5 2C15.194 2 19 5.806 19 10.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                    
                    <!-- Search Suggestions -->
                    @if($showSuggestions && count($suggestions) > 0)
                        <div class="search-suggestions">
                            @foreach($suggestions as $index => $suggestion)
                                <div class="suggestion-item" 
                                     wire:click="selectSuggestion('{{ $suggestion['text'] }}', '{{ $suggestion['type'] }}', '{{ $suggestion['category'] ?? '' }}')"
                                     data-type="{{ $suggestion['type'] }}">
                                    <div class="suggestion-icon">
                                        @if($suggestion['type'] === 'dataset')
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"></path>
                                            </svg>
                                        @elseif($suggestion['type'] === 'category')
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                                            </svg>
                                        @else
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                            </svg>
                                        @endif
                                    </div>
                                    <div class="suggestion-text">
                                        <span class="suggestion-title">{{ $suggestion['text'] }}</span>
                                        @if($suggestion['type'] === 'dataset')
                                            <span class="suggestion-type">Dataset</span>
                                        @elseif($suggestion['type'] === 'category')
                                            <span class="suggestion-type">Kategori</span>
                                        @else
                                            <span class="suggestion-type">Pencarian</span>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                
                <div class="hero-stats">
                    <div class="stat-item">
                        <h3>1000+</h3>
                        <p>Dataset Tersedia</p>
                    </div>
                    <div class="stat-item">
                        <h3>50+</h3>
                        <p>Kategori Sektor</p>
                    </div>
                    <div class="stat-item">
                        <h3>24/7</h3>
                        <p>Akses Terbuka</p>
                    </div>
                </div>
                
                {{-- <a href="#" class="cta-button">Jelajahi Dataset</a> --}}
            </div>
        </div>
        
        <div class="hero-right">
            <div class="hero-image">
                <img src="{{ asset('images/3dpesawaran.png') }}" alt="OpenData Pesawaran" class="floating-image">
            </div>
        </div>
    </div>
</section>

<section class="section-2">
    <div>
        <p>OpenData Pesawaran</p>
        <h1>Simetriskan data yang Kamu Butuhkan</h1>
    </div>
    <div>
        <div class="dataset-container">
            {{-- dataset Grid Container --}}
            <div class="dataset-grid-container">
                <div class="dataset-grid">
                @foreach($datasets as $dataset)
                    <a href="{{ route('dataset-page', ['category' => $dataset['category']]) }}" class="dataset-card-link">
                        <div class="dataset-card">
                            <div class="card-icon">{{ $dataset['icon'] }}</div>
                            <h3 class="card-title">{{ $dataset['title'] }}</h3>
                            <p class="card-description">{{ $dataset['description'] }}</p>
                            <div class="card-stats">
                                <span class="download-count">{{ number_format($dataset['downloads']) }} downloads</span>
                                <span class="update-date">Update: {{ $dataset['update'] }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
                </div>
            </div>
            
        </div>
    </div>
</section>

    <!-- Article Section -->
    <section id="artikel" class="artikel-section">
        <div class="artikel-container">
            <div class="artikel-header">
                <div class="artikel-subtitle">OpenData Pesawaran</div>
                <h2 class="artikel-main-title">ARTIKEL</h2>
            </div>
            
            <div class="artikel-content">
                @foreach($articles as $article)
                    <div class="artikel-card">
                        <div class="artikel-top">
                            <div class="artikel-image" style="background-image: url('{{ $article['image'] }}'); background-size: cover; background-position: center;"></div>
                            <div class="artikel-text">
                                <h3 class="artikel-title">{{ $article['title'] }}</h3>
                                <p class="artikel-description">{{ $article['description'] }}</p>
                            </div>
                        </div>
                        <a href="{{ route('artikel-page', ['article' => $article['id']]) }}" class="artikel-btn">Baca Selengkapnya...</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Footer Component -->
    <x-footer />
</div>
