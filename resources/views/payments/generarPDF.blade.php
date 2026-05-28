<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #333; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Historial de Pagos</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Reserva</th>
                <th>Total</th>
                <th>Método</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
            <tr>
                <td>{{ $payment->id }}</td>
                <td>Reserva #{{ $payment->reserve_id }}</td>
                <td>${{ $payment->amount }}</td>
                <td>{{ ucfirst($payment->method) }}</td>
                <td>{{ $payment->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>