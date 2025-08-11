<html>
<head>
    <title>Print Receipt</title>
    <style>
        body { font-family: monospace; margin: 0; padding: 1rem; }
        @media print { body { margin: 0; } }
    </style>
</head>
<body onload="window.print()">
    @include('orders.partials.receipt', ['order' => $order, 'company' => $company])
</body>
</html>
