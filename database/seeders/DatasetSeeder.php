<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dataset;
use Carbon\Carbon;

class DatasetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datasets = [
            [
                'title' => 'Data Kependudukan Kecamatan Jatisampurna 2024',
                'description' => 'Dataset lengkap mengenai data kependudukan di Kecamatan Jatisampurna tahun 2024, meliputi jumlah penduduk berdasarkan jenis kelamin, usia, dan kelurahan.',
                'category' => 'kependudukan',
                'format' => 'CSV',
                'size' => '2.5 MB',
                'organization' => 'Dinas Kependudukan dan Pencatatan Sipil',
                'tags' => ['kependudukan', 'jatisampurna', 'demografi', 'statistik'],
                'views' => 1250,
                'downloads' => 340,
                'likes' => 45,
                'last_updated' => Carbon::now()->subDays(5),
                'is_active' => true
            ],
            [
                'title' => 'Anggaran Pembangunan Infrastruktur 2024',
                'description' => 'Data anggaran dan realisasi pembangunan infrastruktur di wilayah Bekasi Selatan tahun 2024, termasuk jalan, jembatan, dan fasilitas umum.',
                'category' => 'pemerintahan',
                'format' => 'JSON',
                'size' => '1.8 MB',
                'organization' => 'Dinas Pekerjaan Umum dan Penataan Ruang',
                'tags' => ['anggaran', 'infrastruktur', 'pembangunan', 'pemerintahan'],
                'views' => 890,
                'downloads' => 156,
                'likes' => 23,
                'last_updated' => Carbon::now()->subDays(12),
                'is_active' => true
            ],
            [
                'title' => 'Data Fasilitas Kesehatan dan Tenaga Medis',
                'description' => 'Informasi lengkap mengenai fasilitas kesehatan, jumlah tenaga medis, dan kapasitas pelayanan kesehatan di Kota Bekasi.',
                'category' => 'kesehatan',
                'format' => 'Excel',
                'size' => '3.2 MB',
                'organization' => 'Dinas Kesehatan Kota Bekasi',
                'tags' => ['kesehatan', 'rumah sakit', 'puskesmas', 'tenaga medis'],
                'views' => 2100,
                'downloads' => 567,
                'likes' => 78,
                'last_updated' => Carbon::now()->subDays(8),
                'is_active' => true
            ],
            [
                'title' => 'Statistik Pendidikan Dasar dan Menengah',
                'description' => 'Data statistik pendidikan tingkat SD, SMP, dan SMA/SMK di wilayah Bekasi Selatan, meliputi jumlah sekolah, siswa, dan guru.',
                'category' => 'pendidikan',
                'format' => 'PDF',
                'size' => '4.1 MB',
                'organization' => 'Dinas Pendidikan Kota Bekasi',
                'tags' => ['pendidikan', 'sekolah', 'siswa', 'guru', 'statistik'],
                'views' => 1680,
                'downloads' => 423,
                'likes' => 56,
                'last_updated' => Carbon::now()->subDays(15),
                'is_active' => true
            ],
            [
                'title' => 'Data UMKM dan Koperasi Terdaftar',
                'description' => 'Database lengkap UMKM dan koperasi yang terdaftar di Kota Bekasi, termasuk jenis usaha, lokasi, dan status operasional.',
                'category' => 'ekonomi',
                'format' => 'CSV',
                'size' => '1.9 MB',
                'organization' => 'Dinas Koperasi dan UKM',
                'tags' => ['umkm', 'koperasi', 'ekonomi', 'usaha kecil'],
                'views' => 945,
                'downloads' => 234,
                'likes' => 31,
                'last_updated' => Carbon::now()->subDays(20),
                'is_active' => true
            ],
            [
                'title' => 'Peta Digital Tata Ruang Wilayah',
                'description' => 'Peta digital dan data spasial tata ruang wilayah Bekasi Selatan, meliputi zona peruntukan lahan dan rencana pembangunan.',
                'category' => 'geografi',
                'format' => 'JSON',
                'size' => '15.7 MB',
                'organization' => 'Dinas Penataan Ruang dan Pertanahan',
                'tags' => ['peta', 'tata ruang', 'spasial', 'perencanaan'],
                'views' => 756,
                'downloads' => 89,
                'likes' => 18,
                'last_updated' => Carbon::now()->subDays(30),
                'is_active' => true
            ],
            [
                'title' => 'Data Transportasi dan Lalu Lintas',
                'description' => 'Informasi mengenai volume lalu lintas, rute transportasi umum, dan data kecelakaan lalu lintas di wilayah Bekasi Selatan.',
                'category' => 'transportasi',
                'format' => 'Excel',
                'size' => '2.8 MB',
                'organization' => 'Dinas Perhubungan',
                'tags' => ['transportasi', 'lalu lintas', 'angkutan umum', 'kecelakaan'],
                'views' => 1320,
                'downloads' => 298,
                'likes' => 42,
                'last_updated' => Carbon::now()->subDays(7),
                'is_active' => true
            ],
            [
                'title' => 'Laporan Kualitas Lingkungan Hidup',
                'description' => 'Data monitoring kualitas udara, air, dan lingkungan hidup di Kota Bekasi, termasuk indeks pencemaran dan upaya pengendalian.',
                'category' => 'lingkungan',
                'format' => 'PDF',
                'size' => '5.3 MB',
                'organization' => 'Dinas Lingkungan Hidup',
                'tags' => ['lingkungan', 'pencemaran', 'kualitas udara', 'monitoring'],
                'views' => 1150,
                'downloads' => 187,
                'likes' => 29,
                'last_updated' => Carbon::now()->subDays(18),
                'is_active' => true
            ]
        ];

        foreach ($datasets as $dataset) {
            Dataset::create($dataset);
        }
    }
}
