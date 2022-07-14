@extends('layout.main')

@section('content')
    <div>
        @auth('admin')
        <h1>Hallo min, {{ auth()->user()->name }}</h1>
        @else
            @if(auth()->user()->is_verified == 0)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Akun anda belum diverifikasi. Silahkan hubungi Admin untuk dapat mengakses fitur-fitur lain.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <h1>Hallo user, {{ auth()->user()->name }}</h1>
        @endauth
    </div>
@endsection