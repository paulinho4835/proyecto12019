


@extends('layouts.app')







@section('content')

    <h1>DETALLES</h1>


    <label for="">Nombre del proyecto: </label> <br><br>
    <label for="">{{ $proy->titulo }}</label>
    <br><br>
    <label for="">Descripcion:</label><br><br>
    <label for="">{{ $proy->descripcion }}</label><br><br>
    <br>
    <br>

    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>

    <br><br>
    <label for="">Tabla</label>

    <div class="table">
        <table>
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


@endsection