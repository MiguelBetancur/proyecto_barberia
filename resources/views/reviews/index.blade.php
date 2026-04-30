@extends('layouts.app')

@section('title', 'Reseñas')

@section('content')
<br>
<br>
<div class="container">
    <h1 class="text-center mb-4">Crear Reseña</h1>

    <form action="{{route('reviews.store')}}" method="post">
        @csrf

        <div class="mb-3">
            <label class="form-label">Comentario</label>
            <input type="text" class="form-control" name="comentario" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Calificación</label>
            <input type="text" class="form-control" name="calificacion" required>
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
        <button type="submit" class="btn btn-primary">Crear Reseña</button>
    </form>

    <hr class="my-5">

    <h2 class="text-center mb-3">Lista de Comentarios</h2>

    <table class="table table-striped mt-4 text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Comentario</th>
                <th>Calificación</th>
                <th>Usuario</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $review)
            <tr>
                <td>{{ $review->id }}</td>
                <td>{{ $review->comment }}</td>
                <td>{{ $review->rating }}</td>
                <td>{{ optional($review->user)->name ?? 'Sin usuario' }}</td>
                <td>
                    <a href="{{route('reviews.edit', $review->id)}}" class="btn btn-warning btn-sm">Editar</a>

                    <form action="{{route('reviews.destroy', $review->id)}}" method="post" style="display:inline;">
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