@extends('layouts.app')

@section('title', 'Editar anuncio')

@section('content')
<br>
<br>
<div class="container">
    <h1 class="text-center mb-4">Editar Aviso</h1>

    <form action="{{route('advertisements.update', $advertisement->id)}}" method="post">
        @csrf
        @method('put')

        <div class="mb-3">
            <label class="form-label">Titulo</label>
            <input type="text" class="form-control" name="titulo" value="{{$advertisement->title}} required">
        </div>

        <div class="mb-3">
            <label class="form-label">Mensaje</label>
            <input type="text" class="form-control" name="mensaje" value="{{$advertisement->message}} required">
        </div>

        <div class="mb-3">
            <label class="form-label">Usuario</label>
            <select class="form-select" name="usuario_id" value="{{$advertisement->user_id}}" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('advertisements.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>

@endsection