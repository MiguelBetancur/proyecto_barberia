@extends('layouts.app')

@section('title', 'Roles')

@section('content')
<br>
<br>
<div class="container">

    <h1 class="text-center mb-4">Crear Rol</h1>

        <form action="{{route('roles.store')}}" method="post">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nombre del Rol</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Crear Rol</button>
        </form>

        <hr class="my-5">

    <h2 class="text-center mb-3">Lista de Roles</h2>

        <table class="table table-striped table-striped text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td class="d-flex justify-content-center gap-2">
                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning btn-sm">
                                Editar
                            </a>

                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>

@endsection