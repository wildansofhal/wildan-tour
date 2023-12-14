@extends('lay-admin.main')

@section('admin')
    @include('lay-admin.nav')    

                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-plus me-1"></i>
                                Edit {{ $page }}
                            </div>
                        </div>
                        <form enctype="multipart/form-data" action="{{ route('category.update' , $category->id)}}" method="POST" class="card-body">
                            <h5>{{ $category->title  }}</h5> 
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Title</label>
                                <input type="text" value="{{ $category->title }}" name="title" required class="form-control" id="exampleFormControlInput1" placeholder="Title Category">
                            </div>
                            @if(Storage::exists($category->img))
                            <div class="mb-3">
                                <label for="exampleFormControlInput2" class="form-label d-block">Image</label>
                                <input type="hidden" value="{{ $category->img }}" name="old_img" required class="form-control" id="exampleFormControlInput2" placeholder="Title Category">
                                <img src="{{asset('storage/' . $category->img)}}" alt="{{ $category->title }}" class="rounded preview-img">
                            </div>
                            @endif
                            <div class="mb-3">
                                <label for="exampleFormControlInput2" class="form-label">Change Image</label>
                                <input type="file" name="img" {{ (Storage::exists($category->img)) ? '' : 'required' }} class="form-control" id="exampleFormControlInput2" placeholder="Image">
                            </div>
                            <button type="submit" name="create-category" class="btn btn-primary mt-3">Edit</button>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
    
@endsection
