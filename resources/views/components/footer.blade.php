@push('styles')
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('js/footer.js') }}" defer></script>
@endpush

<!-- Footer Section -->
<section id="footer" class="footer-section">
    <div class="footer-container">
        <div class="footer-background">
            <!-- Logo Section -->
            <div class="footer-logo">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Pesawaran" class="footer-logo-img">
            </div>
            
            <!-- Contact Section -->
            <div class="footer-contact">
                <div class="contact-email">
                    opendata@pesawarankab.go.id
                </div>
                <div class="contact-phone">
                    +62811-720-2025
                </div>
            </div>
            
            <!-- Dataset Categories -->
            <div class="footer-dataset-section">
                <h3 class="footer-section-title">DataSet Kategori</h3>
                <ul class="footer-links">
                    <li><a href="#" class="footer-link">Industri</a></li>
                    <li><a href="#" class="footer-link">Pertanian</a></li>
                    <li><a href="#" class="footer-link">Ekonomi</a></li>
                    <li><a href="#" class="footer-link">Kemiskinan</a></li>
                </ul>
            </div>
            
            <!-- Article Categories -->
            <div class="footer-artikel-section">
                <h3 class="footer-section-title">Artikel Kategori</h3>
                <ul class="footer-links">
                    <li><a href="#" class="footer-link">Berita Hari ini</a></li>
                    <li><a href="#" class="footer-link">Seputar Pesawaran</a></li>
                    <li><a href="#" class="footer-link">Artikel Geografi</a></li>
                    <li><a href="#" class="footer-link">Kebijakan Pengguna</a></li>
                </ul>
            </div>
            
            <!-- Partners Section -->
            <div class="footer-partners-section">
                <h3 class="footer-section-title">Mitra Komunitas</h3>
                <img src="https://placehold.co/87x87" alt="Partner Logo" class="partner-logo">
            </div>
            
            <!-- Copyright -->
            <div class="footer-copyright">
                Copyright © Pesawaran Open Data 2025. All rights reserved | Versi 1.0.1
            </div>
        </div>
    </div>
</section>