@extends('layouts.app')

@section('title', 'Editar Reserva')

@section('content')
<br>
<div class="container">
    <h1 class="text-center mb-4">Editar Reserva</h1>

            <form action="{{ route('reserves.update', $reserve->id) }}" method="POST">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label class="form-label">Fecha</label>
                    <input type="date" name="fecha" class="form-control" value="{{ $reserve->date }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Hora</label>
                    <input type="time" name="hora" class="form-control" value="{{ $reserve->time }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Estado</label>
                    <select name="estado" class="form-select" required>
                        <option value="pendiente" {{ $reserve->state == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="confirmada" {{ $reserve->state == 'confirmada' ? 'selected' : '' }}>Confirmada</option>
                        <option value="cancelada" {{ $reserve->state == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Usuario</label>
                    <select class="form-select" name="usuario_id" required>
                        @if($users->isEmpty())
                            <option disabled selected>No existen usuarios aún, crea uno primero</option>
                        @else
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">
                                    {{ $user->name ?? 'Usuario ID: '.$user->id }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('reserves.index') }}" class="btn btn-secondary">Volver</a>
            </form>
</div>

@endsection