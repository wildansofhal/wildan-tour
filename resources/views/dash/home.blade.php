@extends('lay-admin.main')

@section('admin')
    @include('lay-admin.nav')    

                    <div class="row">
                        <div class="py-3 text-center">
                            <img class="d-block mx-auto mb-4" src="{{ asset('assets/img/icons/logo.jpeg') }}" alt="logo {{ mine()['title'] }}" width="106" height="auto">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card mb-4">
                                <div class="card-body">Category ({{ $category->count() }})</div>
                                <div class="bg-primary card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="{{ route('category.index') }}">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card mb-4">
                                <div class="card-body">Package ({{ $package->count() }})</div>
                                <div class="card-footer bg-warning d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="{{ route('package.index') }}">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection