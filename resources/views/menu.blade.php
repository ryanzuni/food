<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Menu Kategori: {{ $category }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Header / Navbar -->
     @include('layouts.navbar')

    <!-- Judul -->
    <h1>Menu Kategori: {{ $category }}</h1>

   <div class="food-list">
    @forelse ($foods as $index => $food)
        <div class="food-item">
            <img src="{{ $food->image ? asset('images/' . $food->image) : 'https://via.placeholder.com/240x160?text=No+Image' }}" alt="{{ $food->name }}">
            
            <div class="food-name">{{ $food->name }}</div>

            <div class="food-desc">
                <p id="desc-{{ $index }}" class="desc-text" data-expanded="false">
                    {{ Str::limit($food->description, 10) }}
                </p>

                @if (strlen($food->description) > 10)
                    <button class="read-more-toggle" onclick="toggleDesc({{ $index }}, '{{ e($food->description) }}')">
                        🍴 Baca Selengkapnya
                    </button>
                @endif

                <!-- Tombol + Pesan -->
                <button class="order-btn" onclick="addToCart('{{ $food->name }}')">
                    ➕ Pesan
                </button>
            </div>
        </div>
    @empty
        <p style="text-align: center; width: 100%;">Tidak ada menu tersedia untuk kategori ini.</p>
    @endforelse
</div>

<script>
    function toggleDesc(index, fullText) {
        const descEl = document.getElementById(`desc-${index}`);
        const btn = document.querySelector(`#desc-${index}`).nextElementSibling;

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
        // Nanti bisa diganti jadi tambah ke session, keranjang, dll
    }
</script>

</body>
</html>
