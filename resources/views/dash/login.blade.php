@extends('lay-admin.main')

@section('admin')
    <div class="bg-primary" id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('auth_login') }}">
                                        @csrf
                                        @if (session()->has('login_error'))
                                            <div class="alert alert-danger text-center" role="alert">
                                                {{ session('login_error') }}
                                            </div>
                                        @endif
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul class="list-unstyled">
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="name" name="name" required autocomplete="on" type="name" placeholder="name" />
                                            <label for="name">Name</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" name="password" required type="password" placeholder="Password" />
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="/">Back to web</a>
                                            <button type="submit" name="login" class="btn btn-primary">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection