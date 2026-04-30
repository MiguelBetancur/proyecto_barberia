@extends('layouts.app')

@section('title', 'Editar Rol')

@section('content')
<div class="container">

    <h1 class="text-center mb-4">Crear Rol</h1>

        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ $role->name }}" required>
            </div>

            <button class="btn btn-primary">Actualizar</button>
            <a href="{{ route('roles.index') }}" class="btn btn-secondary">Volver</a>

        </form>

    </div>
</div>

@endsection