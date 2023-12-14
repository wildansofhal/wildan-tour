@extends('lay-admin.main')

@section('admin')
    @include('lay-admin.nav')    

{{-- Modal --}}
@foreach ($category as $item)
    @if ($item->id != 1)
    <form method="POST" action="{{ route('category.destroy' , $item->id) }}"  class="modal fade" id="category{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        @csrf
        @method('DELETE')
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ $item->title }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Delete</button>
                </div>
            </div>
        </div>
    </form>
    @endif
    
@endforeach
{{-- Modal --}}

                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <a href="{{ route('category.create') }}" class="btn btn-sm btn-dark">
                                <i class="fas fa-plus me-2"></i>Create
                            </a>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="datatablesSimple" class="display responsive nowrap" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Package</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($category as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><span class="line-2">{{ $item->title }}</span></td>
                                            <td class="">{{ $item->package->count() }}</td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('single_category' , $item->slug) }}" target="_blank" class="btn px-1 py-0 btn-dark">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    @if ($item->id != 1)
                                                        <a href="{{ route('category.edit' , $item->id) }}" class=" btn px-1 ms-2 py-0 btn-warning">
                                                            <i class="fa fa-pen-nib"></i>
                                                        </a>
                                                        <button data-bs-toggle="modal" data-bs-target="#category{{ $item->id }}" type="button" class=" btn px-1 ms-2 py-0 btn-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    @else
                                                        <button style="cursor: not-allowed" class="btn px-1 ms-2 py-0 btn-secondary">
                                                            <i class="fa fa-pen-nib"></i>
                                                        </button>
                                                        <button style="cursor: not-allowed" class="btn px-1 ms-2 py-0 btn-secondary">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>    
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    
@endsection
