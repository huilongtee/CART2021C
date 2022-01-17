<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>my PDF</title>
    <style>
        table,th,td{
            border: 1px solid #000;
            border-collapse: collapse;
        }
    </style>
</head>
<body>




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
                    @foreach ($data as $order)
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
    


    
</body>
</html>