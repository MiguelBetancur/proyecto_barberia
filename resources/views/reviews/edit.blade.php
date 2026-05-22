@extends('layouts.app')

@section('title', 'Editar Reseña')

@section('content')

<div class="container">
    <h1 class="mb-4">Editar Reseña</h1>

    <form action="{{route('reviews.update', $review->id)}}" method="post">
        @csrf
        @method('put')

        <div class="mb-3">
            <span class="form-label">Comentario</span>
            <input type="text" class="form-control" name="comentario" value="{{ $review->comment }}" required>
        </div>

        <div class="mb-3">
            <span class="form-label">Calificación</span>
            <select class="form-control" name="calificacion" required>
                <option value="" disabled>Selecciona una calificación</option>
                @for ($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}" {{ $review->rating == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
            <div class="invalid-feedback">Debes seleccionar una calificación.</div>
        </div>

        <div class="b-3">
            <label class="form-label">Usuario</label>
            <select class="form-select" name="usuario_id" value="{{ $review->user_id }}" required>
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
        <button class="btn btn-primary">Guardar cambios</button>
        <a href="{{ route('reviews.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>

@endsection