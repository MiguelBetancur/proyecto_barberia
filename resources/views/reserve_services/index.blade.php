@extends('layouts.app')

@section('title', 'Asignar Servicios')

@section('content')
<br>
<br>
<div class="container">

    <h1 class="text-center mb-4">Asignar Servicio a Reserva</h1>

    <form action="{{ route('reserve_services.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Reserva</label>
            <select class="form-select" name="reserve_id" required>
                @if($reserves->isEmpty())
                    <option disabled selected>No existen reservas aún, crea uno primero</option>
                @else
                    @foreach($reserves as $reserve)
                        <option value="{{ $reserve->id }}">
                            Reserva #{{ $reserve->id }}                       
                        </option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="b-3">
            <label class="form-label">Servicio</label>
            <select class="form-select" name="service_id" required>
                @if($services->isEmpty())
                    <option disabled selected>No existen servicios aún, crea uno primero</option>
                @else
                    @foreach($services as $service)
                        <option value="{{ $service->id }}">
                            {{ $service->name ?? 'Usuario ID: '.$service->id }} - ${{ $service->price }}
                        </option>
                    @endforeach
                @endif
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Enlazar</button>
    </form>

    <hr class="my-5">

    <h2 class="text-center mb-3">Listado</h2>
    <table class="table table-striped table-striped text-center">
        <thead>
            <tr>
                <th>Reserva</th>
                <th>Servicio</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reserve_services as $rs)
                <tr>
                    <td>Reserva #{{ $rs->reserve_id }}</td>
                    <td>{{ $rs->service->name ?? 'Sin servicio' }}</td>
                    <td>
                        <a href="{{ route('reserve_services.edit', $rs->id) }}" class="btn btn-warning btn-sm">
                            Editar
                        </a>

                        <form action="{{ route('reserve_services.destroy', $rs->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection