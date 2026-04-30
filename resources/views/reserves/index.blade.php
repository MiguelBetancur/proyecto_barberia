@extends('layouts.app')

@section('title', 'Reservas')

@section('content')
<br>
<br>
<div class="container">

    <h1 class="text-center mb-4">Crear Reserva</h1>
    
            <form action="{{ route('reserves.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Fecha</label>
                    <input type="date" name="date" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Hora</label>
                    <input type="time" name="time" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Estado</label>
                    <select name="state" class="form-select" required>
                        <option value="pendiente">Pendiente</option>
                        <option value="confirmada">Confirmada</option>
                    </select>
                </div>

                <div class="b-3">
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
                <br>
                <button type="submit" class="btn btn-primary">Crear Reserva</button>
            </form>

    <hr class="my-5">

    <h2 class="text-center mb-3">Lista de Reservas</h2>

    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Estado</th>
                <th>Usuario</th>
                <th>Opciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach($reserves as $reserve)
            <tr>
                <td>{{ $reserve->id }}</td>
                <td>{{ $reserve->date }}</td>
                <td>{{ $reserve->time }}</td>
                <td>{{ $reserve->state }}</td>
                <td>{{ optional($reserve->user)->name ?? 'Sin usuario' }}</td>
                <td>
                    <a href="{{route('reserves.edit', $reserve->id)}}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{route('reserves.destroy', $reserve->id)}}" method="post" style="display:inline;">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection