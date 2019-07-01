@extends('layouts.app')

@section('content')


    <div class="section-top-border">
        <h3 class="mb-30">Lista De Proyectos</h3>
        <div class="progress-table-wrap">
            <div class="progress-table">
                <div class="table-head">
                    <div class="visit">Nombre</div>
                </div>


                @foreach ($proy as $t)
                @foreach ($tipos as $ti)
                        @if ($ti->proyecto==$t->id)
                    <div class="table-row">

                        <div class="visit">{{ $t->titulo }}</div>

                        <div class="serial">

                            <div class="visit">{{ $ti->monto }}</div>

                        </div>
                    </div>
                        @endif
                @endforeach
                    @endforeach
            </div>

            <center><a href="{{ url('/home') }}" class="btn btn-info" role="button">Regresar</a></center>
        </div>
    </div>

@endsection