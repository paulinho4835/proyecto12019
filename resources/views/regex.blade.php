@extends('layouts.app')

@section('content')

    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>

    <div class="section-top-border">
        <center><h3 class="mb-30">El registro fue exitoso. ¿Que desea hacer ahora?</h3></center>
        <br><br>
        <div class="progress-table-wrap">
            <div class="progress-table">


                                            <form action="{{ route('tabla') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id_tipo_proyecto" value="{{ $id }}">
                                                <center><input type="submit" value="Calcular Presupuesto" class="btn btn-info"></center>
                                        </form>
                                                                            </div>
                            </div>

            <center><a href="{{ url('/home') }}" class="btn btn-info" role="button">Regresar</a></center>
        </div>

@endsection