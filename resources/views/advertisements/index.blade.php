@extends('layouts.app')

@section('title', 'Publicidad')

@section('content')
<br>
<br>
<div class="container">
    <h1 class="text-center mb-4">Crear Aviso</h1>

    <form action="{{route('advertisements.store')}}" method="post">
        @csrf

        <div class="mb-3">
            <label class="form-label">Titulo</label>
            <input type="text" class="form-control" name="titulo" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Mensaje</label>
            <input type="text" class="form-control" name="mensaje" required>
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

        <button type="submit" class="btn btn-primary">Crear Aviso</button>
    </form>

    <hr class="my-5">

    <h2 class="text-center mb-3">Lista de Avisos</h2>

    <table class="table table-striped text-center">
        <thead>
            <th>ID</th>
            <th>Título</th>
            <th>Mensaje</th>
            <th>Usuario</th>
            <th>Opciones</th>
        </thead>
        <tbody>
            @foreach ($advertisements as $advertisement)
            <tr>
                <td>{{ $advertisement->id }}</td>
                <td>{{ $advertisement->title }}</td>
                <td>{{ $advertisement->message }}</td>
                <td>{{ optional($advertisement->user)->name ?? 'Sin usuario' }}</td>
                <td class="d-flex justify-content-center gap-2">
                    <a href="{{route('advertisements.edit', $advertisement->id)}}" class="btn btn-warning btn-sm">
                            Editar
                    </a>
                    <form action="{{route('advertisements.destroy', $advertisement->id)}}" method="post">
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