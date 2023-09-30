@extends('layout.main')

@section('content')
<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Login</h1>
                        </div>
                        @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        @if(session()->has('login_error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('login_error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <form class="user" action="{{ route('auth.login') }}" method="POST" >
                            @csrf
                            <div class="form-group mb-3">
                                <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" id="email"
                                    placeholder="Email Address">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" class="form-control form-control-user"
                                    id="password" name="password" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Login
                            </button>
                            
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="{{ route('auth.register') }}">Gapunya akun? Daftar dong!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection