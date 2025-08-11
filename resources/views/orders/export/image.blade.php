<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Receipt</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; padding: 1rem; }
    </style>
</head>
<body>
    @include('orders.partials.receipt', ['order' => $order, 'company' => $company])
</body>
</html>
