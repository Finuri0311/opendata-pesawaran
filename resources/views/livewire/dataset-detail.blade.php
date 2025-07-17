<div>
    <!-- Header -->
    <x-header />
    
    @push('styles')
        <link href="{{ asset('css/dataset-detail.css') }}" rel="stylesheet">
    @endpush
    
    @push('scripts')
        <script src="{{ asset('js/dataset-detail-tabs.js') }}" defer></script>
    @endpush

    <!-- Main Content -->
    <main class="min-h-screen bg-gray-50">
        <!-- Section 1: Dataset Header -->
        <section class="dataset-header">
            <div class="dataset-header-content">
                <div class="dataset-header-text">
                    <h1 class="dataset-title">
                        Jumlah Kepala Sekolah dan Guru Sekolah Menengah Kejuruan (SMK) Berdasarkan Kabupaten/Kota di Jawa Barat
                    </h1>
                    
                    <div class="dataset-source">
                        <div class="source-logo">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo Disdik" class="logo-img">
                        </div>
                        <span class="source-text">DINAS PENDIDIKAN</span>
                    </div>
                </div>
                
                <div class="dataset-header-image">
                    <img src="{{ asset('images/3dpesawaran.png') }}" alt="Illustration" class="header-illustration">
                </div>
            </div>
            
            <!-- Dataset Metadata -->
            <div class="dataset-metadata">
                <div class="metadata-item">
                    <i class="metadata-icon">📚</i>
                    <span class="metadata-label">Pendidikan</span>
                </div>
                <div class="metadata-item">
                    <i class="metadata-icon">📅</i>
                    <span class="metadata-label">2019 - 2024</span>
                </div>
                <div class="metadata-item">
                    <i class="metadata-icon">✅</i>
                    <span class="metadata-label">Tetap</span>
                </div>
                <div class="metadata-item">
                    <i class="metadata-icon">⏰</i>
                    <span class="metadata-label">5 jam yang lalu</span>
                </div>
                <div class="metadata-views">
                    <i class="metadata-icon">👁️</i>
                    <span class="views-count">1.461</span>
                </div>
            </div>
        </section>
        
        <!-- Section 2: Dataset Content with Tabs -->
        <section class="dataset-content-section">
            <div class="container mx-auto px-4">
                <div class="dataset-content-wrapper">
                    <!-- Tab Navigation -->
                    <div class="tab-navigation">
                        <div class="tab-buttons">
                            <button class="tab-button active" data-tab="data">
                                Data
                            </button>
                            <button class="tab-button" data-tab="metadata">
                                Metadata
                            </button>
                        </div>
                        <div class="share-buttons">
                            <span class="share-label">Bagikan:</span>
                            <a href="#" class="share-btn facebook" title="Share on Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="share-btn twitter" title="Share on Twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="share-btn whatsapp" title="Share on WhatsApp">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            <a href="#" class="share-btn link" title="Copy Link">
                                <i class="fas fa-link"></i>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Tab Content -->
                    <div class="tab-content">
                        <!-- Data Tab -->
                        <div class="tab-pane active" id="data-tab">
                            <div class="dataset-description">
                                <h3 class="description-title">Deskripsi Dataset</h3>
                                
                                <div class="description-content">
                                    <p class="description-text">
                                        Dataset ini berisi data jumlah kepala sekolah dan guru sekolah menengah kejuruan (smk) berdasarkan kabupaten/kota di Provinsi Jawa Barat dari tahun ajaran 2019/2020 s.d. 2024/2025.
                                    </p>
                                    
                                    <p class="description-text">
                                        Dataset terkait topik Pendidikan ini dihasilkan oleh Dinas Pendidikan yang dikeluarkan dalam periode 1 tahun sekali.
                                    </p>
                                    
                                    <div class="variable-explanation">
                                        <p class="variable-title">Penjelasan mengenai variabel di dalam dataset ini:</p>
                                        <ul class="variable-list">
                                            <li><strong>kode_provinsi:</strong> menyatakan kode Provinsi Jawa Barat sesuai ketentuan BPS merujuk pada aturan Peraturan Badan Pusat Statistik Nomor 3 Tahun 2019 dengan tipe data numerik.</li>
                                            <li><strong>nama_provinsi:</strong> menyatakan lingkup data berasal dari wilayah Provinsi Jawa Barat sesuai ketentuan BPS merujuk pada aturan Peraturan Badan Pusat Statistik Nomor 3 Tahun 2019 dengan tipe data teks.</li>
                                            <li><strong>kode_kabupaten_kota:</strong> menyatakan kode dari setiap kabupaten dan kota di Provinsi Jawa Barat sesuai ketentuan BPS merujuk pada aturan Peraturan Badan Pusat Statistik Nomor 3 Tahun 2019 dengan tipe data numerik.</li>
                                            <li><strong>nama_kabupaten_kota:</strong> menyatakan lingkup data berasal dari setiap kabupaten dan kota di Provinsi Jawa Barat sesuai penamaan BPS merujuk pada aturan Peraturan Badan Pusat Statistik Nomor 3 Tahun 2019 dengan tipe data teks.</li>
                                            <li><strong>jumlah_kepsek_guru:</strong> menyatakan jumlah kepala sekolah dan guru sekolah menengah kejuruan dengan tipe data numerik.</li>
                                            <li><strong>satuan:</strong> menyatakan satuan dari pengukuran jumlah kepala sekolah dan guru sekolah menengah kejuruan dalam orang dengan tipe data teks.</li>
                                            <li><strong>tahun:</strong> menyatakan tahun produksi data dengan tipe data numerik.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Metadata Tab -->
                        <div class="tab-pane" id="metadata-tab">
                            <div class="metadata-content">
                                <h3 class="metadata-title">Metadata</h3>
                                
                                <div class="metadata-table">
                                    <div class="metadata-row">
                                        <div class="metadata-key">Dataset Diperbarui</div>
                                        <div class="metadata-value">16 Juli 2025</div>
                                    </div>
                                    <div class="metadata-row">
                                        <div class="metadata-key">Dataset Dibuat</div>
                                        <div class="metadata-value">24 Oktober 2021</div>
                                    </div>
                                    <div class="metadata-row">
                                        <div class="metadata-key">Pengukuran Dataset</div>
                                        <div class="metadata-value">Jumlah Kepala Sekolah dan Guru</div>
                                    </div>
                                    <div class="metadata-row">
                                        <div class="metadata-key">Tingkat Penyajian Dataset</div>
                                        <div class="metadata-value">Kabupaten/Kota</div>
                                    </div>
                                    <div class="metadata-row">
                                        <div class="metadata-key">Cakupan Dataset</div>
                                        <div class="metadata-value">Seluruh Kepala Sekolah dan Guru di Provinsi Jawa Barat</div>
                                    </div>
                                    <div class="metadata-row">
                                        <div class="metadata-key">Produsen</div>
                                        <div class="metadata-value">DINAS PENDIDIKAN</div>
                                    </div>
                                    <div class="metadata-row">
                                        <div class="metadata-key">Bidang</div>
                                        <div class="metadata-value">-</div>
                                    </div>
                                    <div class="metadata-row">
                                        <div class="metadata-key">Penanggung Jawab</div>
                                        <div class="metadata-value">-</div>
                                    </div>
                                    <div class="metadata-row">
                                        <div class="metadata-key">Kontak Produsen</div>
                                        <div class="metadata-value">-</div>
                                    </div>
                                    <div class="metadata-row">
                                        <div class="metadata-key">Kode Indikator</div>
                                        <div class="metadata-value">-</div>
                                    </div>
                                    <div class="metadata-row">
                                        <div class="metadata-key">Bidang Urusan</div>
                                        <div class="metadata-value">PENDIDIKAN</div>
                                    </div>
                                    <div class="metadata-row">
                                        <div class="metadata-key">Satuan Dataset</div>
                                        <div class="metadata-value">Orang</div>
                                    </div>
                                    <div class="metadata-row">
                                        <div class="metadata-key">Frekuensi Dataset</div>
                                        <div class="metadata-value">Tahunan</div>
                                    </div>
                                    <div class="metadata-row">
                                        <div class="metadata-key">Sumber External</div>
                                        <div class="metadata-value">-</div>
                                    </div>
                                    <div class="metadata-row">
                                        <div class="metadata-key">Dimensi Dataset</div>
                                        <div class="metadata-value">2019 - 2024</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Section 3: Data Table with Visualization Options -->
        <section class="dataset-table-section">
            <div class="container mx-auto px-4">
                <div class="dataset-table-wrapper">
                    <!-- Table Navigation -->
                    <div class="table-navigation">
                        <div class="table-tabs">
                             <button class="table-tab active" data-table-tab="tabel">
                                 Tabel
                             </button>
                             <button class="table-tab" data-table-tab="grafik">
                                 Grafik
                             </button>
                         </div>
                        
                        <div class="table-controls">
                            <div class="filter-control">
                                <select class="filter-dropdown">
                                    <option value="">Atur Kolom (5/8)</option>
                                    <option value="nama_provinsi">Nama Provinsi</option>
                                    <option value="nama_kabupaten_kota">Nama Kabupaten/Kota</option>
                                    <option value="jumlah_kepsek_guru">Jumlah Kepala Sekolah & Guru</option>
                                    <option value="satuan">Satuan</option>
                                    <option value="tahun">Tahun</option>
                                </select>
                            </div>
                            
                            <div class="download-controls">
                                 <div class="download-dropdown">
                                     <button class="download-btn primary" data-dropdown="dataset">
                                         Unduh dataset
                                         <i class="fas fa-chevron-down"></i>
                                     </button>
                                     <div class="dropdown-menu" id="dataset-dropdown">
                                         <a href="#" class="dropdown-item" data-format="excel">
                                             <i class="fas fa-file-excel"></i>
                                             Excel
                                         </a>
                                         <a href="#" class="dropdown-item" data-format="csv">
                                             <i class="fas fa-file-csv"></i>
                                             CSV
                                         </a>
                                         <a href="#" class="dropdown-item" data-format="api">
                                             <i class="fas fa-code"></i>
                                             API
                                         </a>
                                     </div>
                                 </div>
                                 
                                 <div class="download-dropdown">
                                     <button class="download-btn secondary" data-dropdown="filter">
                                         Unduh sesuai filter
                                         <i class="fas fa-chevron-down"></i>
                                     </button>
                                     <div class="dropdown-menu" id="filter-dropdown">
                                         <a href="#" class="dropdown-item" data-format="excel">
                                             <i class="fas fa-file-excel"></i>
                                             Excel
                                         </a>
                                         <a href="#" class="dropdown-item" data-format="csv">
                                             <i class="fas fa-file-csv"></i>
                                             CSV
                                         </a>
                                     </div>
                                 </div>
                             </div>
                        </div>
                    </div>
                    
                    <!-- Table Content -->
                    <div class="table-content">
                        <!-- Tabel Tab -->
                        <div class="table-pane active" id="tabel-pane">
                            <div class="data-table-container">
                                <table class="data-table">
                                    <thead>
                                        <tr>
                                            <th class="sortable">
                                                nama_provinsi
                                                <div class="column-filter">
                                                    <input type="text" placeholder="Filter" class="column-filter-input">
                                                </div>
                                            </th>
                                            <th class="sortable">
                                                nama_kabupaten_kota
                                                <i class="fas fa-sort"></i>
                                                <div class="column-filter">
                                                    <select class="column-filter-select">
                                                        <option value="">Filter</option>
                                                        <option value="bogor">Kabupaten Bogor</option>
                                                        <option value="sukabumi">Kabupaten Sukabumi</option>
                                                        <option value="cianjur">Kabupaten Cianjur</option>
                                                        <option value="bandung">Kabupaten Bandung</option>
                                                    </select>
                                                </div>
                                            </th>
                                            <th class="sortable">
                                                jumlah_kepsek_guru
                                                <i class="fas fa-sort"></i>
                                                <div class="column-filter">
                                                    <input type="text" placeholder="Cari" class="column-filter-input">
                                                </div>
                                            </th>
                                            <th class="sortable">
                                                satuan
                                                <div class="column-filter">
                                                    <select class="column-filter-select">
                                                        <option value="">Filter</option>
                                                        <option value="orang">Orang</option>
                                                    </select>
                                                </div>
                                            </th>
                                            <th class="sortable">
                                                tahun
                                                <i class="fas fa-sort"></i>
                                                <div class="column-filter">
                                                    <select class="column-filter-select">
                                                        <option value="">Filter</option>
                                                        <option value="2019">2019</option>
                                                        <option value="2020">2020</option>
                                                        <option value="2021">2021</option>
                                                        <option value="2022">2022</option>
                                                        <option value="2023">2023</option>
                                                        <option value="2024">2024</option>
                                                    </select>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>JAWA BARAT</td>
                                            <td>KABUPATEN BOGOR</td>
                                            <td>4646</td>
                                            <td>ORANG</td>
                                            <td>2019</td>
                                        </tr>
                                        <tr>
                                            <td>JAWA BARAT</td>
                                            <td>KABUPATEN SUKABUMI</td>
                                            <td>1893</td>
                                            <td>ORANG</td>
                                            <td>2019</td>
                                        </tr>
                                        <tr>
                                            <td>JAWA BARAT</td>
                                            <td>KABUPATEN CIANJUR</td>
                                            <td>2715</td>
                                            <td>ORANG</td>
                                            <td>2019</td>
                                        </tr>
                                        <tr>
                                            <td>JAWA BARAT</td>
                                            <td>KABUPATEN BANDUNG</td>
                                            <td>2532</td>
                                            <td>ORANG</td>
                                            <td>2019</td>
                                        </tr>
                                        <tr>
                                            <td>JAWA BARAT</td>
                                            <td>KABUPATEN GARUT</td>
                                            <td>2962</td>
                                            <td>ORANG</td>
                                            <td>2019</td>
                                        </tr>
                                        <tr>
                                            <td>JAWA BARAT</td>
                                            <td>KABUPATEN TASIKMALAYA</td>
                                            <td>2424</td>
                                            <td>ORANG</td>
                                            <td>2019</td>
                                        </tr>
                                        <tr>
                                            <td>JAWA BARAT</td>
                                            <td>KABUPATEN CIAMIS</td>
                                            <td>1333</td>
                                            <td>ORANG</td>
                                            <td>2019</td>
                                        </tr>
                                        <tr>
                                            <td>JAWA BARAT</td>
                                            <td>KABUPATEN KUNINGAN</td>
                                            <td>1494</td>
                                            <td>ORANG</td>
                                            <td>2019</td>
                                        </tr>
                                        <tr>
                                            <td>JAWA BARAT</td>
                                            <td>KABUPATEN CIREBON</td>
                                            <td>2451</td>
                                            <td>ORANG</td>
                                            <td>2019</td>
                                        </tr>
                                        <tr>
                                            <td>JAWA BARAT</td>
                                            <td>KABUPATEN MAJALENGKA</td>
                                            <td>1419</td>
                                            <td>ORANG</td>
                                            <td>2019</td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                                <!-- Pagination -->
                                <div class="table-pagination">
                                    <div class="pagination-info">
                                        <span>Tampilkan</span>
                                        <select class="items-per-page">
                                            <option value="10" selected>10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                        <span>Item dari total 81</span>
                                    </div>
                                    
                                    <div class="pagination-controls">
                                        <span>Halaman</span>
                                        <select class="page-selector">
                                            <option value="1" selected>1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                        </select>
                                        <span>dari 9</span>
                                        
                                        <div class="pagination-buttons">
                                            <button class="pagination-btn prev" disabled>
                                                <i class="fas fa-chevron-left"></i>
                                            </button>
                                            <button class="pagination-btn next">
                                                <i class="fas fa-chevron-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Grafik Tab -->
                        <div class="table-pane" id="grafik-pane">
                            <div class="chart-container">
                                <!-- Chart Header Section -->
                                <div class="chart-header">
                                    <h3 class="chart-title">Visualisasi Data Kepala Sekolah dan Guru SMK</h3>
                                    <p class="chart-description">
                                        Grafik menampilkan distribusi jumlah kepala sekolah dan guru SMK berdasarkan kabupaten/kota di Jawa Barat
                                    </p>
                                </div>
                                
                                <!-- Chart Controls Section -->
                                <div class="chart-controls">
                                    <div class="controls-row">
                                        <div class="chart-type-selector">
                                            <label for="chartType" class="control-label">Jenis Grafik:</label>
                                            <select id="chartType" class="form-select">
                                                <option value="bar">Bar Chart</option>
                                                <option value="line">Line Chart</option>
                                                <option value="pie">Pie Chart</option>
                                                <option value="doughnut">Doughnut Chart</option>
                                            </select>
                                        </div>
                                        
                                        <div class="chart-filter">
                                            <label for="chartFilter" class="control-label">Filter Data:</label>
                                            <select id="chartFilter" class="form-select">
                                                <option value="all">Semua Data</option>
                                                <option value="top10">Top 10 Kabupaten/Kota</option>
                                                <option value="year">Berdasarkan Tahun</option>
                                                <option value="range">Range Tertentu</option>
                                            </select>
                                        </div>
                                        
                                        <div class="chart-year-filter">
                                            <label for="yearFilter" class="control-label">Tahun:</label>
                                            <select id="yearFilter" class="form-select">
                                                <option value="2024">2024</option>
                                                <option value="2023">2023</option>
                                                <option value="2022">2022</option>
                                                <option value="2021">2021</option>
                                                <option value="2020">2020</option>
                                                <option value="2019" selected>2019</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Chart Display Section -->
                                <div class="chart-wrapper">
                                    <div class="chart-loading" id="chartLoading" style="display: none;">
                                        <div class="loading-spinner"></div>
                                        <p>Memuat grafik...</p>
                                    </div>
                                    <canvas id="dataChart" width="800" height="400"></canvas>
                                </div>
                                
                                <!-- Chart Legend Section -->
                                <div class="chart-legend" id="chartLegend">
                                    <h4 class="legend-title">Keterangan:</h4>
                                    <div class="legend-items">
                                        <div class="legend-item">
                                            <span class="legend-color" style="background-color: #10B981;"></span>
                                            <span class="legend-text">Kepala Sekolah & Guru SMK</span>
                                        </div>
                                        <div class="legend-item">
                                            <span class="legend-color" style="background-color: #3B82F6;"></span>
                                            <span class="legend-text">Rata-rata Regional</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Chart Statistics Section -->
                                <div class="chart-stats">
                                    <div class="stats-grid">
                                        <div class="stat-item">
                                            <span class="stat-label">Total Keseluruhan:</span>
                                            <span class="stat-value" id="totalValue">-</span>
                                        </div>
                                        <div class="stat-item">
                                            <span class="stat-label">Rata-rata:</span>
                                            <span class="stat-value" id="averageValue">-</span>
                                        </div>
                                        <div class="stat-item">
                                            <span class="stat-label">Tertinggi:</span>
                                            <span class="stat-value" id="maxValue">-</span>
                                        </div>
                                        <div class="stat-item">
                                            <span class="stat-label">Terendah:</span>
                                            <span class="stat-value" id="minValue">-</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Chart Actions Section -->
                                <div class="chart-actions">
                                    <div class="action-buttons">
                                        <button class="btn-chart-download primary" data-format="png">
                                            <i class="fas fa-download"></i>
                                            <span>Unduh PNG</span>
                                        </button>
                                        <button class="btn-chart-download secondary" data-format="svg">
                                            <i class="fas fa-download"></i>
                                            <span>Unduh SVG</span>
                                        </button>
                                        <button class="btn-chart-fullscreen" id="fullscreenBtn">
                                            <i class="fas fa-expand"></i>
                                            <span>Layar Penuh</span>
                                        </button>
                                        <button class="btn-chart-refresh" id="refreshChart">
                                            <i class="fas fa-sync-alt"></i>
                                            <span>Refresh</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <!-- Footer -->
    <x-footer />
</div>