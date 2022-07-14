@extends('layout.main')

@section('content')
<h1>List Peminjaman Buku</h1>

<div class="container-fluid p-1">
    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-primary mb-2" style="float:right;" data-bs-toggle="modal" data-bs-target="#verif-peminjaman">Verifikasi Peminjaman</button>
    </div>
</div>

<div class="table-responsive border px-2 py-4">
    <table class="table table-bordered table-hover table-striped " id="data-table">
        <thead style="background-color: #4e73df;">
            <tr class="text-light">
                <th scope="col">ID</th>
                <th scope="col">Nama Anggota</th>
                <th scope="col">Judul</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Kembali</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peminjaman as $pinjam)
            <tr>
                <td>{{ $pinjam->id }}</td>
                <td>{{ $pinjam->user->name }}</td>
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
                <td>
                    <a class="btn btn-primary mr-2" href="/admin/peminjaman/{{ $pinjam->id }}">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- Modal Verif Peminjaman --}}
<div class="modal fade" id="verif-peminjaman" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Verifikasi Peminjaman</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.peminjaman') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="status" class="col-form-label">Pilih ID Peminjaman: </label>
                        <select id="status" class="form-control" name="id" required>
                            <option value="" selected>Pilih ID Peminjaman</option>
                            @foreach ($booking as $p)
                                <option value="{{ $p->id }}"> {{ $p->id }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-form-label">Tanggal Kembali: </label>
                        <input type="date" id="tanggal_kembali" class="form-control" name="tanggal_kembali" required>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-form-label">Ubah Status: </label>
                        <select id="status" class="form-control" name="status" required>
                            <option value="" selected>Pilih Status</option>
                            <option value="dipinjam">Pinjamkan</option>
                        </select>
                    </div>
                    <button type="submit" style="float: right;" class="btn btn-primary">Kirim</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection