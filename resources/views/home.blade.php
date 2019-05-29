@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Pagina Inicial</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Estas logueado!
                    </div>
                </div>

                <button href="" type="button" class="btn btn-default">Invertir</button>
                <button onclick="window.location='{{ url('/lista') }}'" type="button" class="btn btn-default">Crear Proyecto</button>
                <button onclick="window.location='{{ url('/lista2') }}'" type="button" class="btn btn-default">Calcular Presupuesto</button>
                <button onclick="window.location='{{ url('/comprados') }}'" type="button" class="btn btn-default">Proyectos Comprados</button>
                <button onclick="window.location='{{ url('/venta') }}'" type="button" class="btn btn-default">Proyectos en venta</button>
                <button onclick="window.location='{{ url('/venta2') }}'" type="button" class="btn btn-default">Compra de proyectos</button>

            </div>
        </div>
    </div>
@endsection
