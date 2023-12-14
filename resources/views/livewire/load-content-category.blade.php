<div>
    <div class="row">
        @if ($packages->count() > 0)
            @foreach ($packages as $item)
                @if ($loop->first)
                    <p class="lead fw-semibold">Showing {{ $loop->count }} of {{ $total }}</p>
                @endif
                <div class="col-12 col-md-6 col-xl-4 mb-4 position-relative"  {{ ($loop->iteration == ((floor($loop->count / $loopItem) - 1) * $loopItem ) + 1 ) ? 'id=new-data' : ''}} >
                    <div class="card h-100 overflow-hidden shadow-lg"> <img class="card-img-top my-img" src="{{ (Storage::exists($item->img)) ? asset('storage/' . $item->img) : asset('storage/upload/package/other.jpg') }}" alt="{{ $item->title }}" />
                        <div class="card-body d-flex flex-column justify-content-between py-4 px-3">
                        <div class="d-flex justify-content-between mb-1">
                            <h3 class="text-secondary fw-medium justify-content-between gap-2 d-flex w-100">
                            <p class="link-900 fs-1 fw-bold text-decoration-none line-3 mb-0">{{ $loop->iteration . '. '. $item->title }}</p>
                            <p class="fs-1 fw-medium text-nowrap">{{ mine()['dollar']($item->rate_from) }}</p>
                            </h3>
                        </div>
                        <div class="">
                            <div class="d-flex flex-column align-items-start">
                                <div class="fs--1 line-2 mb-2">{!! $item->overview !!}</div>
                                <div class="d-flex align-items-start">
                                    <img src="{{ asset('assets/img/dest/duration.png') }}" style="margin-right: 14px" width="20" alt="{{ mine()['title'] }}" />
                                    <span class="fs-0 fw-medium">Duration : {{ $item->duration }} Hours</span>
                                </div>
                            </div>
                            <a href="{{ route('single_package' , $item->slug ) }}" class="stretched-link booking mt-3 fw-bold"><i class="fs-3 me-3 fa fa-eye"></i> Read More...</a>
                        </div>
                        </div>
                    </div>
                </div>
                @if ($loop->last)
                    <p class="lead fw-semibold">Showing {{ $loop->count }} of {{ $total }}</p>
                @endif
            @endforeach
        @else
          <p class="text-danger text-center semua-rute fw-bold">Package not found !</p>                  
        @endif
      </div>
    <div class="d-flex justify-content-center align-items-center gap-3">
        @if ($loadItem < $total)
            <button class="btn btn-primary shadow-lg" wire:click="loadmore">Load More</button>
            <div wire:loading class="spinner-border" role="status">
                <span class="sr-only"></span>
            </div>
            <p wire:loading class="mb-0">Load {{ $loopItem }} ...</p>
        @endif
    </div>
    
</div>
