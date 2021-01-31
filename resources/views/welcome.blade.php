@extends('layouts.front.design')

@section('content')
<div class="bg-img-hero" style="background: url(front/assets/images/hero-slide-img-1.jpg) no-repeat;background-size: cover;">
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
                        <form action="{{ route('search') }}" method="POST">
                            @csrf
							<div class="row no-margin">
								<div class="col-md-3">
									<div class="form-header">
										<div class="form-group">
                                            <span class="form-label">Destination</span>
                                            <input class="form-control" type="text" name="destination" placeholder="Where To ?">
                                        </div>
									</div>
								</div>
								<div class="col-md-7">
									<div class="row no-margin">
										<div class="col-md-4">
											<div class="form-group">
												<span class="form-label">Check In</span>
												<input class="form-control" name="in" type="date">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<span class="form-label">Check out</span>
												<input class="form-control" name="out" type="date">
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<span class="form-label">Guests</span>
												<select class="form-control" name="adult">
													<option>1</option>
													<option>2</option>
													<option>3</option>
												</select>
												<span class="select-arrow"></span>
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<span class="form-label">Kids</span>
												<select class="form-control" name="kids">
													<option>0</option>
													<option>1</option>
													<option>2</option>
												</select>
												<span class="select-arrow"></span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-btn">
										<button class="submit-btn">Search</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
        </div>
        <div class="pt-lg-11 pb-lg-11 pt-7 pb-7 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                        <div class="mb-5">
                            <h2 class="h3">Featured Destinations </h2>
                            <p>Discover thousands of destinations.</p>
                        </div>
                    </div>
                </div>
                <div class="location-gallery ">
                    <div class="row no-gutters">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pr-2">
                            <a href="#">
                                <div class="overlay-bg mb-2 zoom-img">
                                    <img src="{{asset('front/assets/images/location-img-1.jpg')}}" alt="" class="w-100 rounded">
                                    <div class="overlay-content">
                                        <h4 class="text-white mb-1">New York</h4>
                                        <p class="text-white">87 rentals</p>
                                    </div>
                                </div>
                            </a>
                            <a href="#">
                                <div class="overlay-bg mb-2 zoom-img">
                                    <img src="{{asset('front/assets/images/location-img-2.jpg')}}" alt="" class="w-100 rounded">
                                    <div class="overlay-content">
                                        <h4 class="text-white mb-1">Paris</h4>
                                        <p class="text-white">221 rentals</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 pr-2">
                            <a href="#">
                                <div class=" overlay-bg mb-2 zoom-img">
                                    <img src="{{asset('front/assets/images/location-img-3.jpg')}}" alt="" class="w-100 rounded">
                                    <div class="overlay-content">
                                        <h4 class="text-white mb-1">Tokyo</h4>
                                        <p class="text-white">68 rentals</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                            <a href="#">
                                <div class="overlay-bg mb-2 zoom-img">
                                    <img src="{{asset('front/assets/images/location-img-4.jpg')}}" alt="" class="w-100 rounded">
                                    <div class="overlay-content">
                                        <h4 class="text-white mb-1">Australia</h4>
                                        <p class="text-white">54 rentals</p>
                                    </div>
                                </div>
                            </a>
                            <a href="#">
                                <div class="overlay-bg mb-2 zoom-img">
                                    <img src="{{asset('front/assets/images/location-img-5.jpg')}}" alt="" class="w-100 rounded">
                                    <div class="overlay-content">
                                        <h4 class="text-white mb-1">Chicago</h4>
                                        <p class="text-white">143 rentals</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pt-lg-11 pb-lg-11 pt-7 pb-7">
            <div class="container">
                <div class="row">
                    <!-- section heading start  -->
                    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="mb-5 text-center">
                            <h2 class="h3">Latest Listing</h2>
                            <p>Aliquam ornare pellentesque eros nec fermentum. </p>
                        </div>
                    </div>
                    <!-- section heading close  -->
                </div>
                <div class="theme-carousel">
                    <div class="owl-carousel owl-theme owl-listing">
                        <div class="item">
                            <!-- listing block start  -->
                            <div class="card">
                                <div class="card-img">
                                    <a href="pages/list-single.html"> <img src="{{asset('front/assets/images/listing-img-1.jpg')}}" alt="" class="img-fluid rounded-top"></a>
                                    <div class="btn-wishlist"></div>
                                </div>
                                <div class="card-body">
                                    <div class="">
                                        <h3 class="h4"> <a href="pages/list-single.html" class="text-dark">Beautiful Cozy Home</a></h3>
                                        <p class="text-sm font-weight-semi-bold"><i class="mdi mdi-map-marker mr-1"></i>London . Apartment</p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="">
                                            <span class="text-dark h5">$100</span><span class="text-sm font-weight-semi-bold ml-1">/night</span>
                                        </div>
                                        <div class="">
                                            <span class="mdi mdi-star mr-1 text-warning text-sm"></span>
                                            <span class="font-weight-semi-bold text-dark text-sm">5.0(8)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- listing block close  -->
                        </div>
                        <div class="item">
                            <!-- listing block start  -->
                            <div class="card">
                                <div class="card-img">
                                    <a href="pages/list-single.html"> <img src="{{asset('front/assets/images/listing-img-2.jpg')}}" alt="" class="img-fluid rounded-top"></a>
                                    <div class="btn-wishlist"></div>
                                </div>
                                <div class="card-body">
                                    <div class="">
                                        <h3 class="h4"> <a href="pages/list-single.html" class="text-dark">Affordable Long Term Room</a></h3>
                                        <p class="text-sm font-weight-semi-bold"><i class="mdi mdi-map-marker mr-1"></i>Madrid . Private Room</p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="">
                                            <span class="text-dark h5">$250</span><span class="text-sm font-weight-semi-bold ml-1">/night</span>
                                        </div>
                                        <div class="">
                                            <span class="mdi mdi-star mr-1 text-warning text-sm"></span>
                                            <span class="font-weight-semi-bold text-dark text-sm">4.9(6)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- listing block close  -->
                        </div>
                        <div class="item">
                            <!-- listing block start  -->
                            <div class="card">
                                <div class="card-img">
                                    <a href="pages/list-single.html"> <img src="{{asset('front/assets/images/listing-img-3.jpg')}}" alt="" class="img-fluid rounded-top"></a>
                                    <div class="btn-wishlist"></div>
                                </div>
                                <div class="card-body">
                                    <div class="">
                                        <h3 class="h4"> <a href="pages/list-single.html" class="text-dark">Entire 3 BHK Cozy Apartment</a></h3>
                                        <p class="text-sm font-weight-semi-bold"><i class="mdi mdi-map-marker mr-1"></i>New York . Apartment</p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="">
                                            <span class="text-dark h5">$180</span><span class="text-sm font-weight-semi-bold ml-1">/night</span>
                                        </div>
                                        <div class="">
                                            <span class="mdi mdi-star mr-1 text-warning text-sm"></span>
                                            <span class="font-weight-semi-bold text-dark text-sm">4.7(4)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- listing block close  -->
                        </div>
                        <div class="item">
                            <!-- listing block start  -->
                            <div class="card">
                                <div class="card-img">
                                    <a href="pages/list-single.html"> <img src="{{asset('front/assets/images/listing-img-2.jpg')}}" alt="" class="img-fluid rounded-top"></a>
                                    <div class="btn-wishlist"></div>
                                </div>
                                <div class="card-body">
                                    <div class="">
                                        <h3 class="h4"> <a href="pages/list-single.html" class="text-dark">Affordable Long Term Room</a></h3>
                                        <p class="text-sm font-weight-semi-bold"><i class="mdi mdi-map-marker mr-1"></i>Madrid . Private Room</p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="">
                                            <span class="text-dark h5">$250</span><span class="text-sm font-weight-semi-bold ml-1">/night</span>
                                        </div>
                                        <div class="">
                                            <span class="mdi mdi-star mr-1 text-warning text-sm"></span>
                                            <span class="font-weight-semi-bold text-dark text-sm">4.9(6)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- listing block close  -->
                        </div>
                        <div class="item">
                            <!-- listing block start  -->
                            <div class="card">
                                <div class="card-img">
                                    <a href="pages/list-single.html"> <img src="{{asset('front/assets/images/listing-img-3.jpg')}}" alt="" class="img-fluid rounded-top"></a>
                                    <div class="btn-wishlist"></div>
                                </div>
                                <div class="card-body">
                                    <div class="">
                                        <h3 class="h4"> <a href="pages/list-single.html" class="text-dark">Entire 3 BHK Cozy Apartment</a></h3>
                                        <p class="text-sm font-weight-semi-bold"><i class="mdi mdi-map-marker mr-1"></i>New York . Apartment</p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="">
                                            <span class="text-dark h5">$180</span><span class="text-sm font-weight-semi-bold ml-1">/night</span>
                                        </div>
                                        <div class="">
                                            <span class="mdi mdi-star mr-1 text-warning text-sm"></span>
                                            <span class="font-weight-semi-bold text-dark text-sm">4.7(4)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- listing block close  -->
                        </div>
                        <div class="item">
                            <!-- listing block start  -->
                            <div class="card">
                                <div class="card-img">
                                    <a href="pages/list-single.html"> <img src="{{asset('front/assets/images/listing-img-2.jpg')}}" alt="" class="img-fluid rounded-top"></a>
                                    <div class="btn-wishlist"></div>
                                </div>
                                <div class="card-body">
                                    <div class="">
                                        <h3 class="h4"> <a href="pages/list-single.html" class="text-dark">Beautiful Cozy Home</a></h3>
                                        <p class="text-sm font-weight-semi-bold"><i class="mdi mdi-map-marker mr-1"></i>London . Apartment</p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="">
                                            <span class="text-dark h5">$100</span><span class="text-sm font-weight-semi-bold ml-1">/night</span>
                                        </div>
                                        <div class="">
                                            <span class="mdi mdi-star mr-1 text-warning text-sm"></span>
                                            <span class="font-weight-semi-bold text-dark text-sm">5.0(8)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- listing block close  -->
                        </div>
                        <div class="item">
                            <!-- listing block start  -->
                            <div class="card">
                                <div class="card-img">
                                    <a href="pages/list-single.html"> <img src="{{asset('front/assets/images/listing-img-3.jpg')}}" alt="" class="img-fluid rounded-top"></a>
                                    <div class="btn-wishlist"></div>
                                </div>
                                <div class="card-body">
                                    <div class="">
                                        <h3 class="h4"> <a href="pages/list-single.html" class="text-dark">Entire 3 BHK Cozy Apartment</a></h3>
                                        <p class="text-sm font-weight-semi-bold"><i class="mdi mdi-map-marker mr-1"></i>New York . Apartment</p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="">
                                            <span class="text-dark h5">$180</span><span class="text-sm font-weight-semi-bold ml-1">/night</span>
                                        </div>
                                        <div class="">
                                            <span class="mdi mdi-star mr-1 text-warning text-sm"></span>
                                            <span class="font-weight-semi-bold text-dark text-sm">4.7(4)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- listing block close  -->
                        </div>
                        <div class="item">
                            <!-- listing block start  -->
                            <div class="card">
                                <div class="card-img">
                                    <a href="pages/list-single.html"> <img src="{{asset('front/assets/images/listing-img-1.jpg')}}" alt="" class="img-fluid rounded-top"></a>
                                    <div class="btn-wishlist"></div>
                                </div>
                                <div class="card-body">
                                    <div class="">
                                        <h3 class="h4"> <a href="pages/list-single.html" class="text-dark">Beautiful Cozy Home</a></h3>
                                        <p class="text-sm font-weight-semi-bold"><i class="mdi mdi-map-marker mr-1"></i>London . Apartment</p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="">
                                            <span class="text-dark h5">$100</span><span class="text-sm font-weight-semi-bold ml-1">/night</span>
                                        </div>
                                        <div class="">
                                            <span class="mdi mdi-star mr-1 text-warning text-sm"></span>
                                            <span class="font-weight-semi-bold text-dark text-sm">5.0(8)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- listing block close  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pt-lg-11 pb-lg-11 pt-7 pb-7 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                        <div class="mb-5">
                            <h2 class="h3">Our working Process</h2>
                            <p>Aliquam ornare pellentesque eros nec fermentum. </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="media">
                            <span class="mdi mdi-checkbox-multiple-marked-circle h3 text-primary mr-3"></span>
                            <div class="media-content">
                                <h3 class="h4 mb-3">Create a listing for free</h3>
                                <p>Morbi elit sem iaculis quis blandit onewse necpulvinar vitae lectus one enean suultricesut. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="media">
                            <span class="mdi mdi-checkbox-multiple-marked-circle h3 text-primary mr-3"></span>
                            <div class="media-content">
                                <h3 class="h4 mb-3">How you host is up to you</h3>
                                <p>Vestibulum auctor mximus estquinia vulputate etesd phasellus fermede ntum utodio aliquam laoreete. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="media">
                            <span class="mdi mdi-checkbox-multiple-marked-circle h3 text-primary mr-3"></span>
                            <div class="media-content">
                                <h3 class="h4 mb-3">Welcome your first guests</h3>
                                <p>Phasellus pulvinar volutpat justoquispose suere ested lorem ipsume volutpat dui id nulla perdietin. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pt-lg-11 pb-lg-11 pt-7 pb-7">
            <div class="container">
                <div class="row">
                    <!-- section heading start  -->
                    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                        <div class="mb-5">
                            <h2 class="h3">Our Customer Reviews </h2>
                            <p>Happy guest stay longer! At Rentkit we care about matching quality.
                            </p>
                        </div>
                    </div>
                    <!-- section heading close  -->
                </div>
                <div class="theme-carousel">
                    <div class="owl-carousel owl-theme owl-testimonial">
                        <div class="item">
                            <!-- testimonial start  -->
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="h4 mb-2">It was absolutely lovely</h3>
                                    <p class="mb-4 text-dark">Nam risus dui consequatet magna vitae blandit hendrerit risustesque ante varius iaculis feugiat nulla metustiam auctor malesuada.</p>
                                    <div class="d-flex justify-content-between">
                                        <div class="text-warning align-self-center text-sm">
                                            <span class="mdi mdi-star"></span>
                                            <span class="mdi mdi-star"></span>
                                            <span class="mdi mdi-star"></span>
                                            <span class="mdi mdi-star"></span>
                                            <span class="mdi mdi-star-half"></span>
                                        </div>
                                        <div class="media align-items-center">
                                            <img src="{{asset('front/assets/images/avatar-1.jpg')}}" alt="" class="avatar-xs rounded-circle mr-2">
                                            <span class="text-sm text-dark font-weight-semi-bold">James Duncan</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- testimonial close  -->
                        </div>
                        <div class="item">
                            <!-- testimonial start  -->
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="h4 mb-2">It was absolutely lovely</h3>
                                    <p class="mb-4 text-dark">Vivamus vel imperdiet purus ante id fermentum libero luctus sit ametonec dictum risus vitaenicuus acese mollis dolor porttitort convvariun.</p>
                                    <div class="d-flex justify-content-between">
                                        <div class="text-warning align-self-center text-sm">
                                            <span class="mdi mdi-star"></span>
                                            <span class="mdi mdi-star"></span>
                                            <span class="mdi mdi-star"></span>
                                            <span class="mdi mdi-star"></span>
                                            <span class="mdi mdi-star-half"></span>
                                        </div>
                                        <div class="media align-items-center">
                                            <img src="{{asset('front/assets/images/avatar-2.jpg')}}" alt="" class="avatar-xs rounded-circle mr-2">
                                            <span class="text-sm text-dark font-weight-semi-bold">Richard Jason</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- testimonial close  -->
                        </div>
                        <div class="item">
                            <!-- testimonial start  -->
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="h4 mb-2">Had an amazing time</h3>
                                    <p class="mb-4 text-dark">Sollicitudin purus ante id fermentum libero luctusivamus vel imperdiet eniroin sit ametonec dictum mollis dolor porttitort convvariun.</p>
                                    <div class="d-flex justify-content-between">
                                        <div class="text-warning align-self-center text-sm">
                                            <span class="mdi mdi-star"></span>
                                            <span class="mdi mdi-star"></span>
                                            <span class="mdi mdi-star"></span>
                                            <span class="mdi mdi-star"></span>
                                            <span class="mdi mdi-star-half"></span>
                                        </div>
                                        <div class="media align-items-center">
                                            <img src="{{asset('front/assets/images/avatar-3.jpg')}}" alt="" class="avatar-xs rounded-circle mr-2">
                                            <span class="text-sm text-dark font-weight-semi-bold">Richard Jason</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- testimonial close  -->
                        </div>
                        <div class="item">
                            <!-- testimonial start  -->
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="h4 mb-2">It was absolutely lovely</h3>
                                    <p class="mb-4 text-dark">Nam risus dui consequatet magna vitae blandit hendrerit risustesque ante varius iaculis nibh ieuismod auctor malesuada.</p>
                                    <div class="d-flex justify-content-between">
                                        <div class="text-warning align-self-center text-sm">
                                            <span class="mdi mdi-star"></span>
                                            <span class="mdi mdi-star"></span>
                                            <span class="mdi mdi-star"></span>
                                            <span class="mdi mdi-star-half"></span>
                                            <span class="mdi mdi-star-half"></span>
                                        </div>
                                        <div class="media align-items-center">
                                            <img src="{{asset('front/assets/images/avatar-1.jpg')}}" alt="" class="avatar-xs rounded-circle mr-2">
                                            <span class="text-sm text-dark font-weight-semi-bold">James Duncan</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- testimonial close  -->
                        </div>
                        <div class="item">
                            <!-- testimonial start  -->
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="h4 mb-2">It was absolutely lovely</h3>
                                    <p class="mb-4 text-dark">Vivamus vel imperdiet ante id fermentum libero luctus sit ametonec dictum risus vitaenicuus acese mollis dolor porttitort convvariun.</p>
                                    <div class="d-flex justify-content-between">
                                        <div class="text-warning align-self-center text-sm">
                                            <span class="mdi mdi-star"></span>
                                            <span class="mdi mdi-star"></span>
                                            <span class="mdi mdi-star"></span>
                                            <span class="mdi mdi-star-half"></span>
                                            <span class="mdi mdi-star-half"></span>
                                        </div>
                                        <div class="media align-items-center">
                                            <img src="{{asset('front/assets/images/avatar-2.jpg')}}" alt="" class="avatar-xs rounded-circle mr-2">
                                            <span class="text-sm text-dark font-weight-semi-bold">Richard Jason</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- testimonial close  -->
                        </div>
                        <div class="item">
                            <!-- testimonial start  -->
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="h4 mb-2">Had an amazing time</h3>
                                    <p class="mb-4 text-dark">Sollicitudin purus luctusivamus vel imperdiet eniroin sit ametonec dictum risus vitaenicuus acese mollis dolor porttitort convvariun.</p>
                                    <div class="d-flex justify-content-between">
                                        <div class="text-warning align-self-center text-sm">
                                            <span class="mdi mdi-star"></span>
                                            <span class="mdi mdi-star"></span>
                                            <span class="mdi mdi-star"></span>
                                            <span class="mdi mdi-star"></span>
                                            <span class="mdi mdi-star"></span>
                                        </div>
                                        <div class="media align-items-center">
                                            <img src="{{asset('front/assets/images/avatar-3.jpg')}}" alt="" class="avatar-xs rounded-circle mr-2 img-fluid">
                                            <span class="text-sm text-dark font-weight-semi-bold">Richard Jason</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- testimonial close  -->
                        </div>
                        <div class="item">
                            <!-- testimonial start  -->
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="h4 mb-2">It was absolutely lovely</h3>
                                    <p class="mb-4 text-dark">Nam risus dui consequatet risustesque ante varius iaculis nibh ieuismod leouce feugiat nulla metustiam auctor malesuada.</p>
                                    <div class="d-flex justify-content-between">
                                        <div class="text-warning align-self-center text-sm">
                                            <span class="mdi mdi-star"></span>
                                            <span class="mdi mdi-star"></span>
                                            <span class="mdi mdi-star"></span>
                                            <span class="mdi mdi-star"></span>
                                            <span class="mdi mdi-star-half"></span>
                                        </div>
                                        <div class="media align-items-center">
                                            <img src="{{asset('front/assets/images/avatar-1.jpg')}}" alt="" class="img-fluid avatar-xs rounded-circle mr-2">
                                            <span class="text-sm text-dark font-weight-semi-bold">James Duncan</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- testimonial close  -->
                        </div>
                        <div class="item">
                            <!-- testimonial start  -->
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="h4 mb-2">It was absolutely lovely</h3>
                                    <p class="mb-4 text-dark">Vivamus vel imperdiet eniroin sollicitudin purus ante id fermentum libero luctus sit ametonec dictum porttitort convvariun.</p>
                                    <div class="d-flex justify-content-between">
                                        <div class="text-warning align-self-center text-sm">
                                            <span class="mdi mdi-star"></span>
                                            <span class="mdi mdi-star"></span>
                                            <span class="mdi mdi-star"></span>
                                            <span class="mdi mdi-star"></span>
                                            <span class="mdi mdi-star-half"></span>
                                        </div>
                                        <div class="media align-items-center">
                                            <img src="{{asset('front/assets/images/avatar-2.jpg')}}" alt="" class="img-fluid avatar-xs rounded-circle mr-2">
                                            <span class="text-sm text-dark font-weight-semi-bold">Richard Jason</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- testimonial close  -->
                        </div>
                        <div class="item">
                            <!-- testimonial start  -->
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="h4 mb-2">Had an amazing time</h3>
                                    <p class="mb-4 text-dark">Sollicitudin purus ante id fermentum libero luctusivamus vel imperdiet eniroin sit ametonec dictum risus vitaenicuus acese mollis dolor porttitort convvariun.</p>
                                    <div class="d-flex justify-content-between">
                                        <div class="text-warning align-self-center text-sm">
                                            <span class="mdi mdi-star"></span>
                                            <span class="mdi mdi-star"></span>
                                            <span class="mdi mdi-star"></span>
                                            <span class="mdi mdi-star"></span>
                                            <span class="mdi mdi-star-half"></span>
                                        </div>
                                        <div class="media align-items-center">
                                            <img src="{{asset('front/assets/images/avatar-3.jpg')}}" alt="" class="img-fluid avatar-xs rounded-circle mr-2">
                                            <span class="text-sm text-dark font-weight-semi-bold">Richard Jason</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- testimonial close  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pt-lg-11 pb-lg-11 pt-7 pb-7 bg-light">
            <div class="container">
                <div class="row">
                    <!-- section heading start  -->
                    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                        <div class="mb-5">
                            <h2 class="h3">Latest From Blog Posts </h2>
                            <p>We want to make sure that you get to explore as much.
                            </p>
                        </div>
                    </div>
                    <!-- section heading close  -->
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="card mb-3">
                            <!-- post classic block -->
                            <div class="card-img">
                                <a href="blog/blog-single.html"><img src="{{asset('front/assets/images/post-thumb-img-1.jpg')}}" alt="" class="img-fluid rounded-top"></a>
                            </div>
                            <div class="card-body">
                                <div class="text-xs mb-2 ">
                                    <span class="mr-2 font-weight-semi-bold">Oct 17, 2019</span>
                                    <span class="font-weight-semi-bold"><a href="#">Experiance,</a> <a href="#">Host</a></span>
                                </div>
                                <h4 class="h5"><a href="blog/blog-single.html" class="text-dark">How To Get People To Like Rental </a></h4>
                                <p>Aliquam erat volutpa nean ortis iaculism sed posuere loremid caugue.</p>
                                <!-- postmeta start -->
                            </div>
                        </div>
                    </div>
                    <!-- /.post classic block -->
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="card mb-3">
                            <!-- post classic block -->
                            <div class="card-img">
                                <a href="blog/blog-single.html"><img src="{{asset('front/assets/images/post-thumb-img-2.jpg')}}" alt="" class="img-fluid rounded-top"></a>
                            </div>
                            <div class="card-body">
                                <div class="text-xs mb-2 ">
                                    <span class="mr-2 font-weight-semi-bold">Oct 16, 2019</span>
                                    <span class="font-weight-semi-bold"><a href="#">Homes</a></span>
                                </div>
                                <h4 class="h5"><a href="blog/blog-single.html" class="text-dark">The 8 Best Things to Do Indoors in Delhi</a></h4>
                                <p>Curabitur non dui vel ante pretium efficitur laoreet ipsum feugiat.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.post classic block -->
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="card mb-3">
                            <!-- post classic block -->
                            <div class="card-img">
                                <a href="blog/blog-single.html"><img src="{{asset('front/assets/images/post-thumb-img-3.jpg')}}" alt="" class="img-fluid rounded-top"></a>
                            </div>
                            <div class="card-body">
                                <div class="text-xs mb-2 ">
                                    <span class="mr-2 font-weight-semi-bold">Oct 15, 2019</span>
                                    <span class="font-weight-semi-bold"><a href="#">Company,</a> <a href="#">Host</a></span>
                                </div>
                                <h4 class="h5"><a href="blog/blog-single.html" class="text-dark"> 5 Simple Ways to Experience Rentkit for Next Webproject</a></h4>
                                <p>Vivamus vel imperdiet eniroin solliit udin ermentum libamet.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.post classic block -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center mt-4">
                        <a href="#" class="btn btn-primary">More Blogs</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="pt-lg-8 pb-lg-8 pt-7 pb-7 bg-primary">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12">
                        <div class="mb-2">
                            <h2 class="text-white">Want To Become Host?</h2>
                            <p class="text-white mb-0">Fusce ut varius estfacilisis tellusecenas ornare suscipit justsed dapibus ante.</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 d-flex align-items-center">
                        <div class="">
                            <a href="#" class="btn btn-white ">Become host</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
@endsection