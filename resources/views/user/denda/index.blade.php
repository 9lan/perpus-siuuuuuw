@extends('layout.main')

@section('content')
<h1>List Denda</h1>

<div class="table-responsive border px-2 py-4">
    <table class="table table-bordered table-hover table-striped " id="data-table">
        <thead style="background-color: #4e73df;">
            <tr class="text-light">
                <th scope="col">ID</th>
                <th scope="col">Judul</th>
                <th scope="col">Tanggal Kembali</th>
                <th scope="col">Jumlah Hari</th>
                <th scope="col">Total Denda</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $dt)
            <tr>
                <td>{{ $dt->id }}</td>
                <td>{{ $dt->buku->judul }}</td>
                <td>{{ $dt->tanggal_kembali }}</td>
                <td>{{ $dt->jumlah_hari }}</td>
                <td>{{ $dt->total_denda }}</td>
                <td>{{ $dt->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection