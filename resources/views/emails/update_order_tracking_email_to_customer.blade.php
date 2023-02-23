<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>email</title>
</head>
<body>
    <ul style="list-style:none;">
        <li>Hi, {{ $data->customer->first_name." ".$data->customer->last_name }} your order tracking has been updated for shipping</li>
        <li>Order Number:#{{$data->order_number}} </li>
        <li>Order Tracking: {{$data->order_tracking}}</li>
        <li>Courier: {{$data->order_courier}}</li>
        <li>Order Shipping Date: {{$data->order_shipping_date}}</li>
        <li>If you have query about order please contact at {{$data->order_email_from}}</li>
        <li>Thanks</li>
    </ul>
</body>
</html>