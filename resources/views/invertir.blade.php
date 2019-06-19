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
    <label for="">Monto para invertir:</label><br><br>
    <label for="">{{ $proy->monto }}</label><br><br>
    <br>
    <br>

    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>

    <br><br>
    <div class="panel panel-default">
        <div class="panel-heading">Realizar inversion</div>
        <div class="panel-body">
            <form action="{{ url('/vistainv') }}" enctype="multipart/form-data" id="form1" name="form1" onsubmit="return val()" method="post">
    {!! csrf_field() !!}

                <div class="form-group{{ $errors->has('days') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Monto a invertir:</label>

                    @if($proy->monto!=$proy->invest)
                    <div class="col-md-6">
                        <input type="number" class="form-control" max="{{ $proy->monto-$proy->invest }}" name="monto" id="monto" value="{{ old('days') }}">

                        @if ($errors->has('days'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('days') }}</strong>
                                    </span>
                        @endif
                    </div>
                        @else
                        <div class="col-md-6">
                            <h1>El proyecto esta lleno</h1>
                        </div>
                    @endif
                </div>
                <input type="hidden" name="id_tipo" value="{{ $proy->id }}">
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" id="registrar" class="btn btn-primary">
                            Registrar Inversion
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <form action="{{ url('/verinv') }}" enctype="multipart/form-data" id="form1" name="form1" onsubmit="return val()" method="post">
        {!! csrf_field() !!}

        <input type="hidden" name="id_tipo" value="{{ $proy->id }}">
    <center><button type="submit" id="registrar" class="btn btn-primary">
            Ver Inversiones
        </button></center>
    </form>
    <center><a href="{{ url('/home') }}" class="btn btn-info" role="button">Regresar</a></center>


@endsection