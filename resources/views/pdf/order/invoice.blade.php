<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice - {{ $invoice_number }}</title>
    <style>
        body {
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #333;
            line-height: 1.6;
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            color: #555;
        }
        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: collapse;
        }
        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }
        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }
        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }
        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }
        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }
        .invoice-box table tr.heading td {
            background: #f8f9fa;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
            padding: 10px;
        }
        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }
        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
            padding: 10px;
        }
        .invoice-box table tr.item.last td {
            border-bottom: none;
        }
        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
            padding: 10px;
            font-size: 18px;
            color: #000;
        }
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'DejaVu Sans', 'Liberation Sans', sans-serif;
        }
        .rtl table {
            text-align: right;
        }
        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
        .badge {
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 12px;
            text-transform: uppercase;
            font-weight: bold;
        }
        .badge-success { background: #dcfce7; color: #166534; }
        .badge-pending { background: #fef9c3; color: #854d0e; }
        .text-right { text-align: right !important; }
        .mb-20 { margin-bottom: 20px; }
        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 12px;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <table>
            <tr class="top">
                <td colspan="4">
                    <table>
                        <tr>
                            <td class="title">
                                <span style="color: #3b82f6;">Cart</span>Me
                            </td>
                            <td>
                                Invoice #: {{ $invoice_number ?? 'N/A' }}<br>
                                Created: {{ \Carbon\Carbon::parse($date)->format('M d, Y') }}<br>
                                Status: <span class="badge {{ $order->status === 'paid' ? 'badge-success' : 'badge-pending' }}">{{ strtoupper($order->status) }}</span>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="4">
                    <table>
                        <tr>
                            <td>
                                <strong>CartMe E-commerce</strong><br>
                                123 Business Avenue<br>
                                Tech City, TC 54321<br>
                                contact@cartme.example
                            </td>
                            <td>
                                <strong>Bill To:</strong><br>
                                {{ $order->billing_first_name }} {{ $order->billing_last_name }}<br>
                                {{ $order->billing_address }}<br>
                                {{ $order->billing_city }}, {{ $order->billing_state }} {{ $order->billing_postcode }}<br>
                                {{ $order->billing_email }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>Item</td>
                <td class="text-right">Price</td>
                <td class="text-right">Quantity</td>
                <td class="text-right">Total</td>
            </tr>

            @foreach($items as $item)
            <tr class="item {{ $loop->last ? 'last' : '' }}">
                <td>{{ $item->product ? $item->product->name : 'Product Name' }}</td>
                <td class="text-right">${{ number_format($item->price, 2) }}</td>
                <td class="text-right">{{ $item->quantity }}</td>
                <td class="text-right">${{ number_format($item->price * $item->quantity, 2) }}</td>
            </tr>
            @endforeach

            <tr class="total">
                <td></td>
                <td></td>
                <td></td>
                <td class="text-right">
                   Total: ${{ number_format($total, 2) }}
                </td>
            </tr>
        </table>
        
        <div class="footer">
            <p>Thank you for your business!</p>
            <p>If you have any questions about this invoice, please contact us at support@cartme.example</p>
        </div>
    </div>
</body>
</html>
