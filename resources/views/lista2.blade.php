@extends('layouts.app')

@section('content')

    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>

    <div class="section-top-border">
        <center><h3 class="mb-30">Mis Proyectos Creados</h3></center>
        <br><br>
        <div class="progress-table-wrap">
            <div class="progress-table">
                <div class="table-head">
                </div>


                <table align="center" style="width:70%">
                    <tr><th>Nombre del proyecto</th><th></th><th></th></tr>
                @foreach ($tipos as $t)
                    @if($t->owner==$id)
                    <div class="table-row">
                        <tr>
                            <td><div class="visit">{{ $t->titulo }}</div></td>

                        <div class="serial">

                            <form action="{{ route('tabla') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_tipo_proyecto" value="{{ $t->id }}">
                                <td><input type="submit" value="Calcular Presupuesto" class="genric-btn danger"></td>
                            </form>
                            @if($t->user==$id)
                            <form action="{{ route('comprar') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_tipo" value="{{ $t->id }}">
                                <td><input type="submit" value="Poner en venta" class="genric-btn danger"></td>
                            </form>
                                @endif
                        </div>
                        </tr>
                    </div>
                    @endif
                @endforeach
                </table>
            </div>
            <br>

            <center><a href="{{ url('/home') }}" class="btn btn-info" role="button">Regresar</a></center>
        </div>
    </div>

@endsection