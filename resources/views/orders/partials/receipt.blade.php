<style>
    @page {
        margin: 0cm;
    }

    body {
        margin: 0;
        padding: 12px;
        font-family: monospace;
        font-size: 12px;
    }

    .receipt {
        padding: 0;
        margin: 0;
        width: 100%;
        font-family: monospace;
        font-size: 12px;
        line-height: 1.3;
    }

    .receipt-header,
    .receipt-footer {
        text-align: center;
    }

    .receipt .title {
        font-size: 14px;
        font-weight: bold;
    }

    .receipt .line {
        border-top: 1px dashed #000;
        margin: 6px 0;
    }

    .receipt table {
        width: 100%;
        border-collapse: collapse;
    }

    .receipt th, .receipt td {
        padding: 2px 0;
    }

    .receipt .totals {
        font-weight: bold;
    }

    .text-left { text-align: left; }
    .text-right { text-align: right; }
    .text-center { text-align: center; }
</style>

<div class="receipt">
    <div class="receipt-header">
        <div class="title">{{ $company['company_name'] }}</div>
        <div>{{ $company['company_address_line_1'] }}</div>
        <div>{{ $company['company_address_line_2'] }}</div>
        <div class="line"></div>
        <div>Invoice: {{ $order->invoice_number }}</div>
        <div>Date: {{ $order->created_at }}</div>
        <div>Cashier: {{ $order->user->name }}</div>
        <div class="line"></div>
    </div>

    <table>
        <thead>
            <tr>
                <th class="text-left">Item</th>
                <th class="text-right">Qty</th>
                <th class="text-right">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->orderProducts as $item)
                <tr>
                    <td class="text-left">
                        {{ $item->product->name }}
                        <div style="font-size: 10px; color: #555;">SKU: {{ $item->product->sku }}</div>
                    </td>
                    <td class="text-right">{{ $item->quantity }}</td>
                    <td class="text-right">{{ $item->total_formatted }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="line"></div>

    <table>
        <tr class="totals">
            <td class="text-left">TOTAL</td>
            <td></td>
            <td class="text-right">{{ $order->total_formatted }}</td>
        </tr>
    </table>

    <div class="line"></div>

    <div class="receipt-footer">
        <p>Thank you for shopping!</p>
    </div>
</div>
