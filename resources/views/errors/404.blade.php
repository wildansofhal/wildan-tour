@extends('lay-user.main' , [
    'title'  => 'Not Found - ' . mine()['longTitle'],
    'desc'  => 'Not Found - ' . mine()['longTitle'],
])

@section('user')

  <section class="pt-7 pt-lg-10">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="d-flex align-items-center flex-column mt-4">
                    <div class="img-not-found">
                        <img class="mb-4 w-100" src="{{ asset('admin/assets/img/error-404-monochrome.svg') }}" alt="not found">
                    </div>
                    <p class="fs--1 text-center">This requested URL was not found on this server.</p>
                    <div class="d-flex gap-4">
                        <a class="primary-link text-primary" href="/">
                            <svg class="svg-inline--fa fa-arrow-left fa-w-14 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z"></path></svg><!-- <i class="fas fa-arrow-left me-1"></i> Font Awesome fontawesome.com -->
                            Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>

@endsection