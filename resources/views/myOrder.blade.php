@extends('layout')
@section('content')


    <!--top of the table-->
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <br><br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>Order ID</td>
                        <td>Payment Status</td>
                        <td>Amount</td>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->paymentStatus }}</td>
                            <td>{{ $order->amount }}</td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="col-sm-2"></div>

    </div>

    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <a class="btn btn-sx- btn-info" href="{{route('pdfReport')}}">Download Report</a>
        </div>
    </div>
    <br>


@endsection
