<div class="card mb-3">
    <img src="https://images3.alphacoders.com/823/thumb-1920-82317.jpg" height="300px" class="card-img-top">
    <div class="card-body">
      <h2 class="card-title">Tiket Anda</h2>
      <p class="card-text">Semua Pesanan Anda.</p>
        
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nama Customer</th>
                <th scope="col">Nama Bus</th>
                <th scope="col">Asal</th>
                <th scope="col">Tujuan</th>
                <th scope="col">Seats</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Kontak Bus</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr> 
            </thead>
            <tbody>
            @foreach ($booking as $key => $booking)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{ Auth::user()->fname }} {{Auth::user()->lname}}</td>
                <td>
                @foreach ($buses as $bus)
                    @if ($bus->bus_id == $booking->bus_id)
                        {{ $bus->bus_name }}
                    @endif
                @endforeach
                </td>
                <td>{{$booking->source}}</td>
                <td>{{$booking->destination}}</td>
                <td>[
                    @foreach($booking->seats_booked as $seat)
                        {{ $seat }}
                    @endforeach]
                </td>
                <td>{{ $booking->total_price }}</td>
                <td>
                    @foreach ($buses as $bus)
                        @if ($bus->bus_id == $booking->bus_id)
                            {{ $bus->phone }}
                        @endif
                    @endforeach
                </td>
                <td>
                    @if ($booking->status == 1)
                        Reserved
                    @else
                        Booked
                    @endif
                </td>
                <td> 
                    <div class="row " >
                        <div class="col-md-2">
                            <form action="https://uat.esewa.com.np/epay/main" method="POST">
                                <input value="{{ $booking->total_price }}" name="tAmt" type="hidden">
                                <input value="{{ $booking->total_price }}" name="amt" type="hidden">
                                <input value="0" name="txAmt" type="hidden">
                                <input value="0" name="psc" type="hidden">
                                <input value="0" name="pdc" type="hidden">
                                <input value="epay_payment" name="scd" type="hidden">
                                <input value="Pawanbhai12223" name="pid" type="hidden">
                                <input value="{{ 'http://localhost:8000/home/booking/success'.'/$booking->booking_id?q=su' }}" type="hidden" name="su">
                                <input value="{{ 'http://localhost:8000/home/booking/failed'.'/$booking->booking_id?q=fu' }}" type="hidden" name="fu">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-usd"></i></button>
                            </form>

                        </div>
                        <div class="col-md-2" >
                           <a href="/home/booking/{{ $booking->booking_id }}/edit" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-edit"></i></a>
                        </div>
                        <div class="col-md-2 ">
                            <a href="{{ url('/home/booking/'.$booking->booking_id.'/delete') }}" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                        </div>
                        <div class="col-md-2 ">
                        <a href="/home/booking/{{ $booking->booking_id }}/downloadpdf" class="btn btn-sm btn-warning">download</a>
                        <a href="/home/booking/{{ $booking->booking_id }}/viewpdf" class="btn btn-sm btn-warning">view</a>

                        </div>
                      
                        
                    </div>
                  </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{ url('/home/enquiry')}}" class="btn btn-secondary">
            <span aria-hidden="true" class="glyphicon glyphicon-circle-arrow-left"></span>
        </a> 
    </div>
</div>


