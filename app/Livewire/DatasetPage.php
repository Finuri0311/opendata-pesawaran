<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class DatasetPage extends Component
{
    use WithPagination;
    
    public $searchQuery = '';
    public $selectedCategory = 'all';
    public $selectedFormat = 'all';
    public $sortBy = 'newest';
    
    public $categories = [
        'all' => 'Semua Kategori',
        'pemerintahan' => 'Pemerintahan',
        'kependudukan' => 'Kependudukan', 
        'kesehatan' => 'Kesehatan',
        'pendidikan' => 'Pendidikan',
        'transportasi' => 'Transportasi',
        'pertanian' => 'Pertanian',
        'industri' => 'Industri',
        'ketenagakerjaan' => 'Ketenagakerjaan',
        'lingkungan' => 'Lingkungan',
        'energi' => 'Energi',
        'perumahan' => 'Perumahan',
        'ekonomi' => 'Ekonomi',
        'budaya' => 'Budaya',
        'keamanan' => 'Keamanan',
        'digital' => 'Digital',
        'bencana' => 'Bencana'
    ];
    
    public $formats = [
        'all' => 'Semua Format',
        'csv' => 'CSV',
        'json' => 'JSON',
        'xml' => 'XML',
        'pdf' => 'PDF',
        'xlsx' => 'Excel'
    ];
    
    public $datasets = [
        [
            'id' => 1,
            'title' => 'Data Kepadatan Penduduk Kota Bekasi',
            'description' => 'Dataset ini berisi informasi mengenai kepadatan penduduk di berbagai wilayah Kota Bekasi tahun 2024',
            'category' => 'kependudukan',
            'format' => 'csv',
            'size' => '2.5 MB',
            'downloads' => 1256,
            'views' => 3489,
            'updated_at' => '2024-01-15',
            'organization' => 'Dinas Kependudukan dan Pencatatan Sipil',
            'tags' => ['penduduk', 'demografi', 'bekasi']
        ],
        [
            'id' => 2,
            'title' => 'Fasilitas Kesehatan Kota Bekasi',
            'description' => 'Data lengkap fasilitas kesehatan meliputi rumah sakit, puskesmas, dan klinik di Kota Bekasi',
            'category' => 'kesehatan',
            'format' => 'json',
            'size' => '1.8 MB',
            'downloads' => 892,
            'views' => 2341,
            'updated_at' => '2024-01-10',
            'organization' => 'Dinas Kesehatan Kota Bekasi',
            'tags' => ['kesehatan', 'fasilitas', 'rumah sakit']
        ],
        [
            'id' => 3,
            'title' => 'Data Sekolah dan Institusi Pendidikan',
            'description' => 'Informasi lengkap sekolah dari tingkat SD hingga SMA/SMK di wilayah Kota Bekasi',
            'category' => 'pendidikan',
            'format' => 'xlsx',
            'size' => '3.2 MB',
            'downloads' => 1567,
            'views' => 4123,
            'updated_at' => '2024-01-08',
            'organization' => 'Dinas Pendidikan Kota Bekasi',
            'tags' => ['pendidikan', 'sekolah', 'siswa']
        ],
        [
            'id' => 4,
            'title' => 'Infrastruktur Transportasi Publik',
            'description' => 'Data rute, halte, dan jadwal transportasi publik di Kota Bekasi termasuk TransJakarta dan angkot',
            'category' => 'transportasi',
            'format' => 'json',
            'size' => '4.1 MB',
            'downloads' => 734,
            'views' => 1892,
            'updated_at' => '2024-01-05',
            'organization' => 'Dinas Perhubungan Kota Bekasi',
            'tags' => ['transportasi', 'rute', 'jadwal']
        ],
        [
            'id' => 5,
            'title' => 'Produksi Pertanian dan Komoditas',
            'description' => 'Data produksi hasil pertanian, perkebunan, dan peternakan di wilayah Kota Bekasi',
            'category' => 'pertanian',
            'format' => 'csv',
            'size' => '2.7 MB',
            'downloads' => 445,
            'views' => 1234,
            'updated_at' => '2024-01-03',
            'organization' => 'Dinas Pertanian Kota Bekasi',
            'tags' => ['pertanian', 'produksi', 'komoditas']
        ],
        [
            'id' => 6,
            'title' => 'Kualitas Udara dan Lingkungan',
            'description' => 'Monitoring kualitas udara, tingkat polusi, dan indeks lingkungan hidup Kota Bekasi',
            'category' => 'lingkungan',
            'format' => 'xml',
            'size' => '1.5 MB',
            'downloads' => 623,
            'views' => 1567,
            'updated_at' => '2024-01-01',
            'organization' => 'Dinas Lingkungan Hidup',
            'tags' => ['lingkungan', 'polusi', 'udara']
        ],
        [
            'id' => 7,
            'title' => 'Data Industri dan Manufaktur',
            'description' => 'Informasi perusahaan industri, manufaktur, dan zona industri di Kota Bekasi',
            'category' => 'industri',
            'format' => 'pdf',
            'size' => '5.3 MB',
            'downloads' => 334,
            'views' => 892,
            'updated_at' => '2023-12-28',
            'organization' => 'Dinas Perindustrian dan Perdagangan',
            'tags' => ['industri', 'manufaktur', 'perusahaan']
        ],
        [
            'id' => 8,
            'title' => 'Lapangan Kerja dan Tenaga Kerja',
            'description' => 'Data ketenagakerjaan, tingkat pengangguran, dan peluang kerja di Kota Bekasi',
            'category' => 'ketenagakerjaan',
            'format' => 'csv',
            'size' => '2.1 MB',
            'downloads' => 789,
            'views' => 2156,
            'updated_at' => '2023-12-25',
            'organization' => 'Dinas Tenaga Kerja',
            'tags' => ['tenaga kerja', 'pengangguran', 'lowongan']
        ]
    ];
    
    public function getFilteredDatasets()
    {
        $datasets = collect($this->datasets);
        
        // Filter by search query
        if (!empty($this->searchQuery)) {
            $datasets = $datasets->filter(function ($dataset) {
                return stripos($dataset['title'], $this->searchQuery) !== false ||
                       stripos($dataset['description'], $this->searchQuery) !== false ||
                       stripos($dataset['organization'], $this->searchQuery) !== false;
            });
        }
        
        // Filter by category
        if ($this->selectedCategory !== 'all') {
            $datasets = $datasets->filter(function ($dataset) {
                return $dataset['category'] === $this->selectedCategory;
            });
        }
        
        // Filter by format
        if ($this->selectedFormat !== 'all') {
            $datasets = $datasets->filter(function ($dataset) {
                return $dataset['format'] === $this->selectedFormat;
            });
        }
        
        // Sort datasets
        switch ($this->sortBy) {
            case 'newest':
                $datasets = $datasets->sortByDesc('updated_at');
                break;
            case 'oldest':
                $datasets = $datasets->sortBy('updated_at');
                break;
            case 'popular':
                $datasets = $datasets->sortByDesc('downloads');
                break;
            case 'views':
                $datasets = $datasets->sortByDesc('views');
                break;
            case 'title':
                $datasets = $datasets->sortBy('title');
                break;
        }
        
        return $datasets->values()->all();
    }
    
    public function mount($category = null)
    {
        if ($category && array_key_exists($category, $this->categories)) {
            $this->selectedCategory = $category;
        }
        
        // Check if there's a search query from session (from HomePage)
        if (session()->has('searchQuery')) {
            $this->searchQuery = session('searchQuery');
            session()->forget('searchQuery');
        }
    }
    
    public function getTotalDatasets()
    {
        return count($this->getFilteredDatasets());
    }
    
    public function getTotalDownloads()
    {
        return array_sum(array_column($this->datasets, 'downloads'));
    }
    
    public function search()
    {
        $this->resetPage();
    }
    
    public function updatedSelectedCategory()
    {
        $this->resetPage();
    }
    
    public function updatedSelectedFormat()
    {
        $this->resetPage();
    }
    
    public function updatedSortBy()
    {
        $this->resetPage();
    }
    
    public function render()
    {
        return view('livewire.dataset-page', [
            'filteredDatasets' => $this->getFilteredDatasets()
        ])->layout('layouts.app');
    }
}