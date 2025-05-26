<!DOCTYPE html>
<html>
<head>
    <title>Food Categories</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #f8f9fa; }

        .category-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 40px;
        }
        .category {
            background-color: #28a745;
            color: white;
            padding: 20px 30px;
            border-radius: 10px;
            cursor: pointer;
            font-weight: bold;
            text-align: center;
            flex: 1 1 150px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: background-color 0.3s ease;
            text-decoration: none;
        }
        .category:hover {
            background-color: #218838;
        }

        h2.section-title {
            margin-top: 40px;
            margin-bottom: 20px;
            border-bottom: 2px solid #28a745;
            padding-bottom: 5px;
            color: #28a745;
        }

        .food-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .food-item {
            background: white;
            padding: 15px;
            border-radius: 10px;
            width: 200px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            text-align: center;
            cursor: default;
        }
        .food-item img {
            max-width: 100%;
            height: 120px;
            object-fit: cover;
            border-radius: 10px;
        }
        .food-name {
            font-weight: bold;
            margin: 10px 0 5px 0;
            font-size: 16px;
        }
        .food-desc {
            font-size: 13px;
            color: #555;
        }
        .sold-count {
            font-size: 12px;
            color: #888;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <h1>Daftar Kategori Makanan</h1>
    <div class="category-list">
        @foreach ($categories as $category)
            @if (!empty($category))
                <a href="{{ url('/menu/' . urlencode($category)) }}" class="category">
                    {{ $category }}
                </a>
            @endif
        @endforeach
    </div>
    <h2 class="section-title">Menu Sedang Diskon</h2>
    <div class="food-list">
        @forelse ($discountedFoods as $food)
            <div class="food-item">
                <img src="{{ $food->image ? asset('images/' . $food->image) : 'https://via.placeholder.com/200x120?text=No+Image' }}" alt="{{ $food->name }}">
                <div class="food-name">{{ $food->name }}</div>
                <div class="food-desc">{{ $food->description }}</div>
            </div>
        @empty
            <p>Tidak ada menu diskon saat ini.</p>
        @endforelse
    </div>

    <h2 class="section-title">Menu Paling Terlaris</h2>
    <div class="food-list">
        @forelse ($bestSellers as $food)
            <div class="food-item">
                <img src="{{ $food->image ? asset('images/' . $food->image) : 'https://via.placeholder.com/200x120?text=No+Image' }}" alt="{{ $food->name }}">
                <div class="food-name">{{ $food->name }}</div>
                <div class="food-desc">{{ $food->description }}</div>
                <div class="sold-count">Terjual: {{ $food->sold_count }}</div>
            </div>
        @empty
            <p>Tidak ada data menu terlaris.</p>
        @endforelse
    </div>
</body>
</html>
