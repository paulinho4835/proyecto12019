@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <br><br><br><br>

        </div>
        <div>

            <button onclick="window.location='{{ url('/lista3') }}'" class="btn btn-success">Invertir</button>
            <button onclick="window.location='{{ url('/lista') }}'" type="button" id="crearproyecto" class="btn btn-success">Crear Proyecto</button>
            <button onclick="window.location='{{ url('/lista2') }}'" type="button" class="btn btn-success">Calcular Presupuesto</button>
            <button onclick="window.location='{{ url('/comprados') }}'" type="button" class="btn btn-success">Proyectos Comprados</button>
            <button onclick="window.location='{{ url('/venta') }}'" type="button" class="btn btn-success">Proyectos en venta</button>
            <button onclick="window.location='{{ url('/venta2') }}'" type="button" class="btn btn-success">Compra de proyectos</button>

        </div>
    </div>
@endsection
