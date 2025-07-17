<?php

namespace App\Livewire;

use Livewire\Component;

class DatasetDetail extends Component
{
    public $datasetId;
    public $dataset;
    public $relatedDatasets = [];
    public $downloadFormats = ['CSV', 'JSON', 'XML', 'PDF'];
    public $selectedFormat = 'CSV';
    
    public function mount($id)
    {
        $this->datasetId = $id;
        $this->loadDataset();
        $this->loadRelatedDatasets();
    }
    
    public function loadDataset()
    {
        // Data dummy untuk detail dataset
        $datasets = [
            1 => [
                'id' => 1,
                'title' => 'Data Kepadatan Penduduk Kota Bekasi',
                'description' => 'Dataset ini berisi informasi mengenai kepadatan penduduk di berbagai wilayah Kota Bekasi tahun 2024. Data mencakup distribusi penduduk per kecamatan, tingkat kepadatan, dan proyeksi pertumbuhan penduduk.',
                'category' => 'Kependudukan',
                'publisher' => 'Dinas Kependudukan dan Pencatatan Sipil',
                'published_date' => '2024-01-15',
                'last_updated' => '2024-12-01',
                'download_count' => 1256,
                'file_size' => '2.5 MB',
                'license' => 'Creative Commons Attribution 4.0',
                'tags' => ['penduduk', 'demografi', 'bekasi'],
                'fields' => [
                    ['name' => 'kecamatan', 'type' => 'String', 'description' => 'Nama kecamatan'],
                    ['name' => 'jumlah_penduduk', 'type' => 'Integer', 'description' => 'Total jumlah penduduk'],
                    ['name' => 'luas_wilayah', 'type' => 'Decimal', 'description' => 'Luas wilayah dalam km²'],
                    ['name' => 'kepadatan', 'type' => 'Decimal', 'description' => 'Kepadatan penduduk per km²'],
                    ['name' => 'laki_laki', 'type' => 'Integer', 'description' => 'Jumlah penduduk laki-laki'],
                    ['name' => 'perempuan', 'type' => 'Integer', 'description' => 'Jumlah penduduk perempuan']
                ],
                'sample_data' => [
                    ['kecamatan' => 'Bekasi Timur', 'jumlah_penduduk' => 425000, 'luas_wilayah' => 26.8, 'kepadatan' => 15865, 'laki_laki' => 212500, 'perempuan' => 212500],
                    ['kecamatan' => 'Bekasi Barat', 'jumlah_penduduk' => 398000, 'luas_wilayah' => 31.2, 'kepadatan' => 12756, 'laki_laki' => 199000, 'perempuan' => 199000],
                    ['kecamatan' => 'Bekasi Utara', 'jumlah_penduduk' => 356000, 'luas_wilayah' => 28.5, 'kepadatan' => 12491, 'laki_laki' => 178000, 'perempuan' => 178000]
                ]
            ],
            2 => [
                'id' => 2,
                'title' => 'Fasilitas Kesehatan Kota Bekasi',
                'description' => 'Data lengkap fasilitas kesehatan meliputi rumah sakit, puskesmas, dan klinik di Kota Bekasi. Dataset mencakup informasi lokasi, kapasitas, dan layanan yang tersedia.',
                'category' => 'Kesehatan',
                'publisher' => 'Dinas Kesehatan Kota Bekasi',
                'published_date' => '2024-01-10',
                'last_updated' => '2024-11-20',
                'download_count' => 892,
                'file_size' => '1.8 MB',
                'license' => 'Creative Commons Attribution 4.0',
                'tags' => ['kesehatan', 'fasilitas', 'rumah sakit'],
                'fields' => [
                    ['name' => 'nama_fasilitas', 'type' => 'String', 'description' => 'Nama fasilitas kesehatan'],
                    ['name' => 'jenis', 'type' => 'String', 'description' => 'Jenis fasilitas (RS/Puskesmas/Klinik)'],
                    ['name' => 'alamat', 'type' => 'String', 'description' => 'Alamat lengkap'],
                    ['name' => 'kecamatan', 'type' => 'String', 'description' => 'Nama kecamatan'],
                    ['name' => 'kapasitas_tempat_tidur', 'type' => 'Integer', 'description' => 'Jumlah tempat tidur'],
                    ['name' => 'layanan_24jam', 'type' => 'Boolean', 'description' => 'Tersedia layanan 24 jam']
                ],
                'sample_data' => [
                    ['nama_fasilitas' => 'RSUD Kota Bekasi', 'jenis' => 'Rumah Sakit', 'alamat' => 'Jl. Chairil Anwar', 'kecamatan' => 'Bekasi Selatan', 'kapasitas_tempat_tidur' => 350, 'layanan_24jam' => 'Ya'],
                    ['nama_fasilitas' => 'Puskesmas Bekasi Timur', 'jenis' => 'Puskesmas', 'alamat' => 'Jl. Raya Bekasi Timur', 'kecamatan' => 'Bekasi Timur', 'kapasitas_tempat_tidur' => 20, 'layanan_24jam' => 'Tidak'],
                    ['nama_fasilitas' => 'Klinik Sehat Bersama', 'jenis' => 'Klinik', 'alamat' => 'Jl. Ahmad Yani', 'kecamatan' => 'Bekasi Barat', 'kapasitas_tempat_tidur' => 5, 'layanan_24jam' => 'Tidak']
                ]
            ],
            3 => [
                'id' => 3,
                'title' => 'Data Sekolah dan Institusi Pendidikan',
                'description' => 'Informasi lengkap sekolah dari tingkat SD hingga SMA/SMK di wilayah Kota Bekasi. Dataset mencakup data jumlah siswa, guru, dan fasilitas pendidikan.',
                'category' => 'Pendidikan',
                'publisher' => 'Dinas Pendidikan Kota Bekasi',
                'published_date' => '2024-01-08',
                'last_updated' => '2024-11-15',
                'download_count' => 1567,
                'file_size' => '3.2 MB',
                'license' => 'Creative Commons Attribution 4.0',
                'tags' => ['pendidikan', 'sekolah', 'siswa'],
                'fields' => [
                    ['name' => 'nama_sekolah', 'type' => 'String', 'description' => 'Nama sekolah'],
                    ['name' => 'jenjang', 'type' => 'String', 'description' => 'Jenjang pendidikan (SD/SMP/SMA/SMK)'],
                    ['name' => 'status', 'type' => 'String', 'description' => 'Status sekolah (Negeri/Swasta)'],
                    ['name' => 'alamat', 'type' => 'String', 'description' => 'Alamat sekolah'],
                    ['name' => 'jumlah_siswa', 'type' => 'Integer', 'description' => 'Total jumlah siswa'],
                    ['name' => 'jumlah_guru', 'type' => 'Integer', 'description' => 'Total jumlah guru']
                ],
                'sample_data' => [
                    ['nama_sekolah' => 'SDN Bekasi Jaya 01', 'jenjang' => 'SD', 'status' => 'Negeri', 'alamat' => 'Jl. Raya Bekasi', 'jumlah_siswa' => 480, 'jumlah_guru' => 24],
                    ['nama_sekolah' => 'SMPN 1 Bekasi', 'jenjang' => 'SMP', 'status' => 'Negeri', 'alamat' => 'Jl. Cut Meutia', 'jumlah_siswa' => 720, 'jumlah_guru' => 45],
                    ['nama_sekolah' => 'SMAN 3 Bekasi', 'jenjang' => 'SMA', 'status' => 'Negeri', 'alamat' => 'Jl. Ir. H. Juanda', 'jumlah_siswa' => 960, 'jumlah_guru' => 58]
                ]
            ],
            4 => [
                'id' => 4,
                'title' => 'Infrastruktur Transportasi Publik',
                'description' => 'Data rute, halte, dan jadwal transportasi publik di Kota Bekasi termasuk TransJakarta dan angkot. Dataset mencakup informasi lengkap tentang sistem transportasi umum.',
                'category' => 'Transportasi',
                'publisher' => 'Dinas Perhubungan Kota Bekasi',
                'published_date' => '2024-01-05',
                'last_updated' => '2024-11-10',
                'download_count' => 734,
                'file_size' => '4.1 MB',
                'license' => 'Creative Commons Attribution 4.0',
                'tags' => ['transportasi', 'rute', 'jadwal'],
                'fields' => [
                    ['name' => 'nama_rute', 'type' => 'String', 'description' => 'Nama rute transportasi'],
                    ['name' => 'jenis_transportasi', 'type' => 'String', 'description' => 'Jenis transportasi (Bus/Angkot)'],
                    ['name' => 'titik_awal', 'type' => 'String', 'description' => 'Titik keberangkatan'],
                    ['name' => 'titik_akhir', 'type' => 'String', 'description' => 'Titik tujuan'],
                    ['name' => 'tarif', 'type' => 'Integer', 'description' => 'Tarif dalam rupiah'],
                    ['name' => 'jam_operasional', 'type' => 'String', 'description' => 'Jam operasional']
                ],
                'sample_data' => [
                    ['nama_rute' => 'TransJakarta 1A', 'jenis_transportasi' => 'Bus', 'titik_awal' => 'Terminal Bekasi', 'titik_akhir' => 'Blok M', 'tarif' => 3500, 'jam_operasional' => '05:00-22:00'],
                    ['nama_rute' => 'Angkot B01', 'jenis_transportasi' => 'Angkot', 'titik_awal' => 'Bekasi Timur', 'titik_akhir' => 'Bekasi Barat', 'tarif' => 5000, 'jam_operasional' => '06:00-20:00'],
                    ['nama_rute' => 'TransJakarta 1B', 'jenis_transportasi' => 'Bus', 'titik_awal' => 'Bekasi Cyber Park', 'titik_akhir' => 'Harmoni', 'tarif' => 3500, 'jam_operasional' => '05:30-21:30']
                ]
            ],
            5 => [
                'id' => 5,
                'title' => 'Produksi Pertanian dan Komoditas',
                'description' => 'Data produksi hasil pertanian, perkebunan, dan peternakan di wilayah Kota Bekasi. Dataset mencakup jenis komoditas, volume produksi, dan nilai ekonomi.',
                'category' => 'Pertanian',
                'publisher' => 'Dinas Pertanian Kota Bekasi',
                'published_date' => '2024-01-03',
                'last_updated' => '2024-11-05',
                'download_count' => 445,
                'file_size' => '2.7 MB',
                'license' => 'Creative Commons Attribution 4.0',
                'tags' => ['pertanian', 'produksi', 'komoditas'],
                'fields' => [
                    ['name' => 'jenis_komoditas', 'type' => 'String', 'description' => 'Jenis komoditas pertanian'],
                    ['name' => 'kategori', 'type' => 'String', 'description' => 'Kategori (Tanaman/Ternak)'],
                    ['name' => 'volume_produksi', 'type' => 'Decimal', 'description' => 'Volume produksi (ton/ekor)'],
                    ['name' => 'luas_lahan', 'type' => 'Decimal', 'description' => 'Luas lahan (hektar)'],
                    ['name' => 'nilai_produksi', 'type' => 'Integer', 'description' => 'Nilai produksi (rupiah)'],
                    ['name' => 'periode', 'type' => 'String', 'description' => 'Periode produksi']
                ],
                'sample_data' => [
                    ['jenis_komoditas' => 'Padi', 'kategori' => 'Tanaman', 'volume_produksi' => 1250.5, 'luas_lahan' => 350.2, 'nilai_produksi' => 8750000000, 'periode' => '2024-Q1'],
                    ['jenis_komoditas' => 'Ayam Broiler', 'kategori' => 'Ternak', 'volume_produksi' => 25000, 'luas_lahan' => 15.5, 'nilai_produksi' => 1250000000, 'periode' => '2024-Q1'],
                    ['jenis_komoditas' => 'Sayuran', 'kategori' => 'Tanaman', 'volume_produksi' => 890.3, 'luas_lahan' => 125.8, 'nilai_produksi' => 2670000000, 'periode' => '2024-Q1']
                ]
            ],
            6 => [
                'id' => 6,
                'title' => 'Kualitas Udara dan Lingkungan',
                'description' => 'Monitoring kualitas udara, tingkat polusi, dan indeks lingkungan hidup Kota Bekasi. Dataset mencakup pengukuran PM2.5, PM10, dan parameter lingkungan lainnya.',
                'category' => 'Lingkungan',
                'publisher' => 'Dinas Lingkungan Hidup',
                'published_date' => '2024-01-01',
                'last_updated' => '2024-12-01',
                'download_count' => 623,
                'file_size' => '1.5 MB',
                'license' => 'Creative Commons Attribution 4.0',
                'tags' => ['lingkungan', 'polusi', 'udara'],
                'fields' => [
                    ['name' => 'lokasi_monitoring', 'type' => 'String', 'description' => 'Lokasi stasiun monitoring'],
                    ['name' => 'tanggal', 'type' => 'Date', 'description' => 'Tanggal pengukuran'],
                    ['name' => 'pm25', 'type' => 'Decimal', 'description' => 'Kadar PM2.5 (μg/m³)'],
                    ['name' => 'pm10', 'type' => 'Decimal', 'description' => 'Kadar PM10 (μg/m³)'],
                    ['name' => 'so2', 'type' => 'Decimal', 'description' => 'Kadar SO2 (μg/m³)'],
                    ['name' => 'indeks_kualitas', 'type' => 'String', 'description' => 'Kategori kualitas udara']
                ],
                'sample_data' => [
                    ['lokasi_monitoring' => 'Bekasi Timur', 'tanggal' => '2024-12-01', 'pm25' => 35.2, 'pm10' => 65.8, 'so2' => 12.5, 'indeks_kualitas' => 'Sedang'],
                    ['lokasi_monitoring' => 'Bekasi Barat', 'tanggal' => '2024-12-01', 'pm25' => 28.7, 'pm10' => 52.3, 'so2' => 8.9, 'indeks_kualitas' => 'Baik'],
                    ['lokasi_monitoring' => 'Bekasi Selatan', 'tanggal' => '2024-12-01', 'pm25' => 42.1, 'pm10' => 78.4, 'so2' => 15.2, 'indeks_kualitas' => 'Tidak Sehat']
                ]
            ],
            7 => [
                'id' => 7,
                'title' => 'Data Industri dan Manufaktur',
                'description' => 'Informasi perusahaan industri, manufaktur, dan zona industri di Kota Bekasi. Dataset mencakup jenis industri, jumlah tenaga kerja, dan kontribusi ekonomi.',
                'category' => 'Industri',
                'publisher' => 'Dinas Perindustrian dan Perdagangan',
                'published_date' => '2023-12-28',
                'last_updated' => '2024-10-30',
                'download_count' => 334,
                'file_size' => '5.3 MB',
                'license' => 'Creative Commons Attribution 4.0',
                'tags' => ['industri', 'manufaktur', 'perusahaan'],
                'fields' => [
                    ['name' => 'nama_perusahaan', 'type' => 'String', 'description' => 'Nama perusahaan'],
                    ['name' => 'jenis_industri', 'type' => 'String', 'description' => 'Jenis industri'],
                    ['name' => 'alamat', 'type' => 'String', 'description' => 'Alamat perusahaan'],
                    ['name' => 'jumlah_karyawan', 'type' => 'Integer', 'description' => 'Jumlah tenaga kerja'],
                    ['name' => 'kapasitas_produksi', 'type' => 'String', 'description' => 'Kapasitas produksi'],
                    ['name' => 'nilai_investasi', 'type' => 'Integer', 'description' => 'Nilai investasi (rupiah)']
                ],
                'sample_data' => [
                    ['nama_perusahaan' => 'PT Bekasi Manufacturing', 'jenis_industri' => 'Tekstil', 'alamat' => 'Kawasan Industri MM2100', 'jumlah_karyawan' => 1250, 'kapasitas_produksi' => '50000 unit/bulan', 'nilai_investasi' => 125000000000],
                    ['nama_perusahaan' => 'PT Elektronik Nusantara', 'jenis_industri' => 'Elektronik', 'alamat' => 'Jababeka Industrial Estate', 'jumlah_karyawan' => 2100, 'kapasitas_produksi' => '25000 unit/bulan', 'nilai_investasi' => 350000000000],
                    ['nama_perusahaan' => 'PT Food Processing Indo', 'jenis_industri' => 'Makanan', 'alamat' => 'Delta Silicon Industrial Park', 'jumlah_karyawan' => 850, 'kapasitas_produksi' => '100 ton/hari', 'nilai_investasi' => 85000000000]
                ]
            ],
            8 => [
                'id' => 8,
                'title' => 'Lapangan Kerja dan Tenaga Kerja',
                'description' => 'Data ketenagakerjaan, tingkat pengangguran, dan peluang kerja di Kota Bekasi. Dataset mencakup informasi lowongan kerja, tingkat partisipasi angkatan kerja, dan distribusi pekerjaan.',
                'category' => 'Ketenagakerjaan',
                'publisher' => 'Dinas Tenaga Kerja',
                'published_date' => '2023-12-25',
                'last_updated' => '2024-10-25',
                'download_count' => 789,
                'file_size' => '2.1 MB',
                'license' => 'Creative Commons Attribution 4.0',
                'tags' => ['tenaga kerja', 'pengangguran', 'lowongan'],
                'fields' => [
                    ['name' => 'kecamatan', 'type' => 'String', 'description' => 'Nama kecamatan'],
                    ['name' => 'angkatan_kerja', 'type' => 'Integer', 'description' => 'Jumlah angkatan kerja'],
                    ['name' => 'bekerja', 'type' => 'Integer', 'description' => 'Jumlah yang bekerja'],
                    ['name' => 'menganggur', 'type' => 'Integer', 'description' => 'Jumlah pengangguran'],
                    ['name' => 'tingkat_pengangguran', 'type' => 'Decimal', 'description' => 'Tingkat pengangguran (%)'],
                    ['name' => 'lowongan_tersedia', 'type' => 'Integer', 'description' => 'Jumlah lowongan kerja']
                ],
                'sample_data' => [
                    ['kecamatan' => 'Bekasi Timur', 'angkatan_kerja' => 185000, 'bekerja' => 172300, 'menganggur' => 12700, 'tingkat_pengangguran' => 6.87, 'lowongan_tersedia' => 2450],
                    ['kecamatan' => 'Bekasi Barat', 'angkatan_kerja' => 165000, 'bekerja' => 154550, 'menganggur' => 10450, 'tingkat_pengangguran' => 6.33, 'lowongan_tersedia' => 1890],
                    ['kecamatan' => 'Bekasi Selatan', 'angkatan_kerja' => 142000, 'bekerja' => 133660, 'menganggur' => 8340, 'tingkat_pengangguran' => 5.87, 'lowongan_tersedia' => 1650]
                ]
            ],
            9 => [
                'id' => 9,
                'title' => 'Data Ekonomi dan UMKM',
                'description' => 'Informasi lengkap tentang perkembangan ekonomi dan usaha mikro kecil menengah di Kota Bekasi.',
                'category' => 'Ekonomi',
                'publisher' => 'Dinas Koperasi dan UKM',
                'published_date' => '2024-01-20',
                'last_updated' => '2024-11-30',
                'download_count' => 567,
                'file_size' => '3.8 MB',
                'license' => 'Creative Commons Attribution 4.0',
                'tags' => ['ekonomi', 'umkm', 'koperasi'],
                'fields' => [
                    ['name' => 'nama_usaha', 'type' => 'String', 'description' => 'Nama usaha/UMKM'],
                    ['name' => 'jenis_usaha', 'type' => 'String', 'description' => 'Jenis/kategori usaha'],
                    ['name' => 'alamat', 'type' => 'String', 'description' => 'Alamat usaha'],
                    ['name' => 'omzet_bulanan', 'type' => 'Integer', 'description' => 'Omzet bulanan (rupiah)'],
                    ['name' => 'jumlah_karyawan', 'type' => 'Integer', 'description' => 'Jumlah tenaga kerja'],
                    ['name' => 'tahun_berdiri', 'type' => 'Integer', 'description' => 'Tahun berdiri']
                ],
                'sample_data' => [
                    ['nama_usaha' => 'Warung Makan Sederhana', 'jenis_usaha' => 'Kuliner', 'alamat' => 'Jl. Raya Bekasi Timur', 'omzet_bulanan' => 15000000, 'jumlah_karyawan' => 3, 'tahun_berdiri' => 2018],
                    ['nama_usaha' => 'Toko Kelontong Berkah', 'jenis_usaha' => 'Retail', 'alamat' => 'Jl. Ahmad Yani', 'omzet_bulanan' => 25000000, 'jumlah_karyawan' => 2, 'tahun_berdiri' => 2015],
                    ['nama_usaha' => 'Bengkel Motor Jaya', 'jenis_usaha' => 'Jasa', 'alamat' => 'Jl. Cut Meutia', 'omzet_bulanan' => 18000000, 'jumlah_karyawan' => 4, 'tahun_berdiri' => 2020]
                ]
            ],
            10 => [
                'id' => 10,
                'title' => 'Data Pariwisata dan Budaya',
                'description' => 'Dataset objek wisata, event budaya, dan potensi pariwisata di Kota Bekasi.',
                'category' => 'Pariwisata',
                'publisher' => 'Dinas Pariwisata dan Kebudayaan',
                'published_date' => '2024-02-01',
                'last_updated' => '2024-11-25',
                'download_count' => 423,
                'file_size' => '2.9 MB',
                'license' => 'Creative Commons Attribution 4.0',
                'tags' => ['pariwisata', 'budaya', 'wisata'],
                'fields' => [
                    ['name' => 'nama_objek', 'type' => 'String', 'description' => 'Nama objek wisata'],
                    ['name' => 'kategori', 'type' => 'String', 'description' => 'Kategori wisata'],
                    ['name' => 'alamat', 'type' => 'String', 'description' => 'Alamat lokasi'],
                    ['name' => 'jam_buka', 'type' => 'String', 'description' => 'Jam operasional'],
                    ['name' => 'harga_tiket', 'type' => 'Integer', 'description' => 'Harga tiket masuk'],
                    ['name' => 'fasilitas', 'type' => 'String', 'description' => 'Fasilitas yang tersedia']
                ],
                'sample_data' => [
                    ['nama_objek' => 'Taman Kota Bekasi', 'kategori' => 'Taman', 'alamat' => 'Jl. Ahmad Yani', 'jam_buka' => '06:00-18:00', 'harga_tiket' => 0, 'fasilitas' => 'Jogging track, playground, WiFi'],
                    ['nama_objek' => 'Museum Bekasi', 'kategori' => 'Museum', 'alamat' => 'Jl. Ir. H. Juanda', 'jam_buka' => '08:00-16:00', 'harga_tiket' => 5000, 'fasilitas' => 'Galeri, perpustakaan, auditorium'],
                    ['nama_objek' => 'Summarecon Mall Bekasi', 'kategori' => 'Mall', 'alamat' => 'Jl. Boulevard Ahmad Yani', 'jam_buka' => '10:00-22:00', 'harga_tiket' => 0, 'fasilitas' => 'Food court, bioskop, playground']
                ]
            ]
        ];
        
        $this->dataset = $datasets[$this->datasetId] ?? null;
    }
    
    public function loadRelatedDatasets()
    {
        // Data dummy untuk dataset terkait
        $this->relatedDatasets = [
            ['id' => 3, 'title' => 'Data Kesehatan Pesawaran', 'category' => 'Kesehatan', 'downloads' => 692],
            ['id' => 4, 'title' => 'Data Pendidikan Pesawaran', 'category' => 'Pendidikan', 'downloads' => 1045],
            ['id' => 5, 'title' => 'Data Transportasi Pesawaran', 'category' => 'Transportasi', 'downloads' => 423]
        ];
    }
    
    public function downloadDataset()
    {
        // Simulasi download
        $this->dispatch('show-notification', [
            'type' => 'success',
            'message' => "Dataset berhasil diunduh dalam format {$this->selectedFormat}!"
        ]);
        
        // Update download count
        if ($this->dataset) {
            $this->dataset['download_count']++;
        }
    }
    
    public function render()
    {
        return view('livewire.dataset-detail')
            ->layout('layouts.app')
            ->title($this->dataset ? $this->dataset['title'] : 'Dataset Detail');
    }
}
