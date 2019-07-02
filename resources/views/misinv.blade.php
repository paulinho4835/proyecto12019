@extends('layouts.app')

@section('content')

    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>


    <div class="section-top-border">
        <center><h3 class="mb-30">Mis Inversiones</h3></center>
        <br><br>
        <div class="progress-table-wrap">
            <div class="progress-table">
                <div class="table-head">

                </div>


                <table align="center" style="width:70%">
                    <tr><th>Nombre del proyecto</th><th>Monto</th></tr>
                @foreach ($proy as $t)
                @foreach ($tipos as $ti)
                        @if ($ti->proyecto==$t->id)
                            @if ($ti->usuario==$id)
                    <div class="table-row">

                        <tr>
                            <td><div class="visit">{{ $t->titulo }}</div></td>

                        <div class="serial">

                            <td><div class="visit">{{ $ti->monto }}</div></td>

                        </div>
                        </tr>
                    </div>
                        @endif
                        @endif
                @endforeach
                    @endforeach
                </table>
            </div>
            <br>

            <center><a href="{{ url('/home') }}" class="btn btn-info" role="button">Regresar</a></center>
        </div>
    </div>

@endsection