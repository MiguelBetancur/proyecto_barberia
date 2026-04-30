@extends('layouts.app')

@section('title', 'Editar Servicios')

@section('content')
<br>
<br>
<div class="container">
    <h1 class="mb-4">Editar Servicios de Reserva</h1>
    <form action="{{ route('reserve_services.update', $reserve->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- RESERVA -->
                <div class="mb-3">
                    <label class="form-label">Reserva</label>
                    <input type="text" class="form-control" value="Reserva #{{ $reserve->id }}" disabled>
                </div>

                <!-- SERVICIOS -->
                <div class="mb-3">
                    <label class="form-label">Servicios</label>

                    <select name="services[]" class="form-select" multiple size="5" required>
                        @foreach($services as $service)
                            <option value="{{ $service->id }}"
                                {{ $reserve->services->contains($service->id) ? 'selected' : '' }}>
                                {{ $service->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('reserve_services.index') }}" class="btn btn-secondary">Volver</a>

    </form>
</div>

@endsection