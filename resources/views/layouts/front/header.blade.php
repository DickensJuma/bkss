<!-- header start -->
<div class="header-classic">
            <!-- navigation start -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <nav class="navbar navbar-expand-lg navbar-classic">
                            <a class="navbar-brand" href="index.html"> <img src="{{asset('front/assets/images/logo.png')}}" alt=""></a>
                            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar-classic" aria-controls="navbar-classic" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar top-bar mt-0"></span>
                                <span class="icon-bar middle-bar"></span>
                                <span class="icon-bar bottom-bar"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbar-classic">
                                <ul class="navbar-nav ml-auto mt-2 mt-lg-0 mr-3">
                                    <li class="nav-item ">
                                        <a class="nav-link" href="index.html">
                                            Homepage
                                        </a>
                                        
                                    </li>
                                   
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="menu-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Blog </a>
                                        <ul class="dropdown-menu" aria-labelledby="menu-4">
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="blog/blog-thumbnail.html">
                                                    Blog Thumbnail</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="blog/blog-single.html">
                                                    Blog Single</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="menu-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            My Account </a>
                                        <ul class="dropdown-menu" aria-labelledby="menu-4">
                                        @if (Route::has('login'))
                                        @auth
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="{{ url('/home') }}">
                                                   Home</a>
                                            </li>
                                             @else
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="{{ route('login') }}">
                                                    Login</a>
                                            </li>
                                            @if (Route::has('register'))
                                            <li class="dropdown-item">
                                                <a class="dropdown-link" href="{{ route('register') }}">
                                                    Register</a>
                                            </li>
                                            @endif
                                            @endauth
                                            @endif
                                        </ul>
                                    </li>
                                 
                                </ul>
                                <div class="header-btn">
                                    <a href="pages/add-listing.html" class="btn btn-primary">List Your Space</a>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- navigation close -->
        </div>
        <!-- header close -->