@extends('layouts.app')

@section('content')


    <div class="section-top-border">
        <h3 class="mb-30">Lista De Proyectos</h3>
        <div class="progress-table-wrap">
            <div class="progress-table">
                <div class="table-head">
                    <div class="visit">Nombre</div>
                </div>


                @foreach ($tipos as $t)
                    @if($t->owner==$id)
                    <div class="table-row">
                        <div class="visit">{{ $t->titulo }}</div>

                        <div class="serial">

                            <form action="{{ route('tabla') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_tipo_proyecto" value="{{ $t->id }}">
                                <input type="submit" value="Calcular" class="genric-btn danger">
                            </form>
                            @if($t->user==$id)
                            <form action="{{ route('comprar') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_tipo" value="{{ $t->id }}">
                                <input type="submit" value="Poner en venta" class="genric-btn danger">
                            </form>
                                @endif
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>

            <center><a href="{{ url('/home') }}" class="btn btn-info" role="button">Regresar</a></center>
        </div>
    </div>

@endsection