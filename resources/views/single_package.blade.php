@extends('lay-user.main')

@section('user')

  <section class="pt-7 my-heroes">
    <div class="container"> 
      <div class="px-4 py-5 my-5 text-center">
        <h1 class="hero-title tour">Package {{ $package->title }}</h1>
        <div class="col-lg-6 mx-auto">
          <p class="mb-4">{{ $desc }}</p>
          <div class="d-flex justify-content-center flex-wrap gap-3">
            <a href="{{ route('tour') }}" class="btn btn-primary btn-lg">Tour</a>
            <a href="https://api.whatsapp.com/send/?phone=6282115040168&text=Halo%20Admin%0Ahttp://127.0.0.1:8000&type=phone_number&app_absent=0" target="_blank" class="btn btn-outline-success btn-lg">Booking</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f5f5f5c7" fill-opacity="1" d="M0,160L12,165.3C24,171,48,181,72,176C96,171,120,149,144,170.7C168,192,192,256,216,245.3C240,235,264,149,288,133.3C312,117,336,171,360,165.3C384,160,408,96,432,101.3C456,107,480,181,504,192C528,203,552,149,576,117.3C600,85,624,75,648,64C672,53,696,43,720,48C744,53,768,75,792,90.7C816,107,840,117,864,133.3C888,149,912,171,936,197.3C960,224,984,256,1008,261.3C1032,267,1056,245,1080,218.7C1104,192,1128,160,1152,165.3C1176,171,1200,213,1224,213.3C1248,213,1272,171,1296,149.3C1320,128,1344,128,1368,133.3C1392,139,1416,149,1428,154.7L1440,160L1440,0L1428,0C1416,0,1392,0,1368,0C1344,0,1320,0,1296,0C1272,0,1248,0,1224,0C1200,0,1176,0,1152,0C1128,0,1104,0,1080,0C1056,0,1032,0,1008,0C984,0,960,0,936,0C912,0,888,0,864,0C840,0,816,0,792,0C768,0,744,0,720,0C696,0,672,0,648,0C624,0,600,0,576,0C552,0,528,0,504,0C480,0,456,0,432,0C408,0,384,0,360,0C336,0,312,0,288,0C264,0,240,0,216,0C192,0,168,0,144,0C120,0,96,0,72,0C48,0,24,0,12,0L0,0Z"></path></svg>

  <article id="package" class="mb-5">
    <div class="container">
      <div class="position-absolute start-100 bottom-0 translate-middle-x d-none d-xl-block ms-xl-n4"><img src="{{ asset('assets/img/dest/shape.svg') }}" alt="{{ mine()['title'] }}" /></div>
      <div class="row">
        <div class="z-index-1 col-lg-8 pe-lg-5">
          <h2 class="fs-xl-8 fs-lg-6 fs-4 fw-bold mb-0 font-cursive text-capitalize">{{ $package->title }}</h2>
        </div>
      </div>
      <div class="row" id="desc">
        <div class="z-index-1 col-lg-8 mb-5 pe-lg-5">
          <div class="mb-4 text-start">
            <img src="{{ ($package->img) ? asset('storage/' . $package->img) : asset('storage/upload/package/other.jpg') }}" class="shadow-sm my-img my-2 rounded-1" alt="{{ $package->title }}">
            <div class="my-4 my-lg-6">
              <div class="d-flex mb-1 align-items-start">
                <img src="{{ asset('assets/img/dest/duration.png') }}" style="margin-right: 14px" width="20" alt="{{ mine()['title'] }}" />
                <span class="fs-0 fw-medium">Duration : {{ $package->duration }} Hours</span>
              </div>
              <div class="d-flex mb-1 align-items-start">
                <img src="{{ asset('assets/img/dest/money.png') }}" style="margin-right: 14px" width="20" alt="{{ mine()['title'] }}" />
                <span class="fs-0 fw-medium">Rate From : {{ mine()['dollar']($package->rate_from) }}</span>
              </div>
              <div class="d-flex mb-1 align-items-start">
                <img src="{{ asset('assets/img/dest/category.png') }}" style="margin-right: 14px" width="20" alt="{{ mine()['title'] }}" />
                <span class="fs-0 fw-medium">
                  <a class="link-primary" href="{{ route('single_category' , $package->category->slug) }}">Cat : {{ $package->category->title }}</a>
                </span>
              </div>
            </div>
          </div>
          <hr class="my-5 my-lg-7">
          <div class="overview">
            <h3 class="text-decoration-underline">Overview</h3>
            {!! $package->overview !!}
          </div>
          <hr class="my-5 my-lg-7">
          <div class="price">
            <h3 class="text-decoration-underline">Table Price</h3>
            {!! $package->table_price !!}
          </div>
          <hr class="my-5 my-lg-7">
          <div class="include">
            <h3 class="text-decoration-underline">Include Of</h3>
            {!! $package->include !!}
          </div>
          <hr class="my-5 my-lg-7">
          <div class="exclude">
            <h3 class="text-decoration-underline">Exclude Of</h3>
            {!! $package->exclude !!}
          </div>
          <hr class="my-5 my-lg-7">
          <div class="important">
            <h3 class="text-decoration-underline">Important</h3>
            {!! $package->important !!}
          </div>
          <hr class="my-5 my-lg-7">
        </div>
        <div class="z-index-1 col-lg-4 ps-lg-5">
          <div class="latest">
            <h4 class="text-secondary fw-medium fs-0 mb-3">Latest Package</h4>
            <div class="row flex-column flex-md-row">
              @foreach ($packages->sortByDesc('id')->take(3) as $item)
              <div class="col-md-4 col-lg-12">
                <div class="p-3 mb-4 shadow-sm my-rounded">
                  <div class="card flex-row flex-md-column flex-lg-row">
                    <div class="col-4 col-md-12 col-lg-4">
                      <img src="{{ (Storage::exists($item->img)) ? asset('storage/' . $item->img) : asset('storage/upload/package/other.jpg') }}" class="my-rounded my-img" alt="{{ $item->title }}">
                    </div>
                    <div class="card-body pt-0 pt-md-3 pt-lg-0 pe-0 pe-md-3 pe-lg-0 pb-0 d-flex justify-content-between flex-column">
                      <h5 class="card-title fs--1 line-1 mb-0 link-primary fw-medium">{{ $item->title }}</h5>
                      <div class="card-text mb-0 fs--2 line-1 text-secondary">{!! $item->overview !!}</div>
                      <a href="{{ route('single_package' , $item->slug) }}" class="fs--2 text-primary stretched-link">Read More..</a>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
          <hr class="my-5 my-lg-7">
          <div class="latest">
            <h4 class="text-secondary fw-medium fs-0 mb-3">Category Random</h4>
            <div class="row flex-column flex-md-row">
              @foreach ($category->take(3) as $item)
              <div class="col-md-4 col-lg-12 mb-4">
                <div class="border-start border-2 {{ ($loop->even) ? 'border-danger' : 'border-success' }}">
                  <div class="card flex-row flex-md-column flex-lg-row ps-3">
                    <div class="col-4 col-md-12 col-lg-4">
                      <img src="{{ (Storage::exists($item->img)) ? asset('storage/' . $item->img) : asset('storage/upload/category/other.jpg') }}" class="my-rounded my-img" alt="{{ $item->title }}">
                    </div>
                    <div class="card-body pt-0 pt-md-3 pt-lg-0 pe-0 pe-md-3 pe-lg-0 pb-0 d-flex justify-content-between flex-column">
                      <h5 class="card-title fs--1 line-1 mb-0 link-primary fw-medium">{{ $item->title }}</h5>
                      <div class="card-text mb-0 fs--2 line-1 text-secondary">Package(s) {{ $item->package->count() }}</div>
                      <a href="{{ route('single_category' , $item->slug) }}" class="fs--2 text-primary stretched-link">Read More..</a>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            <a class="btn-outline-success btn" href="{{ route('tour') }}#category">All Category...</a>
          </div>
          <hr class="my-5 my-lg-7">
          <div class="oldest">
            <h4 class="text-secondary fw-medium fs-0 mb-3">Oldest Package</h4>
            <div class="row flex-column flex-md-row">
              @foreach ($packages->take(3) as $item)
              <div class="col-md-4 col-lg-12">
                <div class="p-3 mb-4 shadow-sm my-rounded">
                  <div class="card flex-row flex-md-column flex-lg-row">
                    <div class="col-4 col-md-12 col-lg-4">
                      <img src="{{ (Storage::exists($item->img)) ? asset('storage/' . $item->img) : asset('storage/upload/package/other.jpg') }}" class="my-rounded my-img" alt="{{ $item->title }}">
                    </div>
                    <div class="card-body pt-0 pt-md-3 pt-lg-0 pe-0 pe-md-3 pe-lg-0 pb-0 d-flex justify-content-between flex-column">
                      <h5 class="card-title fs--1 line-1 mb-0 link-primary fw-medium">{{ $item->title }}</h5>
                      <div class="card-text mb-0 fs--2 line-1 text-secondary">{!! $item->overview !!}</div>
                      <a href="{{ route('single_package' , $item->slug) }}" class="fs--2 text-primary stretched-link">Read More..</a>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
          <hr class="my-5 my-lg-7">
        </div>
      </div>
    </div>
  </article> 


@endsection