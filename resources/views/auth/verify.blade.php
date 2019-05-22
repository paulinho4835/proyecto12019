@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Verificar tu Correo Electronico') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Un link de verificacion fue enviado a tu correo.') }}
                            </div>
                        @endif

                        {{ __('Antes de proceder, por favor verifica tu correo electronico.') }}
                        {{ __('Si no reciviste el E-Mail') }}, <a href="{{ route('verification.resend') }}">{{ __('presiona aqui para recibir uno nuevo') }}</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
