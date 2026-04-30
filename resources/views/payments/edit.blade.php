@extends('layouts.app')

@section('title', 'Editar Pago')

@section('content')

<div class="container">
    <h1>Editar Método de Pago</h1>

    <form action="{{ route('payments.update', $payment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Reserva</label>
            <input type="text" class="form-control" value="Reserva #{{ $payment->reserve_id }}" disabled>
        </div>

        <div class="mb-3">
            <label>Total</label>
            <input type="text" class="form-control" value="${{ $payment->amount }}" disabled>
        </div>

        <div class="mb-3">
            <label>Método</label>
            <select name="method" class="form-select" required>
                <option value="efectivo" {{ $payment->method == 'efectivo' ? 'selected' : '' }}>Efectivo</option>
                <option value="tarjeta" {{ $payment->method == 'tarjeta' ? 'selected' : '' }}>Tarjeta</option>
                <option value="transferencia" {{ $payment->method == 'transferencia' ? 'selected' : '' }}>Transferencia</option>
            </select>
        </div>

        <button class="btn btn-primary">Actualizar</button>
        <a href="{{ route('payments.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>

@endsection