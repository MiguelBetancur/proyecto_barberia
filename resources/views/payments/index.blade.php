@extends('layouts.app')

@section('title', 'Pagos')

@section('content')
<br>
<div class="container">
    @if(Auth::user()->role_id == 33)
        <h1>Crear Pago</h1>

        <form action="{{ route('payments.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Reserva</label>
                <select class="form-select" name="reserve_id" id="reserveSelect" required>
                    @if($reserves->isEmpty())
                        <option disabled selected>No existen reservas aún, crea una primero</option>
                    @else
                        <option value="">Seleccionar</option>
                        @foreach($reserves as $reserve)
                            <option value="{{ $reserve->id }}" data-services='@json($reserve->services)'>
                                Reserva #{{ $reserve->id }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>

            <!-- TOTAL -->
            <div class="mb-3">
                <label>Total:</label>
                <p id="totalText" class="fw-bold text-success">$0</p>
            </div>

            <!-- MÉTODO -->
            <div class="mb-3">
                <label>Método de pago</label>
                <select name="method" class="form-select" required>
                    <option value="efectivo">Efectivo</option>
                    <option value="tarjeta">Tarjeta</option>
                    <option value="transferencia">Transferencia</option>
                </select>
            </div>

            <input type="hidden" name="amount" id="amountInput">

            <button class="btn btn-success">Pagar</button>
        </form>
     @endif
<br>
    @if(Auth::user()->role_id == 31)
      

        <h2 class="text-center mb-3">Historial de Pagos</h2>
        <a href="{{route('descargarPDFPayments')}}" class="btn btn-warning btn-sm"> Generar Listado PDF
        </a>
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Reserva</th>
                    <th>Total</th>
                    <th>Método</th>
                    <th>Fecha</th>
                    <th>Opciones</th>
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
                        <td>
                            <a href="{{route('payments.edit', $payment->id)}}" class="btn btn-warning btn-sm">Editar</a>

                            <form action="{{route('payments.destroy', $payment->id)}}" method="post" style="display:inline;">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

<!-- SCRIPT -->
<script>
document.getElementById('reserveSelect').addEventListener('change', function() {
    let selected = this.options[this.selectedIndex];

    let data = selected.getAttribute('data-services');

    if (!data) {
        document.getElementById('totalText').innerText = '$0';
        document.getElementById('amountInput').value = 0;
        return;
    }

    let services = JSON.parse(data);

    let total = 0;

    services.forEach(service => {
        total += parseInt(service.price);
    });

    document.getElementById('totalText').innerText = '$' + total;
    document.getElementById('amountInput').value = total;
});
</script>

@endsection