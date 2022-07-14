@extends('layout.main')

@section('content')
<h1>Buku</h1>
<div class="container-fluid p-1">
    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-primary mb-2" style="float:right;" data-bs-toggle="modal" data-bs-target="#tambahdatawali" data-whatever="Guru">Tambah Buku</button>
    </div>
</div>

<div class="table-responsive border px-2 py-4">
    <table class="table table-bordered table-hover table-striped " id="data-table">
        <thead style="background-color: #4e73df;">
            <tr class="text-light">
                <th scope="col">No</th>
                <th scope="col">Kode Buku</th>
                <th scope="col">Judul</th>
                <th scope="col">Penulis</th>
                <th scope="col">Kode Rak</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            @foreach ($buku as $b)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $b->kode_buku}}</td>    
                <td>{{ $b->judul}}</td> 
                <td>{{ $b->penulis}}</td>    
                <td>{{ $b->rak_buku->kode_rak}}</td>    
                <td>
                    <a class="btn btn-primary mr-2" href="/admin/edit-buku/{{ $b->id }}">Lihat</a>
                </td>  
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- MODAL TAMBAH BUKU --}}
<div class="modal fade" id="tambahdatawali" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.list-buku') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="kode_buku" class="col-form-label">Kode Buku:</label>
                        <input type="text" class="form-control" id="kode_buku" name="kode_buku" required>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-form-label">Rak Buku:</label>
                        <select id="status" class="form-control" name="kode_rak" required>
                            <option value="" selected>Pilih Nama Rak</option>
                            @foreach ($rak_buku as $rak)
                                <option value="{{ $rak->id }}"> {{ $rak->nama_rak }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="judul" class="col-form-label">Judul:</label>
                        <input type="text" class="form-control" id="judul" name="judul" required>
                    </div>
                    <div class="form-group">
                        <label for="sinopsis" class="col-form-label">Sinopsis:</label>
                        <input type="text" class="form-control" id="sinopsis" name="sinopsis" required>
                    </div>
                    <div class="form-group">
                        <label for="penulis" class="col-form-label">Penulis:</label>
                        <input type="text" class="form-control" id="penulis" name="penulis" required>
                    </div>
                    <div class="form-group">
                        <label for="denda" class="col-form-label">Denda:</label>
                        <input type="number" class="form-control" id="denda" name="denda" required>
                    </div>
                    <div class="form-group">
                        <label for="foto" class="col-form-label">Foto:</label>
                        <input type="file" class="form-control" id="foto" name="foto" required>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-form-label">Status:</label>
                        <select id="status" class="form-control" name="status" required>
                            <option value="" selected>Pilih Status</option>
                            <option value="Tersedia">Tersedia</option>
                            <option value="Dipinjam">Dipinjam</option>
                        </select>
                    </div>
                    <button type="submit" style="float: right;" class="btn btn-primary">Kirim</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection