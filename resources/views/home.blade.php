<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Categories</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
</head>
<body>

    <!-- Header / Navbar -->
    @include('layouts.navbar')

    <div class="banner-section">
    <div class="banner-slide active">
    <img src="{{ asset('images/promosi1.png') }}" alt="Diskon 10%">
    <div class="banner-text">Diskon 10%!</div>
</div>

    <div class="banner-slide">
        <img src="https://via.placeholder.com/1200x300?text=Restoran+Terdekat" alt="Restoran Terdekat">
        <div class="banner-text">Restoran Terdekat</div>
    </div>
    <div class="banner-slide">
        <img src="https://via.placeholder.com/1200x300?text=Rekomendasi+Untukmu" alt="Rekomendasi">
        <div class="banner-text">Rekomendasi Untukmu</div>
    </div>
</div>


    <!-- Daftar Kategori -->
    <h1 class="section-title">Daftar Kategori Makanan</h1>
    <div class="category-list">
        @foreach ($categories as $category)
            @if (!empty($category))
                <a href="{{ url('/menu/' . urlencode($category)) }}" class="category">
                    {{ $category }}
                </a>
            @endif
        @endforeach
    </div>

    <!-- Menu Diskon -->
    <h2 class="section-title">🎉 Menu Diskon 10%</h2>
    <div class="food-list">
        @forelse ($discountedFoods as $food)
            @if ($food->discount === 10)
                <div class="food-item">
                    <div class="discount-badge">10% OFF</div>
                    <img src="{{ $food->image ? asset('images/' . $food->image) : 'https://via.placeholder.com/200x160?text=No+Image' }}" alt="{{ $food->name }}">
                    <div class="food-name">{{ $food->name }}</div>
                    <div class="food-desc">{{ Str::limit($food->description, 50) }}</div>
                    <div class="food-price">
                        <span class="original-price">Rp{{ number_format($food->price, 0, ',', '.') }}</span>
                        <span class="discounted-price">Rp{{ number_format($food->price * 0.9, 0, ',', '.') }}</span>
                    </div>
                    <button class="order-btn" onclick="addToCart('{{ $food->name }}')">➕ Pesan</button>
                </div>
            @endif
        @empty
            <p style="text-align: center;">Belum ada menu diskon 10% saat ini.</p>
        @endforelse
    </div>

    <!-- Menu Terlaris -->
    <h2 class="section-title">🔥 Menu Paling Terlaris</h2>
    <div class="food-list">
        @forelse ($bestSellers as $index => $food)
            <div class="food-item">
                <img src="{{ $food->image ? asset('images/' . $food->image) : 'https://via.placeholder.com/200x160?text=No+Image' }}" alt="{{ $food->name }}">
                <div class="food-name">{{ $food->name }}</div>
                <div class="food-desc">
                    <p id="bestseller-desc-{{ $index }}" class="desc-text" data-expanded="false">
                        {{ Str::limit($food->description, 10) }}
                    </p>
                    @if (strlen($food->description) > 10)
                        <button class="read-more-toggle" onclick="toggleDesc('bestseller-desc-{{ $index }}', '{{ e($food->description) }}', this)">
                            🍴 Baca Selengkapnya
                        </button>
                    @endif
                    <button class="order-btn" onclick="addToCart('{{ $food->name }}')">➕ Pesan</button>
                    <div class="sold-count">🔥 Terjual: {{ $food->sold_count }}</div>
                </div>
            </div>
        @empty
            <p style="text-align: center;">Tidak ada data menu terlaris.</p>
        @endforelse
    </div>

    <!-- Script untuk toggle deskripsi -->
    <script>
        function toggleDesc(id, fullText, btn) {
            const descEl = document.getElementById(id);
            if (descEl.dataset.expanded === "true") {
                descEl.textContent = fullText.substring(0, 10) + "...";
                btn.textContent = "🍴 Baca Selengkapnya";
                descEl.dataset.expanded = "false";
            } else {
                descEl.textContent = fullText;
                btn.textContent = "🔙 Tampilkan Lebih Sedikit";
                descEl.dataset.expanded = "true";
            }
        }

        function addToCart(foodName) {
            alert(`✅ "${foodName}" berhasil ditambahkan ke pesanan!`);
        }

        let currentSlide = 0;
    const slides = document.querySelectorAll('.banner-slide');

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.toggle('active', i === index);
        });
    }

    setInterval(() => {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }, 4000); // ganti tiap 4 detik

    showSlide(currentSlide);
    </script>

</body>
</html>
