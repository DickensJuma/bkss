@extends('layouts.front_layout.design')
@section('content')
<!-- banner -->
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1" class=""></li>
			<li data-target="#myCarousel" data-slide-to="2" class=""></li>
			<li data-target="#myCarousel" data-slide-to="3" class=""></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<div class="container">
					<div class="carousel-caption">
						<h3>Care</h3>
						<p></p>
						<div class="top-buttons">
							<div class="bnr-button">
								<a class="act" href="{{route('about_us')}}">Read More</a>
							</div>
							<div class="bnr-button">
								<a href="{{ route('members.create') }}" class="two scroll ">Join Us</a>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
			<div class="item item2">
				<div class="container">
					<div class="carousel-caption">
						<h3>save</h3>
						<p></p>
						<div class="top-buttons">
							<div class="bnr-button">
								<a class="act" href="{{route('about_us')}}">Read More</a>
							</div>
							<div class="bnr-button">
								<a href="{{ route('members.create') }}" class="two scroll ">Join Us</a>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
			<div class="item item3">
				<div class="container">
					<div class="carousel-caption">
						<h3>Support</h3>
						<p></p>
						<div class="top-buttons">
							<div class="bnr-button">
								<a class="act" href="{{route('about_us')}}">Read More</a>
							</div>
							<div class="bnr-button">
								<a href="{{ route('members.create') }}" class="two scroll ">Join Us</a>
							</div>
							<div class="clearfix"> </div>
						</div>

					</div>
				</div>
			</div>
			<div class="item item4">
				<div class="container">
					<div class="carousel-caption">

						<h3>Help</h3>
						<p></p>
						<div class="top-buttons">
							<div class="bnr-button">
								<a class="act" href="{{route('about_us')}}">Read More</a>
							</div>
							<div class="bnr-button">
								<a href="{{ route('members.create') }}" class="two scroll ">Join Us</a>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="fa fa-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="fa fa-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
		<!-- The Modal -->
	</div>
	<!--//banner -->
<!--/ab-->
<div class="banner_bottom">
  <div class="container">
    <h3 class="tittle-w3ls">About Us</h3>
    <div class="inner_sec_info_wthree_agile">
      <div class="help_full">
        <div class="col-md-6 banner_bottom_grid help">
          <img src="{{ asset('images/webimgs/banner1.jpg') }}" alt=" " class="img-responsive">
        </div>
        <div class="col-md-6 banner_bottom_left">
          <h4>Heart To Care Children's Home</h4>
          <p>Heart to care was founded in 1999 and got registered as a legal entity with the department of social services in Nyakach 
            District, Kisumu County.Heart to care group wishes to respond to the impact of HIV/AIDS in the community by mobilizing local 
            and external resources to meet the needs and capacities of orphans and vulnerable children.</p>
              <h4>Our Vision</h4>
              <p>To share the love of Christ and transform the living standard of orphaned children, poor and venerable families in Kenya</p>
          <div class="ab_button">
            <a class="btn btn-primary btn-lg hvr-underline-from-left" href="{{ route('about_us') }}" role="button">Read More </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--//ab-->
<!--/what-->
<div class="works">
  <div class="container">
    <h3 class="tittle-w3ls cen">CORE VALUES</h3>
    <div class="inner_sec_info_wthree_agile">
      <div class="ser-first">
        <div class="col-md-3 ser-first-grid text-center">
          <span class="fa fa-shield" aria-hidden="true"></span>
          <h3>EDUCATION</h3>
          <p></p>
        </div>
        <div class="col-md-3 ser-first-grid text-center">
          <span class="fa fa-pencil" aria-hidden="true"></span>
          <h3>HEALTH AND FEEDING</h3>
          <p></p>
        </div>
        <div class="col-md-3 ser-first-grid text-center">
          <span class="fa fa-star" aria-hidden="true"></span>
          <h3>SHELTER</h3>
          <p></p>
        </div>
        <div class="col-md-3 ser-first-grid text-center">
          <span class="fa fa-thumbs-up" aria-hidden="true"></span>
          <h3>SPIRITUAL DEVELOPMENT</h3>
          <p></p>
        </div>
      </div>
    </div>    
        <div class="clearfix"></div>
    </div>
  </div>
