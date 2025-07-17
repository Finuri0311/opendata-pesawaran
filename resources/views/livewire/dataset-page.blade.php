<div>
    <!-- Include CSS -->
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/dataset-page.css') }}">
    @endpush
    
    @push('scripts')
        <script src="{{ asset('js/dataset-page.js') }}" defer></script>
    @endpush

    <!-- Header Component -->
    <x-header />

    <!-- Dataset Page Content -->
    <div class="dataset-page">
        <!-- Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title">Dataset</h1>
                <p class="page-description">
                    Portal download data terbuka yang dapat Anda akses untuk riset dan analisis data di Kota Bekasi. Data tersedia dalam berbagai format seperti CSV, JSON, XML, dan PDF. 
                    <strong>Silakan unduh sesuai kebutuhan Anda.</strong>
                </p>
            </div>
        </div> 

        <!-- Filters Section -->
        <div class="filters-section">
            <div class="container">
                <div class="filters-grid">
                    <!-- Search -->
                    <div class="filter-group">
                        <input type="text" wire:model.live="searchQuery" placeholder="Cari dataset..." class="search-input">
                    </div>
                    
                    <!-- Category Filter -->
                    <div class="filter-group">
                        <select wire:model.live="selectedCategory" class="filter-select">
                            @foreach($categories as $key => $label)
                                <option value="{{ $key }}">{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <!-- Format Filter -->
                    <div class="filter-group">
                        <select wire:model.live="selectedFormat" class="filter-select">
                            @foreach($formats as $key => $label)
                                <option value="{{ $key }}">{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <!-- Sort Filter -->
                    <div class="filter-group">
                        <select wire:model.live="sortBy" class="filter-select">
                            <option value="newest">Terbaru</option>
                            <option value="oldest">Terlama</option>
                            <option value="popular">Terpopuler</option>
                            <option value="views">Paling Dilihat</option>
                            <option value="title">Nama A-Z</option>
                        </select>
                    </div>
                    
                    <!-- Download Button -->
                    <div class="filter-group">
                        <button class="download-all-btn">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Download Semua
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Results Info -->
        <div class="results-info">
            <div class="container">
                <p class="results-text">{{ count($filteredDatasets) }} dari {{ count($datasets) }} dataset ditemukan</p>
                <div class="view-toggle">
                    <button class="view-btn active" data-view="list">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <button class="view-btn" data-view="grid">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Dataset List -->
        <div class="dataset-list">
            <div class="container">
                @if(count($filteredDatasets) > 0)
                    @foreach($filteredDatasets as $dataset)
                        <div class="dataset-item">
                            <div class="dataset-icon">
                                <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="dataset-content">
                                <div class="dataset-header">
                                    <h3 class="dataset-title">
                                        <a href="{{ route('dataset-detail', $dataset['id']) }}" class="dataset-title-link">
                                            {{ $dataset['title'] }}
                                        </a>
                                    </h3>
                                    <div class="dataset-meta">
                                        <span class="format-badge format-{{ $dataset['format'] }}">{{ strtoupper($dataset['format']) }}</span>
                                        <span class="size-info">{{ $dataset['size'] }}</span>
                                    </div>
                                </div>
                                <p class="dataset-description">{{ $dataset['description'] }}</p>
                                <div class="dataset-info">
                                    <div class="info-left">
                                        <span class="organization">{{ $dataset['organization'] }}</span>
                                        <div class="tags">
                                            @foreach($dataset['tags'] as $tag)
                                                <span class="tag">{{ $tag }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="info-right">
                                        <div class="stats">
                                            <span class="stat">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                                {{ number_format($dataset['views']) }}
                                            </span>
                                            <span class="stat">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                </svg>
                                                {{ number_format($dataset['downloads']) }}
                                            </span>
                                        </div>
                                        <span class="update-date">Diperbarui: {{ date('d M Y', strtotime($dataset['updated_at'])) }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="dataset-actions">
                                <a href="{{ route('dataset-detail', $dataset['id']) }}" class="action-btn view-btn-action">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </a>
                                <button class="action-btn download-btn-action">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="no-results">
                        <div class="no-results-icon">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="no-results-title">Tidak ada dataset ditemukan</h3>
                        <p class="no-results-text">Coba ubah filter atau kata kunci pencarian Anda</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Pagination -->
        @if(count($filteredDatasets) > 10)
            <div class="pagination-section">
                <div class="container">
                    <div class="pagination">
                        <button class="pagination-btn prev" disabled>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </button>
                        <span class="pagination-info">Halaman 1 dari 1</span>
                        <button class="pagination-btn next" disabled>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Footer Component -->
    <x-footer />
</div>