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
                                <h1 class="h4 text-gray-900 mb-4">Daftar</h1>
                            </div>
                            <form class="user" action="{{ route('auth.register') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="name"
                                        class="form-control form-control-user @error('name') is-invalid @enderror"
                                        name="name" id="name" placeholder="Nama Lengkap" required value="{{ old('name')}}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input type="email"
                                        class="form-control form-control-user @error('email') is-invalid @enderror"
                                        name="email" id="email" placeholder="Email Address" required value="{{old('email')}}">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" class="form-control form-control-user" id="password"
                                        name="password" placeholder="Password" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Daftar
                                </button>

                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{ route('auth.login') }}">Punya akun? Login dong!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
