@extends('layout.main')

@section('content')
<h1>List Anggota</h1>

<div class="container-fluid p-1">
    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-primary mb-2" style="float:right;" data-bs-toggle="modal" data-bs-target="#verif-anggota">Verif Anggota</button>
    </div>
</div>

<div class="table-responsive border px-2 py-4">
    <table class="table table-bordered table-hover table-striped " id="data-table">
        <thead style="background-color: #4e73df;">
            <tr class="text-light">
                <th scope="col">ID</th>
                <th scope="col">Nama Anggota</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($anggota as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->is_verified == 1 ? 'Aktif' : 'Non Aktif' }}</td>
                <td>
                    <a class="btn btn-primary mr-2" href="{{ route('admin.anggota.view', $user->id) }}">Lihat</a>
                </td>  
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- Modal Verif Anggota --}}
<div class="modal fade" id="verif-anggota" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Verif Anggota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.anggota') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="status" class="col-form-label">Nama Anggota: </label>
                        <select id="status" class="form-control" name="id" required>
                            <option value="" selected>Pilih Nama Anggota</option>
                            @foreach ($unverified as $user)
                                <option value="{{ $user->id }}"> {{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" style="float: right;" class="btn btn-primary">Kirim</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection