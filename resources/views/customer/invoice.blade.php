<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Invoice #{{ $booking->booking_id }}</title>
    

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
        .button {
        background-color: #1c87c9;
        border-radius: 25px;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 15px;
        margin: 4px 2px;
        cursor: pointer;
      }
    </style>
</head>
<body>

    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <h2 class="text-start">Shuttle Bus</h2>
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    <span>Invoice Id: {{ $booking->booking_id }}</span> <br>
                    <span>Date: {{ date('d-m-Y', time()) }}</span> <br>
                    <span>Address: UKDW</span> <br>
                </th>
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="2">Order Details</th>
                <th width="50%" colspan="2">User Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Order Id:</td>
                <td>{{ $booking->booking_id }}</td>

                <td>Full Name:</td>
                <td>{{ $booking->customer_id = Auth::user()->fname }} {{ $booking->customer_id = Auth::user()->lname }}</td>
            </tr>
            <tr>
                <td>Tracking Id/No.:</td>
                <td>{{ $booking->schedule_id }}</td>

                <td>Email Id:</td>
                <td>{{ $booking->customer_id = Auth::user()->email }}</td>
            </tr>
            <tr>
                <td>Ordered Date:</td>
                <td>{{ $booking->created_at }}</td>

                <td>Phone:</td>
                <td>{{ $booking->customer_id = Auth::user()->phone }}</td>
            </tr>
            <tr>
                <td>Payment Mode:</td>
                <td></td>

                <td>Address:</td>
                <td>{{ $booking->customer_id = Auth::user()->address }}</td>
            </tr>
            <tr>
                <td>Order Status:</td>
                <td>Unpaid</td>

                <td>Customer ID:</td>
                <td>{{ $booking->customer_id = Auth::user()->id}}</td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                    Order Items
                </th>
            </tr>
            <tr class="bg-blue">
                <th>Nomor Bus</th>
                <th>Nama Bus</th>
                <th>Harga</th>
                <th>Total Tiket</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td width="10%">@foreach($users as $user)
            @if($user->booking_id == $booking->booking_id)
                {{$user->bus_num}}
            @endif
@endforeach</td>
                <td>
                @foreach($users as $user)
            @if($user->booking_id == $booking->booking_id)
                {{$user->bus_name}}
            @endif
@endforeach
                </td>
                <td width="10%">@foreach($users as $user)
            @if($user->booking_id == $booking->booking_id)
                Rp {{$user->price}}
            @endif
@endforeach</td>
                <td width="10%"><?php
$cars= $booking->seats_booked;
echo count($cars);
?></td>
                <td width="15%" class="total-heading">Rp {{ $booking->total_price }}</td>
            </tr>
            
        </tbody>
        
    </table>
    <a href="{{ url('/home/booking')}}" class="button"> Back </a> 
        <br>
    <p class="text-center">
        Terimakasih
    </p>
    <a href="{{ url('/home/enquiry')}}" class="btn btn-secondary">
        </a>
    

</body>
</html>