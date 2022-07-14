@extends('layout.main')

@section('content')
<div class="col-xl-7 col-lg-7">
    <div class="mb-4">
        <!-- Card Header - Dropdown -->
        <div class="py-3">
            <h1 class="m-0 mb-3 font-weight-bold text-primary">{{ $data->judul }}</h1>
            <img class="d-block mb-3" src="{{ env('APP_URL') . ':8000/storage/' . $data->foto }}" alt="{{ $data->judul }}" width="100px" height="100px">
            <h5>By: {{ $data->penulis }}</h5>
            <p>{{ $data->sinopsis }}</p>
            @if($data->status == 'tersedia')
                <form action="{{ route('user.buku.pinjam', $data->id) }}" method="POST" >
                    @csrf
                    <input type="text" hidden name="status" value="booking">
                    <button type="submit" class="btn btn-primary mt-2">Pinjam Buku</button>
                </form>
            @else
                <button disabled class="btn btn-secondary mt-2">Buku Sedang Dipinjam</button>
            @endif
        </div>

    </div>
</div>
@endsection