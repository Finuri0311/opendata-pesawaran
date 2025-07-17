<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\ArticleService;

class ArtikelPage extends Component
{
    public $articles = [];
    public $searchTerm = '';
    public $selectedCategory = 'all';
    public $selectedArticle = null;
    public $showModal = false;
    public $categories = [
        'all' => 'Semua Kategori',
        'berita' => 'Berita Hari Ini',
        'pesawaran' => 'Seputar Pesawaran',
        'geografi' => 'Artikel Geografi',
        'kebijakan' => 'Kebijakan Pengguna',
        'ekonomi' => 'Ekonomi & Bisnis'
    ];

    public function mount($article = null)
    {
        $this->loadArticles();
        
        // Jika ada parameter artikel, buka modal langsung
        if ($article) {
            $this->openArticle($article);
        }
    }

    public function loadArticles()
    {
        $this->articles = ArticleService::getAllArticles();
    }

    public function getFilteredArticles()
    {
        $category = $this->selectedCategory === 'all' ? null : $this->selectedCategory;
        return ArticleService::getFilteredArticles($category, $this->searchTerm);
    }

    public function updatedSearchTerm()
    {
        // Automatically filter when search term changes
    }

    public function updatedSelectedCategory()
    {
        // Automatically filter when category changes
    }

    public function openArticle($articleId)
    {
        $this->selectedArticle = ArticleService::getArticleById($articleId);
        if ($this->selectedArticle) {
            // Increment views
            $this->selectedArticle['views']++;
            // Update the article in the main array
            $articleIndex = array_search($articleId, array_column($this->articles, 'id'));
            if ($articleIndex !== false) {
                $this->articles[$articleIndex]['views'] = $this->selectedArticle['views'];
            }
            $this->showModal = true;
        }
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->selectedArticle = null;
    }

    public function render()
    {
        return view('livewire.artikel-page', [
            'filteredArticles' => $this->getFilteredArticles()
        ])->layout('layouts.app', ['title' => 'Artikel - OpenData Pesawaran']);
    }
}
