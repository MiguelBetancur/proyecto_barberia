@extends('layouts.app')

@section('title', 'Editar Servicio')

@section('content')
<br>
<br>
<div class="container">
    <h1 class="text-center mb-4">Editar Servicio</h1>

    <form action="{{route('services.update', $service->id)}}" method="post">
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
            <label class="form-label">Precio</label>
            <input type="number" class="form-control" name="precio" value="{{$service->price}}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Duración (miutos)</label>
            <input type="number" class="form-control" name="duracion" value="{{$service->duration}}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('services.index') }}" class="btn btn-secondary">Volver</a>
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