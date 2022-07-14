@extends('layout.main')

@section('content')
<h1>Buku</h1>

@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="row">
    @foreach ($buku as $b)
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card" style="width: 20rem;">
                <img class="card-img-top" src="{{ env('APP_URL') . ':8000/storage/' . $b->foto }}" alt="{{ $b->judul }}" style="width: 20rem;height:15rem;">
                <div class="card-body">
                    @if($b->status == 'tersedia')
                        <span class="p-2 mb-2 badge bg-success">Tersedia</span>
                    @elseif($b->status == 'booking')
                        <span class="p-2 mb-2 badge bg-danger">Sedang Di Booking</span>
                    @else
                        <span class="p-2 mb-2 badge bg-secondary">Sedang Dipinjam</span>
                    @endif
                    <h5 class="card-title">{{ $b->judul }}</h5>
                    <p class="card-text">{{ substr($b->sinopsis, 0, 60) }}</p>
                    <a href="{{ route('user.buku.lihat', $b->id) }}" class="btn btn-primary mt-2">Lihat Buku</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection