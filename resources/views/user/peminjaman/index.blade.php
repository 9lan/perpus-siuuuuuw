@extends('layout.main')

@section('content')
<h1>List Peminjaman Buku</h1>

<div class="table-responsive border px-2 py-4">
    <table class="table table-bordered table-hover table-striped " id="data-table">
        <thead style="background-color: #4e73df;">
            <tr class="text-light">
                <th scope="col">ID</th>
                <th scope="col">Judul</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Kembali</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peminjaman as $pinjam)
            <tr>
                <td>{{ $pinjam->id }}</td>
                <td>{{ $pinjam->buku->judul }}</td>
                <td>{{ $pinjam->tanggal_pinjam }}</td>
                <td>{{ $pinjam->tanggal_kembali ?? '-' }}</td>
                <td>
                    @if($pinjam->status == 'booking')
                        <span class="p-2 badge badge-warning">Booking</span>
                    @elseif($pinjam->status == 'dipinjam')
                        <span class="p-2 badge badge-success">Dipinjam</span>
                    @else
                        <span class="p-2 badge badge-danger">Dikembalikan</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection