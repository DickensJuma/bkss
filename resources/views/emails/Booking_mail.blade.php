<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booksasa.com</title>
    <style>
    body {
        background: #eff0f1;
        display: flex;
        justify-content: center;
    }

    .booking_mail_container {
        max-width: 768px;
        width: fit-content;
    }

    .booking_mail_container p:first-child {
        margin-bottom: 2rem;
    }

    .security {
        background: #fd7d142a;
        border: 1px solid #fd7e14 !important;
        padding: 3px 10px;

    }

    img {
        margin: 1.5rem 0px;

    }

    .booking_msg {
        border: 1px solid rgba(0, 0, 0, 0.2);
        padding: 10px;
        background: white;
        border-radius: 3px;
    }

    .table-blue {
        background: #000E32;
        color: #fff;
    }

    .booking_msg th,
    td {
        padding: 16px 5px;
    }

    .booking_msg table {
        width: 100%;
        border-collapse: collapse;
    }

    .booking_msg table th,
    .booking_msg table td {
        border: none;
    }

    .booking_msg table thead td {
        text-align: center
    }

    .aware {
        margin-bottom: 3rem;
    }

    .booking_mail_footer {
        text-align: center;
        color: grey;
        font-size: 14px;
    }

    .booking_mail_footer hr {
        border: none;
        border-bottom: 0.2px solid rgba(0, 0, 0, 0.1)
    }
    </style>
</head>

<body>
    <div class="booking_mail_container">
        <div class="security">
            <p>For security purposes make sure yourURL reads <a
                    href="https://admin.booksasa.com">https://admin.booksasa.com</a>
                when you sign in.
            </p>
        </div>
        <img src="{{ asset('front/assets/images/logo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3">
        <div class="booking_msg">
            <p>Dear Vittoria Suites Reservations</p>
            <p>The following reservation has an arrival date for today:</p>
            <table>
                <thead>
                    <tr class="table-blue">
                        <th>Reservation number</th>
                        <th>Guest name</th>
                        <th>Arrival date</th>
                        <th>Departure date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>784573456347</td>
                        <td>Karolis K</td>
                        <td>26 Jun 2021</td>
                        <td>27 Jun 2021</td>
                    </tr>
                </tbody>
            </table>
            <p class="aware">Please be aware that the guests are expected to arrive today.</p>
            <p>Best regards,</p>
            <p>Booksasa.com Customer Service Team</p>
        </div>
        <div class="booking_mail_footer">
            <p>Please don't reply to this email</p>
            <hr>
            <p>Copyright &copy; 2021 Booksasa.com. All rights reserved.</p>
            <p>This email was sent by booksasa.com, Kenya.</p>
        </div>
</body>

</html>