@extends('lay-user.main')

@section('user')

  <section class="pt-7">
    <div class="bg-holder">
    </div>
    <div class="container">
      <div class="row mt-md-3 justify-content-center align-items-center">
        <div class="col-9 col-md-5 col-lg-6 order-0 order-md-1 text-center">
          
        </div>
        <div class="col-md-7 col-lg-6 text-md-start text-center py-6">
          <span class="fw-bold fs-3 text-danger mb-3">{{ mine()['slogan'] }}</span>
          <h1 class="hero-title">WILDAN TOUR</h1>
          <p class="mb-4 fw-medium">{{ mine()['longTitle'] }} ! What better way to explore the beauty and hidden secrets of this island than to tour with a local ! As well as the cheapest and best package prices in Bali !
          <div class="d-flex justify-content-center justify-content-md-start flex-wrap gap-3">
            <a class="btn btn-primary btn-lg shadow-sm" target="_blank" href="https://api.whatsapp.com/send/?phone=6282115040168&text=Halo%20Admin%0Ahttp://127.0.0.1:8000&type=phone_number&app_absent=0" role="button">082115040168</a>
            <a class="btn btn-outline-primary btn-lg shadow-sm" href="{{ route('tour') }}">Tour</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="pt-5" id="category">

    <div class="container">
      <div class="position-absolute start-100 bottom-0 translate-middle-x d-none d-xl-block ms-xl-n4">
        <img src="{{ asset('assets/img/dest/shape.svg') }}" alt="{{ mine()['title'] }}" />
      </div>
      <div class="mb-7 text-center">
        <span class="text-secondary fw-bold">With a tour guides</span>
        <h2 class="fs-xl-8 fs-lg-6 fs-4 fw-bold font-cursive text-capitalize">Tour And Travel Category</h2>
        <p class="text-danger">* Discover the best of Bali with our Travel and Tour Services category. Our team of experienced travel specialists are dedicated to creating personalized travel itineraries that cater to your unique interests and needs.</p>
      </div>
      @if ($category->count() > 0)
        <div class="swiper" id="swiper-category">
          <div class="swiper-wrapper my-2 mb-5">
            @foreach ($category as $item)
              <div class="swiper-slide">
                <img src="{{ ($item) ? asset('storage/' . $item->img) : asset('storage/upload/category/other.jpg') }}" class="shadow-sm my-img rounded-1" alt="{{ $item->title }}">
                <h3>
                  <a href="{{ route('single_category' , $item->slug ) }}" class="fs--1 stretched-link line-3 link-primary text-decoration-underline">{{ $item->title }} 
                  </a>
                  <span class="d-block fs--1 link-primary">( {{ $item->package->count() }} )</span>
                </h3>
              </div>
            @endforeach
          </div>
          <div class="swiper-pagination"></div>
          <div class="p-3 btn btn-light button-swiper swiper-button-next" id="next-category"></div>
          <div class="p-3 btn btn-light button-swiper swiper-button-prev" id="prev-category"></div>
        </div>
      @else
        <p class="text-danger text-center semua-rute fw-bold">Category not found !</p>                  
      @endif
    </div><!-- end of .container-->
  </section>
  
  <section class="pt-md-9" id="service">

    <div class="container">
      <div class="position-absolute z-index--1 end-0 d-none d-lg-block"><img src="{{ asset('assets/img/service/shape.svg') }}" style="max-width: 200px" alt="{{ mine()['title'] }}" /></div>
      <div class="mb-7 text-center">
        <span class="text-secondary fw-bold">Services</span>
        <h2 class="fs-xl-8 fs-lg-6 fs-4 fw-bold font-cursive text-capitalize">Why should {{ mine()['longTitle'] }}
        </h2>
      </div>
      <div class="row justify-content-center">
        <div class="col-12 col-sm-6 col-xl-4 mb-4">
          <div class="card service-card h-100 shadow-hover rounded-3 text-center align-items-center">
            <div class="card-body h-100 p-xxl-5 p-4"> <img src="{{ asset('assets/img/service/true.png') }}" width="75" alt="Easy Ordering" />
              <h3 class="mb-3 mt-1">Easy Ordering</h3>
              <p class="mb-0 fw-medium">The process of ordering tour and travel packages is quite easy, just call or chat to our contact.
              </p>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-4 mb-4">
          <div class="card service-card h-100 shadow-hover rounded-3 text-center align-items-center">
            <div class="card-body h-100 p-xxl-5 p-4"> <img src="{{ asset('assets/img/service/money.png') }}" width="75" alt="Cheap Price" />
              <h3 class="mb-3 mt-1">Cheap Price
              </h3>
              <p class="mb-0 fw-medium">We guarantee that the rates we offer are relatively cheap and competitive.</p>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-4 mb-4">
          <div class="card service-card h-100 shadow-hover rounded-3 text-center align-items-center">
            <div class="card-body h-100 p-xxl-5 p-4"> <img src="{{ asset('assets/img/service/security.png') }}" width="75" alt="Tourist Convenience" />
              <h3 class="mb-3 mt-1">Tourist Convenience
              </h3>
              <p class="mb-0 fw-medium">We increase security and comfort for our service users. Such as travel, food and hotels.</p>
            </div>
          </div>
        </div>
      </div>
    </div><!-- end of .container-->

  </section>

  <section class="pt-5" id="package">

    <div class="container">
      <div class="position-absolute start-100 bottom-0 translate-middle-x d-none d-xl-block ms-xl-n4"><img src="{{ asset('assets/img/dest/shape.svg') }}" alt="{{ mine()['title'] }}" /></div>
      <div class="mb-7 text-center">
        <span class="text-secondary fw-bold">With a tour guide</span>
        <h2 class="fs-xl-8 fs-lg-6 fs-4 fw-bold font-cursive text-capitalize">Tour and Travel Package</h2>
        <p class="text-danger">* We offer a variety of travel packages that are specifically designed to meet your vacation needs, ranging from cultural tours, culinary tours, to challenging adventure activities.
        </p>
      </div>
      <div class="row">
        @if ($package->count() > 0)
          @foreach ($package as $item)
            <div class="col-12 col-md-6 col-xl-4 mb-4 position-relative">
              <div class="card h-100 overflow-hidden shadow-lg"> <img class="card-img-top my-img" src="{{ ($item->img) ? asset('storage/' . $item->img) : asset('storage/upload/package/other.jpg') }}" alt="{{ $item->title }}" />
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
                      <div class="d-flex align-items-start">
                        <img src="{{ asset('assets/img/dest/category.png') }}" style="margin-right: 14px" width="20" alt="{{ mine()['title'] }}" />
                        <span class="fs-0 fw-medium line-1">Cat : {{ $item->category->title }}</span>
                      </div>
                    </div>
                    <a href="{{ route('single_package' , $item->slug ) }}" class="stretched-link booking mt-3 fw-bold"><i class="fs-3 me-3 fa fa-eye"></i> Read More...</a>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        @else
          <p class="text-danger text-center semua-rute fw-bold">Package not found !</p>                  
        @endif
      </div>
      <div class="text-center mt-2">
        <a href="{{ route('tour') }}#package" class="shadow-lg btn btn-outline-success">All packages...</a>
      </div>
    </div><!-- end of .container-->

  </section>

  <section id="pesan">

    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="mb-4 text-start">
            <span class="text-secondary fw-bold">Mudah dan Cepat, dijamin puas</span>
            <h3 class="fs-xl-8 fs-lg-6 fs-4 fw-bold font-cursive text-capitalize">Booking Your Tour</h3>
          </div>
          <div class="d-flex align-items-start mb-5">
            <div class="bg-primary me-sm-4 me-3 p-3" style="border-radius: 13px"> <img src="{{ asset('assets/img/steps/selection.svg') }}" width="22" alt="{{ mine()['title'] }}" /></div>
            <div class="flex-1">
              <h4 class="text-secondary fw-bold fs-0">Find Your Tour Package</h4>
              <p>Find your favorite place.<br class="d-none d-sm-block">A place where you feel comfortable and happy.</p>
            </div>
          </div>
          <div class="d-flex align-items-start mb-5">
            <div class="bg-danger me-sm-4 me-3 p-3" style="border-radius: 13px"> <img src="{{ asset('assets/img/steps/water-sport.svg') }}" width="22" alt="{{ mine()['title'] }}" /></div>
            <div class="flex-1">
              <h4 class="text-secondary fw-bold fs-0">Contact admin</h4>
              <p>After finding the perfect place. <br class="d-none d-sm-block">Contact admin via whatsapp, to send tourist data and ask for payment methods.</p>
            </div>
          </div>
          <div class="d-flex align-items-start mb-5">
            <div class="bg-info me-sm-4 me-3 p-3" style="border-radius: 13px"> <img src="{{ asset('assets/img/steps/taxi.svg') }}" width="22" alt="{{ mine()['title'] }}" /></div>
            <div class="flex-1">
              <h4 class="text-secondary fw-bold fs-0">Make a payment</h4>
              <p>Finally, After making the payment.<br class="d-none d-sm-block"> Please confirm to admin.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 d-flex justify-content-center align-items-start">
          <div class="card position-relative shadow" style="max-width: 370px;">
            <div class="position-absolute z-index--1 me-10 me-xxl-0" style="right:-160px;top:-210px;"> <img src="{{ asset('assets/img/steps/bg.png') }}" style="max-width:550px;" alt="{{ mine()['title'] }}" /></div>
            <div class="card-body p-3"> <img class="mb-4 mt-2 rounded-2 w-100" src="{{ asset('assets/img/wisata/booking.jpg') }}" alt="{{ mine()['title'] }}" />
              <div>
                <h5 class="fw-medium">The best Tour Packages in Bali</h5>
                <p class="fs--1 mb-3 fw-medium">Doc : 1-3 Nov | by Wildan Sophal Jamil</p>
                <div class="icon-group mb-4"> <span class="btn icon-item"> <img src="{{ asset('assets/img/steps/leaf.svg') }}" alt="Leaf"/></span><span class="btn icon-item"> <img src="{{ asset('assets/img/steps/map.svg') }}" alt="Map"/></span><span class="btn icon-item"> <img src="{{ asset('assets/img/steps/send.svg') }}" alt="Send"/></span>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                  <div class="d-flex align-items-center mt-n1"><img class="me-3" src="{{ asset('assets/img/steps/packs.png') }}" width="18" alt="Packs" /><span class="fs--1 fw-medium">2 Packs</span></div>
                  <div class="show-onhover position-relative">
                    <img src="{{ asset('assets/img/steps/heart.svg') }}" width="20" alt="Heart" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- end of .container-->

  </section>

  <section id="testimonial">

    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="mb-8 text-start">
            <span class="text-secondary fw-bold">Testimonials</span>
            <h5 class="fs-xl-8 fs-lg-6 fs-4 fw-bold font-cursive text-capitalize">What They Say About {{ mine()['longTitle'] }}</h5>
          </div>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-6">
          <div class="pe-7 ps-5 ps-lg-0">
            <div class="carousel slide carousel-fade position-static" id="testimonialIndicator" data-bs-ride="carousel">
              <div class="carousel-indicators">
                <button class="active" type="button" data-bs-target="#testimonialIndicator" data-bs-slide-to="0" aria-current="true" aria-label="Testimonial 0"></button>
                <button class="false" type="button" data-bs-target="#testimonialIndicator" data-bs-slide-to="1" aria-current="true" aria-label="Testimonial 1"></button>
                <button class="false" type="button" data-bs-target="#testimonialIndicator" data-bs-slide-to="2" aria-current="true" aria-label="Testimonial 2"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item position-relative active">
                  <div class="card shadow" style="border-radius:10px;">
                    <div class="position-absolute start-0 top-0 translate-middle"> <img class="rounded-circle fit-cover" src="{{ asset('assets/img/testimonial/author.png') }}" height="65" width="65" alt="{{ mine()['title'] }}" /></div>
                    <div class="card-body p-4">
                      <p class="fw-medium fs--1 mb-0">Germany</p>
                      <h6 class="text-secondary fs-2">Marlene Dietrich</h6>
                      <p class="mb-4">&quot;I highly recommend {{ mine()['longTitle'] }} for their professionalism and reliability. They offer diverse tour packages with friendly and knowledgeable tour guides. Prices are also affordable and competitive. Thank you {{ mine()['title'] }} for an unforgettable vacation!</p>
                    </div>
                  </div>
                  <div class="card shadow-sm position-absolute top-0 z-index--1 mb-3 w-100 h-100" style="border-radius:10px;transform:translate(25px, 25px)"> </div>
                </div>
                <div class="carousel-item position-relative ">
                  <div class="card shadow" style="border-radius:10px;">
                    <div class="position-absolute start-0 top-0 translate-middle"> <img class="rounded-circle fit-cover" src="{{ asset('assets/img/testimonial/author.png') }}" height="65" width="65" alt="{{ mine()['title'] }}" /></div>
                    <div class="card-body p-4">
                      <p class="fw-medium fs--1 mb-0">India</p>
                      <h6 class="text-secondary fs-2">Hrithik Roshan</h6>
                      <p class="fw-medium mb-4">&quot;{{ mine()['longTitle'] }} offers an unforgettable vacation experience. Diverse tour packages, knowledgeable tour guides, and affordable prices make them the right choice.&quot;</p>
                    </div>
                  </div>
                  <div class="card shadow-sm position-absolute top-0 z-index--1 mb-3 w-100 h-100" style="border-radius:10px;transform:translate(25px, 25px)"> </div>
                </div>
                <div class="carousel-item position-relative ">
                  <div class="card shadow" style="border-radius:10px;">
                    <div class="position-absolute start-0 top-0 translate-middle"> <img class="rounded-circle fit-cover" src="{{ asset('assets/img/testimonial/author.png') }}" height="65" width="65" alt="{{ mine()['title'] }}" />
                    </div>
                    <div class="card-body p-4">
                      <p class="fw-medium fs--1 mb-0">Australia</p>
                      <h6 class="text-secondary">Chris Hemsworth</h6>
                      <p class="fw-medium mb-4">&quot;Using the services of this travel agency was a very enjoyable experience. Diverse tour package options and affordable prices made my vacation more planned and enjoyable. Friendly and knowledgeable tour guides also made my vacation even more special.&quot;</p>
                    </div>
                  </div>
                  <div class="card shadow-sm position-absolute top-0 z-index--1 mb-3 w-100 h-100" style="border-radius:10px;transform:translate(25px, 25px)"> </div>
                </div>
              </div>
              <div class="carousel-navigation d-flex flex-column flex-between-center position-absolute end-0 top-lg-50 bottom-0 translate-middle-y z-index-1 me-3 me-lg-0" style="height:60px;width:20px;">
                <button class="carousel-control-prev position-static" type="button" data-bs-target="#testimonialIndicator" data-bs-slide="prev"><img src="{{ asset('assets/img/icons/up.svg') }}" width="16" alt="icon" /></button>
                <button class="carousel-control-next position-static" type="button" data-bs-target="#testimonialIndicator" data-bs-slide="next"><img src="{{ asset('assets/img/icons/down.svg') }}" width="16" alt="icon" /></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- end of .container-->

  </section>

@endsection