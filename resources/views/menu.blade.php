<!DOCTYPE html>
<html>
<head>
    <title>Menu Kategori: {{ $category }}</title>
</head>
<body>
    <h1>Menu Kategori: {{ $category }}</h1>

    @foreach ($foods as $food)
        <div>
            <h3>{{ $food->name }}</h3>
            <p>{{ $food->description }}</p>
        </div>
    @endforeach

    <a href="{{ route('home') }}">← Kembali ke Beranda</a>
</body>
</html>
