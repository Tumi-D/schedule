<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Scheduler</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.png') }}" type="image/x-icon">
    <!-- Custom styles for this template -->
    <link href="{{asset('assets/css/grayscale.min.css') }}" rel=" stylesheet">

</head>

<body id="page-top">


    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="{{asset('assets/img/ewclogo.png')}}"
                    width="200px" alt=""></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            @if (Route::has('login'))
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    @auth
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{ url('/admin') }}">Home</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{ route('login') }}">Login</a>
                    </li>
                    @endauth
                </ul>
            </div>
            @endif
        </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
        <div class="container d-flex h-100 align-items-center">
            <div class="mx-auto text-center">
                <h1 class="mx-auto my-0 text-uppercase">Scheduler</h1>
                <h2 class="text-white-50 mx-auto mt-2 mb-5">An online time management app for the EWC Protocol
                    Department.</h2>
                <a href="{{asset('pdf/EWC_Protocol_Friday_Schedule.pdf') }}" class="btn btn-primary js-scroll-trigger"
                    download="EWC_Protocol_Friday_Schedule.pdf">Download
                    Latest Schedule</a>
            </div>
        </div>
    </header>

    <!-- About Section -->
    {{-- <section id="about" class="about-section text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="text-white mb-4">Built with Bootstrap 4</h2>
                    <p class="text-white-50">Scheduler is a free Bootstrap theme created by Start Bootstrap. It can be
                        yours right now, simply download the template on
                        <a href="http://startbootstrap.com/template-overviews/grayscale/">the preview page</a>. The
                        theme is open source, and you can use it for any purpose, personal or commercial.</p>
                </div>
            </div>
            <img src="{{asset('assets/img/ipad.png')}}" class="img-fluid" alt="">
    </div>
    </section> --}}

    <!-- Projects Section -->
    {{-- <section id="projects" class="projects-section bg-light">
        <div class="container"> --}}

    <!-- Featured Project Row -->
    {{-- <div class="row align-items-center no-gutters mb-4 mb-lg-5">
                <div class="col-xl-8 col-lg-7">
                    <img class="img-fluid mb-3 mb-lg-0" src="{{asset('assets/img/bg-masthead.jpg')}}" alt="">
    </div>
    <div class="col-xl-4 col-lg-5">
        <div class="featured-text text-center text-lg-left">
            <h4>Shoreline</h4>
            <p class="text-black-50 mb-0">Scheduler is open source and MIT licensed. This means you can use
                it for any project - even commercial projects! Download it, customize it, and publish your
                website!</p>
        </div>
    </div>
    </div> --}}

    <!-- Project One Row -->
    {{-- <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
            <div class="col-lg-6">
                <img class="img-fluid" src="{{asset('assets/img/demo-image-01.jpg')}}" alt="">
    </div>
    <div class="col-lg-6">
        <div class="bg-black text-center h-100 project">
            <div class="d-flex h-100">
                <div class="project-text w-100 my-auto text-center text-lg-left">
                    <h4 class="text-white">Misty</h4>
                    <p class="mb-0 text-white-50">An example of where you can put an image of a project, or
                        anything else, along with a description.</p>
                    <hr class="d-none d-lg-block mb-0 ml-0">
                </div>
            </div>
        </div>
    </div>
    </div> --}}

    <!-- Project Two Row -->
    {{-- <div class="row justify-content-center no-gutters">
            <div class="col-lg-6">
                <img class="img-fluid" src="{{asset('assets/img/demo-image-02.jpg')}}" alt="">
    </div>
    <div class="col-lg-6 order-lg-first">
        <div class="bg-black text-center h-100 project">
            <div class="d-flex h-100">
                <div class="project-text w-100 my-auto text-center text-lg-right">
                    <h4 class="text-white">Mountains</h4>
                    <p class="mb-0 text-white-50">Another example of a project with its respective
                        description. These sections work well responsively as well, try this theme on a
                        small screen!</p>
                    <hr class="d-none d-lg-block mb-0 mr-0">
                </div>
            </div>
        </div>
    </div>
    </div> --}}

    {{-- </div>
    </section> --}}

    <!-- Signup Section -->
    {{-- <section id="signup" class="signup-section">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 mx-auto text-center">

                    <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
                    <h2 class="text-white mb-5">Subscribe to receive updates!</h2>

                    <form class="form-inline d-flex">
                        <input type="email" class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" id="inputEmail"
                            placeholder="Enter email address...">
                        <button type="submit" class="btn btn-primary mx-auto">Subscribe</button>
                    </form>

                </div>
            </div>
        </div>
    </section> --}}

    <!-- Contact Section -->
    {{-- <section class="contact-section bg-black">
        <div class="container">

            <div class="row">

                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Address</h4>
                            <hr class="my-4">
                            <div class="small text-black-50">4923 Market Street, Orlando FL</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-envelope text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Email</h4>
                            <hr class="my-4">
                            <div class="small text-black-50">
                                <a href="#">hello@yourdomain.com</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-mobile-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Phone</h4>
                            <hr class="my-4">
                            <div class="small text-black-50">+1 (555) 902-8832</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="social d-flex justify-content-center">
                <a href="#" class="mx-2">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="mx-2">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="mx-2">
                    <i class="fab fa-github"></i>
                </a>
            </div>

        </div>
    </section> --}}

    <!-- Footer -->
    <footer class="bg-black small text-center text-white-50">
        <div class="container">
            Copyright &copy; Your Website
            <script>
                var cmm =  new Date().getFullYear();
                document.write(cmm)

            </script>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{asset('assets/js/grayscale.min.js')}}"></script>

</body>

</html>
