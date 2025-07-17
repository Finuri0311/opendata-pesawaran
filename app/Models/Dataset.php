<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Dataset extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'category',
        'format',
        'size',
        'organization',
        'tags',
        'views',
        'downloads',
        'likes',
        'last_updated',
        'is_active'
    ];

    protected $casts = [
        'tags' => 'array',
        'last_updated' => 'datetime',
        'is_active' => 'boolean'
    ];

    // Auto-generate slug from title
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($dataset) {
            if (empty($dataset->slug)) {
                $dataset->slug = Str::slug($dataset->title);
            }
        });
    }

    // Scope untuk dataset aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope untuk filter berdasarkan kategori
    public function scopeByCategory($query, $category)
    {
        if ($category) {
            return $query->where('category', $category);
        }
        return $query;
    }

    // Scope untuk filter berdasarkan format
    public function scopeByFormat($query, $format)
    {
        if ($format) {
            return $query->where('format', $format);
        }
        return $query;
    }

    // Scope untuk pencarian
    public function scopeSearch($query, $search)
    {
        if ($search) {
            return $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%')
                  ->orWhere('organization', 'like', '%' . $search . '%');
            });
        }
        return $query;
    }

    // Method untuk increment views
    public function incrementViews()
    {
        $this->increment('views');
    }

    // Method untuk increment downloads
    public function incrementDownloads()
    {
        $this->increment('downloads');
    }

    // Method untuk increment likes
    public function incrementLikes()
    {
        $this->increment('likes');
    }
}
