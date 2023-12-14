@extends('lay-user.main')

@section('user')

  <section class="pt-7 my-heroes">
    <div class="container"> 
      <div class="px-4 py-5 my-5 text-center">
        <h1 class="hero-title tour">Category {{ $category->title }}</h1>
        <div class="col-lg-6 mx-auto">
          <p class="mb-4">{{ $desc }}</p>
          <div class="d-flex justify-content-center flex-wrap gap-3">
            <a href="/" class="btn btn-primary btn-lg">Home</a>
            <a href="{{ route('tour') }}" class="btn btn-outline-primary btn-lg">Tour</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f5f5f5c7" fill-opacity="1" d="M0,160L12,165.3C24,171,48,181,72,176C96,171,120,149,144,170.7C168,192,192,256,216,245.3C240,235,264,149,288,133.3C312,117,336,171,360,165.3C384,160,408,96,432,101.3C456,107,480,181,504,192C528,203,552,149,576,117.3C600,85,624,75,648,64C672,53,696,43,720,48C744,53,768,75,792,90.7C816,107,840,117,864,133.3C888,149,912,171,936,197.3C960,224,984,256,1008,261.3C1032,267,1056,245,1080,218.7C1104,192,1128,160,1152,165.3C1176,171,1200,213,1224,213.3C1248,213,1272,171,1296,149.3C1320,128,1344,128,1368,133.3C1392,139,1416,149,1428,154.7L1440,160L1440,0L1428,0C1416,0,1392,0,1368,0C1344,0,1320,0,1296,0C1272,0,1248,0,1224,0C1200,0,1176,0,1152,0C1128,0,1104,0,1080,0C1056,0,1032,0,1008,0C984,0,960,0,936,0C912,0,888,0,864,0C840,0,816,0,792,0C768,0,744,0,720,0C696,0,672,0,648,0C624,0,600,0,576,0C552,0,528,0,504,0C480,0,456,0,432,0C408,0,384,0,360,0C336,0,312,0,288,0C264,0,240,0,216,0C192,0,168,0,144,0C120,0,96,0,72,0C48,0,24,0,12,0L0,0Z"></path></svg>

  <section id="package">

    <div class="container">
      <div class="position-absolute start-100 bottom-0 translate-middle-x d-none d-xl-block ms-xl-n4"><img src="{{ asset('assets/img/dest/shape.svg') }}" alt="{{ mine()['title'] }}" /></div>
      <div class="mb-7 text-center">
        <span class="text-secondary fw-bold">With a tour guide</span>
        <h2 class="fs-xl-8 fs-lg-6 fs-4 fw-bold font-cursive text-capitalize">Tour and Travel Package</h2>
        <p class="text-danger">* We offer a variety of travel packages that are specifically designed to meet your vacation needs, ranging from cultural tours, culinary tours, to challenging adventure activities.
        </p>
      </div>
        {{-- @livewire('load-content-category', ['package' => $package], key($package->slug)) --}}
        @livewire('load-content-category' , ['package' => $package])
    </div><!-- end of .container-->

  </section> 


@endsection