<!--//what-->
<!--/Notice board-->
<div class="banner_bottom proj">
  <div class="wrap_view">
    <h3 class="tittle-w3ls">Notice Board</h3>
    <div class="inner_sec">
      <ul class="portfolio-categ filter">
        <li class="port-filter all active">
          <a href="#">All</a>
        </li>
        <li class="cat-item-1">
          <a href="#" title="Category 1">Anouncements</a>
        </li>
        <li class="cat-item-2">
          <a href="#" title="Category 2">News</a>
        </li>
        <li class="cat-item-3">
          <a href="#" title="Category 3">Posts</a>
        </li>
      </ul>
      <ul class="portfolio-area">
       
        <div class="clearfix"></div>
      </ul>
      <!--end portfolio-area -->
    </div>
  </div>
</div>
<!--//Notice Board-->
<!-- /Call to action-->
<div class="newsletter_w3ls_agileits">
  <div class="col-sm-6 newsleft">
    <h3>Would you like to join our noble action?</h3>
  </div>
  <div class="col-sm-6 newsright">
    <div class="bnr-button">
      <a class="btn btn-success" href="{{route('donations.create')}}">Donate</a>
    </div>
    <div class="bnr-button">
      <a href="{{ route('members.create') }}" class="btn btn-warning">Volunteer</a>
    </div>
  </div>
  <div class="clearfix"></div>
</div>
<!-- //Call to action-->
<!--/testimonials-->
<div class="tesimonials container">
  <h3 class="tittle-w3ls cen">Testimonials</h3>
  <div class="inner_sec">
      <div class="test_grid_sec">
          <div class="col-md-offset-2 col-md-8">
              <div class="carousel slide two" data-ride="carousel" id="quote-carousel">
                  <!-- Bottom Carousel Indicators -->
                  <ol class="carousel-indicators two">
                      <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
                      <li data-target="#quote-carousel" data-slide-to="1"></li>
                      <li data-target="#quote-carousel" data-slide-to="2"></li>
                  </ol>
                  <!-- Carousel Slides / Quotes -->
                  <div class="carousel-inner">
                      <!-- Quote 1 -->
                      <div class="item active">
                          <blockquote>
                              <div class="test_grid">
                                  <div class="col-sm-3 text-center test_img">
                                      <img src="{{ asset('images/webimgs/')}}" class="img-responsive" alt="">
                                  </div>
                                  <div class="col-sm-9 test_img_info">
                                      <p></p>
                                      <h6></h6>
                                  </div>
                              </div>
                          </blockquote>
                      </div>
                      <!-- Quote 2 -->
                      <div class="item">
                          <blockquote>
                              <div class="test_grid">
                                  <div class="col-sm-3 text-center test_img">
                                      <img src="{{ asset('images/webimgs/')}}" class="img-responsive" alt="">
                                  </div>
                                  <div class="col-sm-9 test_img_info">
                                      <p></p>
                                      <h6></h6>
                                  </div>
                              </div>
                          </blockquote>
                      </div>
                      <!-- Quote 3 -->
                      <div class="item">
                          <blockquote>
                              <div class="test_grid">
                                  <div class="col-sm-3 text-center test_img">
                                      <img src="{{ asset('images/webimgs/')}}" class="img-responsive" alt="">
                                  </div>
                                  <div class="col-sm-9 test_img_info">
                                      <p></p>
                                      <h6></h6>
                                  </div>
                              </div>
                          </blockquote>
                      </div>
                  </div>
              </div>
          </div>
      </div>
</div>
</div>
<!--//testimonials-->
<!-- /newsletter-->
<div class="newsletter_w3ls_agileits">
  <div class="col-sm-6 newsleft">
    <h3>Sign up for Newsletter !</h3>
  </div>
  <div class="col-sm-6 newsright">
    <form action="#" method="post">
      <input type="email" placeholder="Enter your email..." name="email" required="">
      <input type="submit" value="Submit">
    </form>
  </div>
  <div class="clearfix"></div>
</div>
<!-- //newsletter-->
@endsection
