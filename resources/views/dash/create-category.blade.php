@extends('lay-admin.main')

@section('admin')
    @include('lay-admin.nav')    

                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-plus me-1"></i>
                                Create {{ $page }}
                            </div>
                        </div>
                        <form enctype="multipart/form-data" action="{{ route('category.store') }}" method="POST" class="card-body">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Title</label>
                                <input type="text" name="title" required class="form-control" id="exampleFormControlInput1" placeholder="Title Category">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput2" class="form-label">Image</label>
                                <input type="file" name="img" required class="form-control" id="exampleFormControlInput2" placeholder="Image">
                            </div>
                            <button type="submit" name="create-category" class="btn btn-primary mt-3">Create</button>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
    
@endsection
