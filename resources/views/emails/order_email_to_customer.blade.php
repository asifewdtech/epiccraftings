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
        <li>Hi, {{ @$data->customer->first_name." ".@$data->customer->last_name }}</li>
        <li>I hope this email finds you well.</li>
        <li>Thank you for placing an order with us. We are excited to make your customized neon sign.   </li>
        <li>Your order ID ({{@$data->order_number}}) has been confirmed and we are creating a mock-up as we speak. We will share the mock-up with you before we push it into production.</li>
        <li>If there are any issues/questions, please do not hesitate to reach out to us.</li>
        <li>Email  {{@$data->order_email_from}} </li>
        <li>Whatsapp  +16197961968 </li>
        <li><a href="https://www.instagram.com/{{@$data->order_from}}">Instagram</a></li>
        <li><a href="https://www.instagram.com/{{@$data->order_from}}">Facebook</a></li>
        <li>Please note that the payment descriptor may be different from our brand name ({{@$data->order_from}}) as you checkout. However, if the charges match the checkout amount, there is no cause for concern.</li>
        <li>Thank you again for shopping with us. If you have any other questions or queries, please feel free to contact us.</li>
        <li>Regards, </li>
        <li>Team {{@$data->order_from}}</li>
    </ul>
</body>
</html>