<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Static Template</title>
    <style>
    @import url("https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,700&display=swap");
    @import url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css");

    body {
        font-family: "Mulish", sans-serif;
    }

    button {
        padding: 1rem;
        border-radius: 3px;
        border: 1px solid;
        font-size: 14px;
        width: fit-content;
    }

    a {
        color: #3c80c7;
        text-decoration: underline;
        cursor: pointer;
    }

    .danger {
        color: red;
    }

    .header {
        background: #000e32;
        color: white;
        padding: 10px 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .header ul {
        list-style: none;
    }

    .header i,
    .booking-confirm i {
        color: #25e175;
    }

    .booking_main_content {
        margin: 10px 1rem;
    }

    .booking-confirm .thanks {
        display: flex;
        align-items: center;
    }

    .booking-confirm .thanks i {
        margin-right: 1rem;
        color: #25e175;
    }

    .booking-confirm .thanks h5,
    .booking-confirm .thanks h2 {
        margin: 0px;
    }

    .booking-confirm .thanks h5 {
        font-size: 1.2rem;
    }

    .booking-confirm .thanks h2 {
        font-size: 1.5rem;
    }

    .booking-confirm ul li::before {
        content: "\2713";
        color: #25e175;
        font-weight: bold;
        display: inline-block;
        width: 1em;
        margin-left: -1em;
    }

    .booking-confirm li {
        list-style: none;
        margin-bottom: 10px;
    }

    .btn_full {
        background: #000e32;
        color: white;
    }

    .btn_border {
        border: 1px solid #000e32 !important;
        background: white;
        color: #000e32;
    }

    .booking_hotel_details {
        margin-top: 2rem;
    }

    .booking_hotel_details>h2 {
        color: #000e32;
        font-size: 1.5rem;
        font-weight: 800;
    }

    .fill-danger {
        background: red;
        color: white;
        border: 1px solid red;
        margin-bottom: 10px;
    }

    .booking_cancellation {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .book_img {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        overflow: hidden;
        margin: 1rem 0px;
    }

    .book_img>div {
        width: 100%;
        height: 60vh;
        background-size: cover !important;
        background-repeat: no-repeat !important;
    }

    .print {
        font-size: 1.2rem;
        text-align: center !important;
        display: flex;
        justify-content: center;
    }

    .reservation_detail {
        margin-bottom: 1rem;
    }

    .reservation_detail>div {
        display: grid;
        grid-template-columns: 25% auto;
    }

    .reservation_detail>div:not(:last-child) {
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    .reservation_detail>div p:first-child {
        font-weight: 700;
    }

    .reservation_detail>div p:last-child {
        text-align: right;
    }
    </style>

<body>
    <!-- Header start -->
    <div class="header">
        <div class="logo"><img src="{{ asset('front/assets/images/logo.png') }}" alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3" /></div>
        <ul>
            <li>Confirmation number: <strong>36563256</strong></li>
            <li>PIN code: <strong>6323 </strong><i class="fas fa-lock"></i></li>
        </ul>
    </div>
    <!-- Header end -->
    <!-- Booking confirmation section start -->
    <div class="booking_main_content">
        <div class="booking-confirm">
            <div class="thanks"><i class="fas fa-check-circle"></i>
                <div>
                    <h5>Thanks Anna!</h5>
                    <h2>Your booking in Kiev is confirmed.</h2>
                </div>
            </div>
            <ul>
                <li><strong>Vittoria Suites</strong>is expecting you on <strong>14 June</strong></li>
                <li>Your payment will be handled by Vittoria Suites. The 'Payment'
                    section below has more details </li>
                <li>Make changes to your booking or ask the property a question in just a few clicks </li>
            </ul>
        </div><button class="btn_full">Make changes to your booking</button><button class="btn_border">Manage
            your booking in the app</button>
        <div class="booking_hotel_details">
            <h2>Vittoria Suites</h2>
            <p>Artema Street 24b,
                Pomeshenie 13,
                Shevchenkivskyj,
                Kiev,
                04053,
                Ukraine </p>
            <p><strong>Phone:</strong>+380685557577</p><a href="mailto:m.bluth@example.com">Email
                property</a>
            <div class="book_img">
                <div style="background: url(https://vittoriasuites.com/wp-content/uploads/2015/03/vittoriaroomA.jpg)">
                </div>
                <div style="background: url(https://vittoriasuites.com/wp-content/uploads/2015/12/room2-1.jpg)">
                </div>

            </div><a onclick="window.print();return false;" class="print"><i class="fas fa-print"></i>Get the
                print version </a>
            <div class="reservation_detail">
                <div>
                    <p>Your reservation</p>
                    <p>1 night,
                        1 dormitory bed</p>
                </div>
                <div>
                    <p>Check-in</p>
                    <p>Friday 14 June 2021(from 13:00)</p>
                </div>
                <div>
                    <p>Check-out</p>
                    <p>Saturday 15 June 2021(until 12:00)</p>
                </div>
                <div>
                    <p>Prepayment</p>
                    <p>You will be charged a prepayment of the total price at any time. </p>
                </div>
                <div>
                    <p>Cancellation cost</p>
                    <ul>
                        <li>From now on: USD 34</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="booking_cancellation"><button class="fill-danger">cancel your booking</button><i class="danger">This
                booking is non-refundable. Changing the dates of your stay is not
                possible.</i></div>
    </div>
</body>

</html>