@extends('layouts.app')







@section('content')


    <style>
        table, th, td {
            border: 1px solid black;
        }

        *, *:before, *:after {
            -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;
        }


        .container {
            width: 500px;
            margin: 20px;
            background: #fff;
            padding: 20px;
            overflow: hidden;
            float: left;
        }

        .horizontal .progress-bar {
            float: left;
            height: 45px;
            width: 100%;
            padding: 12px 0;
        }

        .horizontal .progress-track {
            position: relative;
            width: 100%;
            height: 20px;
            background: #ebebeb;
        }

        .horizontal .progress-fill {
            position: relative;
            background: #666;
            height: 20px;
            width: 50%;
            color: #fff;
            text-align: center;
            font-family: "Lato","Verdana",sans-serif;
            font-size: 12px;
            line-height: 20px;
        }

        .rounded .progress-track,
        .rounded .progress-fill {
            border-radius: 3px;
            box-shadow: inset 0 0 5px rgba(0,0,0,.2);
        }

    </style>

    <script>
        $('.horizontal .progress-fill span').each(function(){
            var percent = $(this).html();
            $(this).parent().css('width', percent);
        });


        $('.vertical .progress-fill span').each(function(){
            var percent = $(this).html();
            var pTop = 100 - ( percent.slice(0, percent.length - 1) ) + "%";
            $(this).parent().css({
                'height' : percent,
                'top' : pTop
            });
        });
    </script>

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

    <br><br>

        <div class="container horizontal rounded">
            <div class="progress-bar horizontal">
                <div class="progress-track">
                    <div class="progress-fill">
                        <span>{{ $per }}%</span>
                    </div>
                </div>
            </div>
        </div>

    <center><a href="{{ url('/home') }}" class="btn btn-info" role="button">Regresar</a></center>



@endsection