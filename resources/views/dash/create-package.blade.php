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
                        <form enctype="multipart/form-data" action="{{ route('package.store') }}" method="POST" class="card-body">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Title</label>
                                <input type="text" name="title" required class="form-control" id="exampleFormControlInput1" placeholder="Title Package">
                            </div>
                            <div class="mb-3">
                                <label for="select-category" class="form-label">Category</label>
                                <select class="form-select" required name="category_id" id="select-category"  aria-label="Default select example">
                                    <option value="" selected>Select Category</option>
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                    @endforeach
                                  </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput2" class="form-label">Image</label>
                                <input type="file" name="img" required class="form-control" id="exampleFormControlInput2" placeholder="Image">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput3" class="form-label">Rate From</label>
                                <div class="input-group">    
                                    <span class="input-group-text" id="basic-addon1">&dollar;</span>
                                    <input type="number" step="0.01" name="rate_from" required class="form-control" id="exampleFormControlInput3" placeholder="Rate From in Dollar">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput4" class="form-label">Duration</label>
                                <div class="input-group">    
                                    <span class="input-group-text" id="basic-addon1">
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="15" height="15" viewBox="0 0 50 50">
                                            <path d="M 25 2 C 12.309295 2 2 12.309295 2 25 C 2 37.690705 12.309295 48 25 48 C 37.690705 48 48 37.690705 48 25 C 48 12.309295 37.690705 2 25 2 z M 25 4 C 36.609824 4 46 13.390176 46 25 C 46 36.609824 36.609824 46 25 46 C 13.390176 46 4 36.609824 4 25 C 4 13.390176 13.390176 4 25 4 z M 24.984375 6.9863281 A 1.0001 1.0001 0 0 0 24 8 L 24 22.173828 A 3 3 0 0 0 22 25 A 3 3 0 0 0 22.294922 26.291016 L 16.292969 32.292969 A 1.0001 1.0001 0 1 0 17.707031 33.707031 L 23.708984 27.705078 A 3 3 0 0 0 25 28 A 3 3 0 0 0 28 25 A 3 3 0 0 0 26 22.175781 L 26 8 A 1.0001 1.0001 0 0 0 24.984375 6.9863281 z">
                                            </path>
                                        </svg>
                                    </span>
                                    <input type="number" name="duration" required class="form-control" id="exampleFormControlInput4" placeholder="Duration in Hour">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput5" class="form-label">Overview</label>
                                <textarea class="ckeditor" name="overview" id="exampleFormControlInput5">
                                </textarea>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput6" class="form-label">Table Price
                                </label>
                                <textarea name="table_price" class="ckeditor" id="exampleFormControlInput6">
                                </textarea>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput7" class="form-label">Include of</label>
                                <textarea name="include" class="ckeditor" id="exampleFormControlInput7">
                                </textarea>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput8" class="form-label">Exclude of</label>
                                <textarea name="exclude" class="ckeditor" id="exampleFormControlInput8">
                                </textarea>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput9" class="form-label">Important</label>
                                <textarea name="important" class="ckeditor" id="exampleFormControlInput9">
                                </textarea>
                            </div>
                            <button type="submit" name="create-package" class="btn btn-primary mt-3">Create</button>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
    
@endsection
