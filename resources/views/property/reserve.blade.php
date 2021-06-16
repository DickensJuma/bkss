@extends('layouts.front.design')
@section('content')
<div class="container checkout-container">
    <div class="checkout-sidebar">
        <!-- Booking details -->
        <div>
            <h5>Your booking details</h5>
            <div class="check_in_out">
                <div class="check_in">
                    <h5>Check-in</h5>
                    <h5>Mon 14 Jun 2021</h5>
                    <p>From 12:00</p>
                </div>
                <div class="check_out">
                    <h5>Check-out</h5>
                    <h5>Tue 15 Jun 2021</h5>
                    <p>From 10:00</p>
                </div>
            </div>
            <h4 class="days_away"><span><i class="fas fa-exclamation-circle"></i></span> just <strong>3</strong> days
                away!
            </h4>
            <h6>Total length of stay:</h6>
            <h5>1 night</h5>
            <a href="#">Travelling on different dates?</a>
        </div>
        <!-- Booking details end -->

        <!-- You selected -->
        <div class="you_selected">
            <h5>You selected:</h5>
            <p>Double or twin room with view</p>
            <a href="#">Change your selection</a>
        </div>
        <!-- You selected end -->

        <!-- Price summary -->
        <div class="price_summary">
            <h5>Your price summary</h5>
            <div>
                <p>Double or twin room with view <span>US$100.3</span></p>
                <p>16% VAT <span>US$16.0</span> </p>
                <p>10% property service charge<span>US$11.64</span></p>
                <p>2% city tax<span>US$2.01</span></p>
                <p class="pays">booksasa.com pays<span>- US$11.70</span></p>
                <p class="price">Price <span>US$118.30</span></p>
            </div>
        </div>
        <!-- Price summary end -->

        <!-- Cost to cancel -->
        <div class="cost_to_cancel">
            <h5>How much will it cost to cancel?</h5>
            <p>If you cancel, you'll pay <span>us$118</span></p>
        </div>
        <!-- Cost to cancel end -->

        <!-- limited alert -->
        <div class="limited_alert">
            <i class="fa fa-clock"></i>
            <div>
                <h5>Limited supply in Diani Beach for your dates:</h5>
                <p>1 four-star resort like this is already unavailable on our site</p>
            </div>
        </div>
        <!-- limited alert end -->
        <div>
            <h5>The fine print</h5>
            <p>Guests are required to show photo identification and credit cardupon check-in.</p>
        </div>
    </div>
    <!-- Main body -->
    <div class="hotel_body">
        <form>
            <!-- hotel info -->
            <div class="hotel__info">
                <div class="hotel__img">
                    <img src="https://imgcy.trivago.com/c_lfill,d_dummy.jpeg,e_sharpen:60,f_auto,h_450,q_auto,w_450/itemimages/60/99/6099870_v2.jpeg"
                        alt="">
                </div>
                <div class="hotel__datas">
                    <p class="top__rating">Resort <span class="text-warning" data-toggle="tooltip" data-placement="left"
                            title="This star rating is provided to Book sasa by the property and is usually determined by an official hotel rating organization or another third party.">
                            @for ($star =0 ; $star < 5 ; $star++) &#9734; @endfor </span>
                                <i class="fas fa-thumbs-up"></i>
                    </p>
                    <h2>Baobab Beach Resort & Spa</h2>
                    <p>Diani Beach Road, 00400 Diani Beach, Kenya</p>
                    <p class="text-green text_smaller">This property has an excellent location. Guests have rated it
                        9.25
                    </p>
                    <div class="rating_text">
                        <h6><span>8.6</span> Fabulous</h6>
                        <p>246 reviews</p>
                    </div>
                </div>
            </div>
            <!-- Your Info -->
            <div class="your__info">
                <h3>Enter your info</h3>
                <div>
                    <div class="info_form_group">
                        <div class="form_label_grp">
                            <i>No address needed for this reservation</i>
                            <select name="country" id="country" required>
                                <option value="Kenya">Kenya</option>
                            </select>
                            <label for="country">Country/Region</label>

                        </div>
                        <div class="form_label_grp">
                            <i>So the accommodation can reach you</i>
                            <input type="tel" name="phone" id="phone" required />
                            <label for="phone">Telephone (Mobile number preferred)</label>

                        </div>

                        <div class="form_checkbox_grp">
                            <div>
                                <input type="checkbox" name="paperless" />
                                <label for="paperless">Yes, I'd like free paperless confirmation (recommeded)</label>
                            </div>
                            <i>We'll text you a link to download our app</i>
                        </div>
                    </div>
                    <div>
                        <p class="tags">Almost done! just fill in the <span>*</span> required info</p>
                        <div class="current_info">
                            <div>
                                <div>
                                    <div>
                                        <h5>Name:</h5>
                                        <p>Neeve Osewe</p>
                                    </div>
                                    <a href="#"><i class="fa fa-user"></i> Change</a>
                                </div>
                                <div>
                                    <h5>Email:</h5>
                                    <p>Osewe@mail.com</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Your Info end -->

            <!-- Your details -->
            <div class="your__details">
                <h3>Enter your details</h3>
                <div>
                    <p class="tags">Almost done! just fill in the <span>*</span> required info</p>
                    <div>
                        <h5>Are you travelling for work?</h5>
                        <input type="radio" id="yes" name="travelling" value="yes">
                        <label for="yes">Yes</label>
                        <input type="radio" id="no" name="travelling" value="no">
                        <label for="no">No</label>
                    </div>
                    <div class="input__grid">
                        <div class="form_label_grp">
                            <input type="text" name="phone" id="phone" required />
                            <label for="phone">First name</label>
                        </div>
                        <div class="form_label_grp">
                            <input type="text" name="phone" id="phone" required />
                            <label for="phone">Last name</label>
                        </div>
                    </div>
                    <div class="form_label_grp">
                        <i>Confirmation email goes to this address</i>
                        <input type="email" name="email" id="email" required />
                        <label for="email">Email address</label>
                    </div>
                    <div class="form_label_grp">
                        <input type="email" name="emailconfirm" id="emailconfirm" required />
                        <label for="emailconfirm">Confirm email address</label>
                    </div>
                    <div>
                        <h5>Who are you booking for?</h5>
                        <div>
                            <input type="radio" id="yes" name="travelling" value="yes">
                            <label for="yes">I am the main guest</label>
                        </div>
                        <div>
                            <input type="radio" id="no" name="travelling" value="no">
                            <label for="no">Booking for someone else</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Your details end -->
            <!-- Pay date -->
            <div class="pay__date">
                <h3>When would you like to pay?</h3>
                <div>
                    <div class="pay__select">
                        <input type="radio" id="later" name="paytime" value="later">
                        <label for="later">Pay later</label>
                        <div>
                            <p>
                                The property will handle payment. The date you'll be charged depends on your booking
                                conditions
                            </p>
                            <div>
                                <i class="fa fa-credit-card"></i>
                            </div>
                        </div>

                    </div>
                    <div class="pay__select">
                        <input type="radio" id="now" name="paytime" value="now">
                        <label for="now">Pay now <span>Save US$11.0</span></label>
                        <div>
                            <p>
                                Booksasa.com will facilitate your payment. You'll pay today when you complete your
                                booking
                            </p>
                            <div>
                                <i class="fa fa-credit-card"></i>
                                <i class="fab fa-paypal"></i>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <!-- Pay date end -->

            <!-- Special requests -->
            <div class="special_requests">
                <h3>Special Requests</h3>
                <div>
                    <ul>
                        <li>Please write your requests in English - we will share it with the property.</li>
                        <li>Special requests cannot be guaranteed - but the accommodation will do its best to meet
                            your
                            needs.
                        </li>
                        <li>You can always make a special request after you booking is complete!</li>
                    </ul>
                    <textarea name="request" id="request" rows="5"></textarea>
                    <div>
                        <input type="checkbox" id="private_parking" name="private_parking" />
                        <label for="private_parking">I would like free private parking on site</label>
                    </div>
                </div>
            </div>
            <!-- Special requests end -->
            <div class="booking__final__info">
                Your booking is with Baobab Beach Resort & Spa directly and by completing this booking you agree
                to
                the
                <a href="#">booking conditions</a>, <a href="#">general terms</a>, <a href="#">privacy policy
                </a>
                and<a href="#"> wallet terms.</a>
            </div>
            <div class="booking__submit__btns">
                <button class="btn btn_border">Check your booking</button>
                <button class="btn btn_fill"><i class="fa fa-lock"></i> Complete booking</button>
            </div>
        </form>
    </div>
</div>
@endsection