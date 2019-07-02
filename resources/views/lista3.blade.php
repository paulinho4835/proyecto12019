@extends('layouts.app')

@section('content')

    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>


    <div class="section-top-border">
        <center><h3 class="mb-30">Lista De Proyectos</h3></center>
        <br><br>
        <div class="progress-table-wrap">
            <div class="progress-table">
                <div class="table-head">
                </div>


                <table align="center" style="width:70%">
                <tr><th>Nombre del proyecto</th><th></th></tr>
                @foreach ($tipos as $t)
                        <div class="table-row">

                                <tr>
                                    <td><div class="visit">{{ $t->titulo }}</div></td>

                            <div class="serial">

                                    <form action="{{ route('invertir') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_tipo" value="{{ $t->id }}">
                                        <td><input type="submit" value="Invertir" class="genric-btn danger"></td>
                                    </form>
                            </div>
                                </tr>

                        </div>
                @endforeach
                </table>
            </div>

            <center><a href="{{ url('/home') }}" class="btn btn-info" role="button">Regresar</a></center>
        </div>
    </div>

@endsection