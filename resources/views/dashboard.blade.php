@extends('layout.main')

@section('content')
    <div>
        @auth('admin')
            <h1>Hallo min, {{ auth()->user()->name }}</h1>
            <div class="row">

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total Pengunjung Hari Ini
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pengunjung_hari_ini }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Total Pengunjung Bulan Ini</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pengunjung_bulan_ini }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Total Buku
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_buku }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Total Anggota
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_anggota }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-xl-6 col-lg-6">
                    <div class="card shadow mb-4">
                        <!-- Project Card Example -->
                        <div class="card shadow ">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Buku Terpopuler</h6>
                            </div>
                            <div class="card-body">
                                @foreach($buku as $b)
                                <div class="col-xl-12 col-md-12 mb-2">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="text-s font-weight-bold text-primary text-uppercase mb-1">
                                                            {{ $b->judul }}
                                                        </div>
                                                        <div class="text-s font-weight-bold text-success text-uppercase mb-1">
                                                            {{ $b->penulis }}
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $b->total_terpinjam }}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        @endauth
    </div>
@endsection