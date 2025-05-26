@extends('layouts.app')

@section('content')
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold">Selamat Datang di Web Food</h1>
        <p class="lead">Temukan berbagai makanan lezat dari seluruh Indonesia!</p>
    </div>

    <div class="row">
        @forelse($foods as $food)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow">
                    @if($food->image)
                        <img src="{{ asset('storage/' . $food->image) }}" class="card-img-top" alt="{{ $food->name }}">
                    @else
                        <img src="https://via.placeholder.com/350x200?text=Food+Image" class="card-img-top" alt="Makanan">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $food->name }}</h5>
                        <p class="card-text">{{ $food->description }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada data makanan tersedia.</p>
            </div>
        @endforelse
    </div>
@endsection
