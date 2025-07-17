@push('styles')
    <link rel="stylesheet" href="{{ asset('css/artikel-page.css') }}">
@endpush

<div>
    <!-- Include Header -->
    <x-header />
    <!-- Hero Section -->
    <section class="artikel-hero-section">
        <div class="artikel-hero-container">
            <h1 class="artikel-hero-title">Artikel & Berita</h1>
            <p class="artikel-hero-subtitle">Informasi terkini seputar data terbuka dan perkembangan Kabupaten Pesawaran</p>
        </div>
    </section>

    <!-- Search and Filter Section -->
    <section class="artikel-filter-section">
        <div class="artikel-filter-container">
            <!-- Search Bar -->
            <div class="search-container">
                <input type="text" 
                       wire:model.live="searchTerm" 
                       placeholder="Cari artikel..." 
                       class="search-input">
                <svg class="search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>

            <!-- Category Filter -->
            <div class="category-filter">
                <select wire:model.live="selectedCategory" class="category-select">
                    @foreach($categories as $key => $label)
                        <option value="{{ $key }}">{{ $label }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </section>

    <!-- Articles Grid Section -->
    <section class="artikel-grid-section">
        <div class="artikel-grid-container">
            @if(count($filteredArticles) > 0)
                <div class="artikel-grid">
                    @foreach($filteredArticles as $article)
                        <article class="artikel-card" wire:key="article-{{ $article['id'] }}">
                            <div class="artikel-image-container">
                                <img src="{{ $article['image'] }}" alt="{{ $article['title'] }}" class="artikel-image">
                                <div class="artikel-category-badge">{{ $categories[$article['category']] }}</div>
                            </div>
                            
                            <div class="artikel-content">
                                <div class="artikel-meta">
                                    <span class="artikel-author">{{ $article['author'] }}</span>
                                    <span class="artikel-date">{{ date('d M Y', strtotime($article['published_at'])) }}</span>
                                </div>
                                
                                <h3 class="artikel-title">{{ $article['title'] }}</h3>
                                <p class="artikel-description">{{ $article['description'] }}</p>
                                
                                <div class="artikel-tags">
                                    @foreach($article['tags'] as $tag)
                                        <span class="artikel-tag">#{{ $tag }}</span>
                                    @endforeach
                                </div>
                                
                                <div class="artikel-footer">
                                    <div class="artikel-views">
                                        <svg class="views-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        <span>{{ number_format($article['views']) }} views</span>
                                    </div>
                                    <button class="artikel-read-more" wire:click="openArticle({{ $article['id'] }})">Baca Selengkapnya</button>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <div class="no-articles">
                    <div class="no-articles-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3>Tidak ada artikel ditemukan</h3>
                    <p>Coba ubah kata kunci pencarian atau kategori filter</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Article Modal -->
    @if($showModal && $selectedArticle)
        <div class="artikel-modal-overlay" wire:click="closeModal">
            <div class="artikel-modal" wire:click.stop>
                <div class="artikel-modal-header">
                    <button class="artikel-modal-close" wire:click="closeModal">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                
                <div class="artikel-modal-content">
                    <div class="artikel-modal-image">
                        <img src="{{ $selectedArticle['image'] }}" alt="{{ $selectedArticle['title'] }}">
                        <div class="artikel-modal-category">{{ $categories[$selectedArticle['category']] }}</div>
                    </div>
                    
                    <div class="artikel-modal-body">
                        <div class="artikel-modal-meta">
                            <span class="artikel-modal-author">{{ $selectedArticle['author'] }}</span>
                            <span class="artikel-modal-date">{{ date('d M Y', strtotime($selectedArticle['published_at'])) }}</span>
                            <span class="artikel-modal-views">
                                <svg class="views-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                {{ number_format($selectedArticle['views']) }} views
                            </span>
                        </div>
                        
                        <h1 class="artikel-modal-title">{{ $selectedArticle['title'] }}</h1>
                        
                        <div class="artikel-modal-tags">
                            @foreach($selectedArticle['tags'] as $tag)
                                <span class="artikel-modal-tag">#{{ $tag }}</span>
                            @endforeach
                        </div>
                        
                        <div class="artikel-modal-text">
                            {!! $selectedArticle['content'] !!}
                        </div>
                        
                        <div class="artikel-modal-footer">
                            <button class="artikel-modal-share" onclick="navigator.share ? navigator.share({title: '{{ $selectedArticle['title'] }}', url: window.location.href}) : alert('Fitur share tidak didukung browser ini')">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                                </svg>
                                Bagikan
                            </button>
                            <button class="artikel-modal-print" onclick="window.print()">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                                </svg>
                                Cetak
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Include Footer -->
    <x-footer />
</div>
