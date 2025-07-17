<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\ArticleService;

class HomePage extends Component
{
    public $searchQuery = '';
    public $showSuggestions = false;
    public $suggestions = [];
    
    public $datasets = [
        [
            'icon' => '🏛️',
            'title' => 'Data Pemerintahan',
            'description' => 'Struktur dan layanan pemerintahan',
            'downloads' => 1256,
            'update' => '2024',
            'category' => 'pemerintahan'
        ],
        [
            'icon' => '👥',
            'title' => 'Data Kependudukan',
            'description' => 'Demografi dan statistik penduduk',
            'downloads' => 2341,
            'update' => '2024',
            'category' => 'kependudukan'
        ],
        [
            'icon' => '🏥',
            'title' => 'Data Kesehatan',
            'description' => 'Fasilitas dan layanan kesehatan',
            'downloads' => 1789,
            'update' => '2024',
            'category' => 'kesehatan'
        ],
        [
            'icon' => '🎓',
            'title' => 'Data Pendidikan',
            'description' => 'Sekolah dan institusi pendidikan',
            'downloads' => 1567,
            'update' => '2024',
            'category' => 'pendidikan'
        ],
        [
            'icon' => '🚗',
            'title' => 'Data Transportasi',
            'description' => 'Infrastruktur dan layanan transportasi',
            'downloads' => 892,
            'update' => '2024',
            'category' => 'transportasi'
        ],
        [
            'icon' => '🌾',
            'title' => 'Data Pertanian',
            'description' => 'Produksi dan komoditas pertanian',
            'downloads' => 734,
            'update' => '2024',
            'category' => 'pertanian'
        ],
        [
            'icon' => '🏭',
            'title' => 'Data Industri',
            'description' => 'Sektor industri dan manufaktur',
            'downloads' => 445,
            'update' => '2024',
            'category' => 'industri'
        ],
        [
            'icon' => '💼',
            'title' => 'Data Ketenagakerjaan',
            'description' => 'Lapangan kerja dan tenaga kerja',
            'downloads' => 334,
            'update' => '2024',
            'category' => 'ketenagakerjaan'
        ],
        [
            'icon' => '🌍',
            'title' => 'Data Lingkungan',
            'description' => 'Kualitas udara dan lingkungan',
            'downloads' => 445,
            'update' => '2024',
            'category' => 'lingkungan'
        ],
        [
            'icon' => '⚡',
            'title' => 'Data Energi',
            'description' => 'Konsumsi dan distribusi energi',
            'downloads' => 278,
            'update' => '2024',
            'category' => 'energi'
        ],
        [
            'icon' => '🏘️',
            'title' => 'Data Perumahan',
            'description' => 'Perumahan dan pemukiman',
            'downloads' => 612,
            'update' => '2024',
            'category' => 'perumahan'
        ],
        [
            'icon' => '📈',
            'title' => 'Data Ekonomi',
            'description' => 'Indikator ekonomi daerah',
            'downloads' => 923,
            'update' => '2024',
            'category' => 'ekonomi'
        ],
        [
            'icon' => '🎭',
            'title' => 'Data Budaya',
            'description' => 'Kebudayaan dan pariwisata',
            'downloads' => 356,
            'update' => '2024',
            'category' => 'budaya'
        ],
        [
            'icon' => '🔒',
            'title' => 'Data Keamanan',
            'description' => 'Keamanan dan ketertiban',
            'downloads' => 189,
            'update' => '2024',
            'category' => 'keamanan'
        ],
        [
            'icon' => '📱',
            'title' => 'Data Digital',
            'description' => 'Transformasi digital daerah',
            'downloads' => 467,
            'update' => '2024',
            'category' => 'digital'
        ],
        [
            'icon' => '🚨',
            'title' => 'Data Bencana',
            'description' => 'Mitigasi dan tanggap bencana',
            'downloads' => 234,
            'update' => '2024',
            'category' => 'bencana'
        ]
    ];
    
    public function getLatestArticles()
    {
        return ArticleService::getLatestArticles(3);
    }
    
    public function updatedSearchQuery()
    {
        if (strlen($this->searchQuery) >= 2) {
            $this->generateSuggestions();
            $this->showSuggestions = true;
        } else {
            $this->showSuggestions = false;
            $this->suggestions = [];
        }
    }
    
    public function generateSuggestions()
    {
        $suggestions = [];
        
        // Get suggestions from dataset titles
        foreach ($this->datasets as $dataset) {
            if (stripos($dataset['title'], $this->searchQuery) !== false) {
                $suggestions[] = [
                    'text' => $dataset['title'],
                    'type' => 'dataset',
                    'category' => $dataset['category']
                ];
            }
        }
        
        // Get suggestions from categories
        $categories = [
            'pemerintahan' => 'Data Pemerintahan',
            'kependudukan' => 'Data Kependudukan',
            'kesehatan' => 'Data Kesehatan',
            'pendidikan' => 'Data Pendidikan',
            'transportasi' => 'Data Transportasi',
            'pertanian' => 'Data Pertanian',
            'industri' => 'Data Industri',
            'ketenagakerjaan' => 'Data Ketenagakerjaan',
            'lingkungan' => 'Data Lingkungan',
            'energi' => 'Data Energi',
            'perumahan' => 'Data Perumahan',
            'ekonomi' => 'Data Ekonomi',
            'budaya' => 'Data Budaya',
            'keamanan' => 'Data Keamanan',
            'digital' => 'Data Digital',
            'bencana' => 'Data Bencana'
        ];
        
        foreach ($categories as $key => $label) {
            if (stripos($label, $this->searchQuery) !== false || stripos($key, $this->searchQuery) !== false) {
                $suggestions[] = [
                    'text' => $label,
                    'type' => 'category',
                    'category' => $key
                ];
            }
        }
        
        // Common search terms
        $commonTerms = [
            'penduduk', 'demografi', 'kesehatan', 'rumah sakit', 'sekolah', 'pendidikan',
            'transportasi', 'rute', 'jadwal', 'pertanian', 'produksi', 'industri',
            'tenaga kerja', 'lingkungan', 'polusi', 'udara', 'ekonomi', 'budaya'
        ];
        
        foreach ($commonTerms as $term) {
            if (stripos($term, $this->searchQuery) !== false) {
                $suggestions[] = [
                    'text' => ucfirst($term),
                    'type' => 'term',
                    'category' => null
                ];
            }
        }
        
        // Limit suggestions to 8 items and remove duplicates
        $this->suggestions = array_slice(array_unique($suggestions, SORT_REGULAR), 0, 8);
    }
    
    public function selectSuggestion($text, $type, $category = null)
    {
        $this->searchQuery = $text;
        $this->hideSuggestions();
        $this->dispatch('suggestion-selected');
        $this->search();
    }
    
    public function search()
    {
        if (!empty($this->searchQuery)) {
            session(['searchQuery' => $this->searchQuery]);
            $this->hideSuggestions();
            return redirect()->route('dataset-page');
        }
    }
    
    public function hideSuggestions()
    {
        $this->showSuggestions = false;
    }
    
    public function getTotalDatasets()
    {
        return count($this->datasets);
    }
    
    public function getTotalDownloads()
    {
        return array_sum(array_column($this->datasets, 'downloads'));
    }
    
    public function render()
    {
        return view('livewire.home-page', [
            'articles' => $this->getLatestArticles()
        ])->layout('layouts.app');
    }
}
