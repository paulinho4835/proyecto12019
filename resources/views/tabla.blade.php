


@extends('layouts.app')







@section('content')

    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>

    <center><h1>DETALLES</h1></center>


    <table align="center" style="width:70%">
        <tr><th>Nombre del proyecto</th><th>Descripcion</th></tr>
        <tr>
            <td><label for="">{{ $proy->titulo }}</label></td>
            <td><label for="">{{ $proy->descripcion }}</label></td>
        </tr>
    </table>
    <br>
    <br>


    <center><h4>Tabla de Presupuesto</h4></center>
    <div class="table">
        <table align="center">
            <tr>
                <th>Periodo</th>
                <th>Saldo Inicial</th>
                <th>Interes</th>
                <th>Abono a Capital</th>
                <th>Cuota a pagar</th>
                <th>Saldo Final</th>
            </tr>
            <?php
            $r = $proy->monto;
            ?>
            @for($i=0;$i<$cantidad_cuotas;$i++)
                <tr>
                    <td><p>{{ round($i+1, 2) }}</p></td>
                    <td><p>{{ round($r, 2) }}</p></td>
                    <td><p>{{ round($r*$pa, 2) }}</p></td>
                    <td><p>{{ round($cp-($r*$pa), 2) }}</p></td>
                    <td><p>{{ round($cp, 2) }}</p></td>
                    <?php $r = $r-($cp-($r*$pa));
                    if($r<0.05) $r = 0; ?>
                    <td><p>{{ round($r, 2) }}</p></td>
                </tr>

            @endfor
        </table>



    </div>

    <br>
    <br>
    <center><a href="{{ url('/lista2') }}" class="btn btn-info" role="button">Proyectos Creados</a></center>
    <center><a href="{{ url('/home') }}" class="btn btn-info" role="button">Menu Principal</a></center>


@endsection