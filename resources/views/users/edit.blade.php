@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')

<div class="container">
    <br>
    <br>
    <h1 class="text-center mb-4">Editar Usuario</h1>

    <form action="{{route('users.update', $user->id)}}" method="post">
        @csrf
        @method('put')

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input 
                type="text" 
                class="form-control" 
                name="nombre" 
                value="{{$user->name}}"
                required
                pattern="[A-Za-záéíóúÁÉÍÓÚñÑ\s]+"
                oninput="this.value = this.value.replace(/[^A-Za-záéíóúÁÉÍÓÚñÑ\s]/g, ''); validarEspacios(this)"
                title="Solo se permiten letras"
            >
            <div class="invalid-feedback">El nombre solo debe contener letras.</div>
        </div>

        <div class="mb-3">
            <label class="form-label">Correo</label>
            <input type="text" class="form-control" name="correo" value="{{$user->email}}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Rol</label>
            <select class="form-select" name="rol" required>
                @if($roles->isEmpty())
                    <option disabled selected>No existen roles aún, crea uno primero</option>
                @else
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">
                            {{ $role->name ?? 'Rol ID: '.$role->id }}
                        </option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Contraseña</label>
            <input type="password" class="form-control" name="contrasenia" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Volver</a>
    </form>

</div> 
<script>
    function validarEspacios(input) {
        if (input.value.trim() === '') {
            input.value = '';
            input.setCustomValidity('El nombre no puede estar vacío.');
            input.classList.add('is-invalid');
        } else {
            input.setCustomValidity('');
            input.classList.remove('is-invalid');
        }
    }
</script>
@endsection 