<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Static Template</title>
    <link rel="stylesheet" href="{{asset('front/assets/css/invoice.css')}}">
</head>

<body>
    <div class="invoice_header">
        <div>
            <img src="" alt="logo" />
            <ul class="first-list">
                <li>Vittoria Suites</li>
                <li>Jared Omogi</li>
                <li>Millimani, Kisumu</li>
                <li>40100 Kisumu</li>
                <li>Kenya</li>
            </ul>
        </div>

        <div>
            <ul>
                <li>Booksasa.com</li>
                <li>P.O. Box ...</li>
                <li>Phone: +254732637</li>
                <li>VAT Number: NL7834643</li>
                <li>PIN: P0013236274Q</li>
                <li>Registered in Kenya No.: 637323</li>
                <li><a href="https://booksasa.com">https://booksasa.com</a></li>
            </ul>
        </div>

        <div>
            <ul class="order-list">
                <li>Accommodation Number: <span>1653523</span></li>
                <li>PIN: <span>P0017836483N</span></li>
                <li>Invoice number: <span>1562645260</span></li>
                <li>Date: <span>20/07/2021</span></li>
                <li>Period: <span>20/07/2021 - 20/07/2021</span></li>
            </ul>
        </div>
    </div>

    <!-- main body -->
    <div class="invoice-main">
        <h1>INVOICE</h1>
        <table>
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Room Sales</th>
                    <th>Commission</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Reservations</td>
                    <td>USD 2,177.38</td>
                    <td>USD 391.93</td>
                </tr>
                <tr>
                    <td colspan="2">Total amount due</td>
                    <td>USD 391.93</td>
                </tr>
                <tr>
                    <td colspan="2">
                        Total amount due for payment (as per exchange rate 107.59999685)
                        KES:
                    </td>
                    <td>KES 42,171.67</td>
                </tr>
            </tbody>
        </table>
        <h4 class="due">Payment Due: June 16, 2021</h5>
            <h4>
                Please transfer the due amount to our bank account below by the Payment
                Due date. Be sure to include INVOICE 1562645260 and ACCOMMODATION NUMBER
                1643848 with your payment instructions.
                </h5>
                <ul>
                    <li>Standard Chartered</li>
                    <li>Branch Chiromo</li>
                    <li>KBA Bank Code: 02</li>
                    <li>Swift Code: SCBLKENX</li>
                    <li>ACCOUNT: 01 060 396241 00</li>
                </ul>

                <ul>
                    <li>ACCOUNT HOLDER: Booksasa.com</li>
                    <li>ACCOUNT CURRENCY: KES</li>
                </ul>
                <p>PLEASE NOTIFY YOUR BANKTELLER THAT IS A VIRTUAL ACCOUNT NUMBER</p>
                <p>
                    Alternatively, to pay via MPESA, please use the below payment details:
                </p>
                <ul>
                    <li>Booking.com BV Mpesa Paybill No: 310473</li>
                    <li>
                        Account Number: Please mention Accommodation Number as Account number.
                    </li>
                </ul>
                <p>
                    Payment by cash will be accepted at any branch of Standard Chartered.
                    Please complete the green carbon paper Cash Deposit Slip - in duplicate
                    - writing your Invoice Number and Hotel Name on the slips before handing
                    them to the cashier. Your telephone number may be left on the bottom of
                    the slip, in case a query arises. For your records, the bank will
                    provide you with computer-printed confirmation of payment.
                </p>
    </div>
    <div class="invoice_footer">
        <h4>
            PLEASE BE AWARE THAT OUR INVOICES ARE BASED ON DEPARTURE DATE AND NOT ON
            ARRIVAL DATE
        </h4>
        <p>
            For a detailed overview of reservations please log in to your Extranet
            (http://www.booking.com/hotelaccess), go to Finance tab and click on
            "Reservation Statements"
        </p>
        <p>
            For finance and invoice related questions, please visit our
            <a href="#">PARTNER HELP CENTER</a>
        </p>
    </div>
</body>

</html>
