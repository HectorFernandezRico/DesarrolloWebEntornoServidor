@extends('layouts.miniweb')

@section('container')
    <div class="container">
        <h2 class="text-center mb-4">Formulario de Solicitud de Viaje</h2>

        <form method="POST">
            
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" required>
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="tel" class="form-control" id="telefono" name="telefono" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="pais" class="form-label">País que quiere visitar</label>
                <input type="text" class="form-control" id="pais" name="pais" required>
            </div>

            <div class="mb-3">
                <label for="fecha_ida" class="form-label">Fecha de ida</label>
                <input type="date" class="form-control" id="fecha_ida" name="fecha_ida" required>
            </div>

            <div class="mb-3">
                <label for="fecha_vuelta" class="form-label">Fecha de vuelta</label>
                <input type="date" class="form-control" id="fecha_vuelta" name="fecha_vuelta" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>
@endsection
