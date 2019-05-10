@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>

            <button href="" type="button" class="btn btn-default">Invertir</button>
            <button onclick="window.location='{{ url('/lista') }}'" type="button" class="btn btn-default">Quiero un Prestamo</button>
            <button onclick="window.location='{{ url('/lista2') }}'" type="button" class="btn btn-default">Calculo de prestamos</button>

        </div>
    </div>
</div>
@endsection
