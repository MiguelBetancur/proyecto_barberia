@extends('layouts.app')

@section('title', 'Servicios')

@section('content')
<br>    
<br>    
<div class="container">
    <h1 class="text-center mb-4">Crear Servicio</h1>

    <form action="{{route('services.store')}}" method="post">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input 
                type="text" 
                class="form-control" 
                name="nombre" 
                required
                pattern="[A-Za-záéíóúÁÉÍÓÚñÑ\s]+"
                oninput="this.value = this.value.replace(/[^A-Za-záéíóúÁÉÍÓÚñÑ\s]/g, ''); validarEspacios(this)"
            >
            <div class="invalid-feedback" id="error-nombre">El nombre solo debe contener letras.</div>
        </div>

        <div class="mb-3">
            <label class="form-label">Precio</label>
            <input type="number" class="form-control" name="precio" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Duración (minutos)</label>
            <input type="number" class="form-control" name="duracion" required>
        </div>

        <button type="submit" class="btn btn-primary">Crear Servicio</button>
    </form>

    <hr class="my-5">

    <h2 class="text-center mb-3">Lista de Servicios</h2>

    <table class="table table-striped mt-4 text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Duración (mins)</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->price }}</td>
                    <td>{{ $service->duration }}</td>
                    <td class="d-flex gap-2 justify-content-center">
                        <a href="{{route('services.edit', $service->id)}}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{route('services.destroy', $service->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
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