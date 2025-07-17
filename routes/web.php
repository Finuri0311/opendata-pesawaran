<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard;
use App\Livewire\HomePage;
use App\Livewire\ArtikelPage;
use App\Livewire\DatasetPage;
use App\Livewire\DatasetDetail;

Route::get('/', HomePage::class)->name('home');
Route::get('/dashboard', Dashboard::class)->name('dashboard');
Route::get('/artikel/{article?}', ArtikelPage::class)->name('artikel-page');
Route::get('/dataset', DatasetPage::class)->name('dataset-page');
Route::get('/dataset/detail/{id}', DatasetDetail::class)->name('dataset-detail');
