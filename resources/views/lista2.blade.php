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
                    <div class="table-row">
                        <div class="visit">{{ $t->titulo }}</div>

                        <div class="serial">

                            <form action="{{ route('tabla') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_tipo_proyecto" value="{{ $t->id }}">
                                <input type="submit" value="Detalles" class="genric-btn danger">
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection