
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Wildan Tour</title>
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="author" content="Wildan Sophal">
    <meta property="og:description" content="{{ $desc }}" />
    <meta property="og:title" content="{{ $title }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="{{ asset('assets/img/icons/logo2.svg') }}" />
    <meta name="keywords" content="{{ $title }}">
    <meta name="description" content="{{ $desc }}">
    <meta content='id_ID' property='og:locale'/>
    <meta name='robots' content='index, follow'/>
    <meta content='index, follow' name='googlebot'/>
    <meta property="og:type" content="website"/>
	  <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />

    <link rel="canonical" href="{{ url()->current() }}" />
    <link rel="apple-touch-icon" href="{{ asset('assets/img/icons/logo2.svg') }}">
    <link rel="icon" size="16x16" href="{{ asset('assets/img/icons/logo2.svg') }}">
    <link rel="icon" size="32x32" href="{{ asset('assets/img/icons/logo2.svg') }}">
    <link rel="icon" size="180x180" href="{{ asset('assets/img/icons/logo2.svg') }}">
    <link rel="shortcut icon" href="{{ asset('assets/img/icons/logo2.svg') }}">
    <link href="{{ asset('assets/img/icons/logo2.svg') }}" rel="icon">
    
    <meta name="theme-color" content="#ffffff">
    <link href="{{ asset('assets/css/theme.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.css') }}">
    @livewireStyles
  </head>


  <body>

    <main class="main" id="home">
      
      <nav class="navbar navbar-expand-lg navbar-light fixed-top py-4 d-block" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container">
          <a href="/" class="display-2">
            <img src="{{ asset('assets/img/icons/logo2.svg') }}" class="logo" alt="logo {{ mine()['longTitle'] }}">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
          <div class="collapse navbar-collapse border-top border-2 border-lg-0 border-dark mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base align-items-lg-center align-items-start">
              @if (Auth::check())
              <li class="nav-item dropdown">
                <a class="text-decoration-none fw-medium dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Admin
                </a>
                <ul class="dropdown-menu overflow-hidden" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="{{ route('category.index') }}">Category</a></li>
                  <li><a class="dropdown-item" href="{{ route('package.index') }}">Package</a></li>
                </ul>
              </li>
              @endif
              <li class="nav-item px-lg-5"><a class="nav-link fw-medium mt-2 mt-lg-0" aria-current="page" href="/">Home</a></li>
              <li class="nav-item pe-lg-5"><a class="nav-link fw-medium" aria-current="page" href="{{ route('tour') }}">Tour</a></li>
              <a class="mt-2 mt-lg-0 btn btn-secondary" target="_blank" href="https://api.whatsapp.com/send/?phone=6282115040168&text=Halo%20Admin%0Ahttp://127.0.0.1:8000&type=phone_number&app_absent=0">whatsapp</a>
            </ul>
          </div>
        </div>
      </nav>
        
      @yield('user')
      
      <section class="pb-0 pb-lg-4">

        <div class="container">
          <div class="row justify-content-between">
            <div class="col-md-6 col-sm-6 mb-5 order-0 pe-5"> 
              <h2 class="fw-bold font-sans-serif display-2">{{ mine()['title'] }}</h2>
              <a href="/" class="display-2">
                <img src="{{ asset('assets/img/icons/logo2.svg') }}" class="logo" alt="logo {{ mine()['longTitle'] }}">
              </a>
              <p class="fs--1 text-secondary my-2 fw-medium">{{ mine()['longTitle'] }} ! What better way to explore the beauty and hidden secrets of this island than to tour with a local ! As well as the cheapest and best package prices in Bali !</p>
              <a target="_blank" href="{{ mine()['linkWa']() }}">
                <svg class="svg-inline--fa fa-whatsapp fa-w-14 fs-3 me-1" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="whatsapp" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"></path></svg>
                {{ mine()['number'] }}
              </a>
            </div>
            <div class="col-md-3 col-sm-6 mb-5">
              <h2 class="fw-bold font-sans-serif display-2">Pages</h2>
              <ul class="list-unstyled mb-0">
                <li class="mb-2"><a class="link-900 fs-1 fw-medium text-decoration-none" href="/">Home</a></li>
                <li class="mb-2"><a class="link-900 fs-1 fw-medium text-decoration-none" href="{{ route('tour') }}">Tour</a></li>
              </ul>
            </div>
            <div class="col-md-3 col-sm-6 mb-5 order-lg-1 order-md-2">
              <h2 class="fw-bold font-sans-serif display-2">Tripadvisor</h2>
              <a href="https://www.tripadvisor.com/Attraction_Review-g297701-d19229102-Reviews-Dulbali_Tour_Travel-Ubud_Gianyar_Regency_Bali.html" target="blank">
                <img src="{{ asset('assets/img/service/tripadvisor.jpg') }}" class="img-fluid rounded-1 mt-2" alt="tripadvisor {{ mine()['longTitle'] }}">
              </a>
            </div>
          </div>
        </div><!-- end of .container-->  
      </section>
    
      <div class="side-fixed flex-column d-flex">
        <a target="_blank" href="https://api.whatsapp.com/send/?phone=6282115040168&text=Halo%20Admin%0Ahttp://127.0.0.1:8000&type=phone_number&app_absent=0">
          <i class="fa-xl fa-brands fa-whatsapp"></i>
          +62 82115040168
        </a>
      </div>
    
      <div class="py-5 text-center">
        <p class="mb-0 text-secondary fs--1 fw-medium">© Copyright <a href="/">Wildan Tour</a>  {{ Date('Y') }}</p>
        <p class="mb-0 text-secondary fs--1 fw-medium">Design By <a href="https://www.dion-zebua.my.id" class="text-success">Dion</a> </p>
      </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->


    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{ asset('vendors/@popperjs/popper.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/is/is.min.js') }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{{ asset('vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>
    @livewireScripts
    <script>
      Livewire.on('scrollIntoView', (id) => {
          const element = document.getElementById(id);
          if (element) {
              element.scrollIntoView({ behavior: 'smooth' });
          }
      });
    </script>
  
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;family=Volkhov:wght@700&amp;display=swap" rel="stylesheet">
    <script src="{{ asset('assets/js/swiper.js') }}"></script>
    <script>
      const swiperFeatured = new Swiper("#swiper-category", {
        slidesPerView: 1,
        slidesPerGroup: 1,
        spaceBetween: 30,
        grabCursor: true,
        navigation: {
          nextEl: "#next-category",
          prevEl: "#prev-category",
        },
        breakpoints: {  
          480: {
            slidesPerView: 2,
          },
          992: {
            slidesPerView: 3,
          },
          1200: {
            slidesPerView: 4,
          },
          1400: {
            slidesPerView: 5,
          },
          
        },
        autoplay: {
          delay: 2000,
          disableOnInteraction: false,
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
      });
    </script>
  </body>

</html>