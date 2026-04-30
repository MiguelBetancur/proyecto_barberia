@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')

<div class="container">
    <br>
    <br>
    <h1 class="text-center mb-4">Crear Usuario</h1>

    <form action="{{route('users.store')}}" method="post">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Correo</label>
            <input type="text" class="form-control" name="correo" required>
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

            <button type="submit" class="btn btn-primary">Crear Usuario</button>
    </form>

    <hr class="my-5">

    <h2 class="text-center mb-3">Lista de Usuarios</h2>

    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Opciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ optional($user->role)->name ?? 'Sin rol' }}</td>
                    <td class="d-flex justify-content-center gap-2">

                        <a href="{{route('users.edit', $user->id)}}" class="btn btn-warning btn-sm">
                            Editar
                        </a>

                        <form action="{{route('users.destroy', $user->id)}}" method="post">
                            @csrf
                            @method('delete')
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




