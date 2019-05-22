@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear nueva solicitud de prestamo</div>
                    <div class="panel-body">
                        <form action="{{ url('/registro') }}" enctype="multipart/form-data" id="form1" name="form1" onsubmit="return val()" method="post">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Titulo:</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="titulo" id="titulo" value="{{ old('days') }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('section') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Descripcion:</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" name="note" rows="5" id="note" value="{{ old('note') }}"></textarea>

                                    @if ($errors->has('section'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('section') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('days') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Monto:</label>

                                <div class="col-md-6">
                                    <input type="number" class="form-control" min="5000" name="monto" id="monto" value="{{ old('days') }}">

                                    @if ($errors->has('days'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('days') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('days') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Plazo:</label>

                                <select name="plazo" id="plazo">
                                    <option value="1">un mes</option>
                                    <option value="2">dos meses</option>
                                    <option value="3">doce meses</option>
                                </select>
                            </div>

                            <div class="form-group{{ $errors->has('days') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Interes:</label>

                                <label>Interes
                                    <select name="interes" id="interes">
                                        <option name="1" value="1">6</option>
                                        <option name="2" value="2">8</option>
                                        <option name="3" value="3">12</option>
                                    </select>
                                </label>
                            </div>

                            <div class="form-group{{ $errors->has('days') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Pagos:</label>

                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="meses" id="meses" value="{{ old('days') }}">

                                    @if ($errors->has('days'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('days') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('note') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Garantia:</label>

                            </div>

                            <div>
                                <select id="garantia">
                                    <option value="1" name="mobiliario">mobiliario</option>
                                    <option value="2" name="immobiliario">immobiliario</option>
                                </select>
                                <br>
                                <label for="" id="lab1">Precio</label>
                                <input type="text" name="descripcion" id="box1">
                                <button type="button" id="bt1" onclick="garant()">Agregar</button>

                                <input type="hidden" id="h1" value="0">

                                @for($j=0;$j<3;$j++)
                                    <input type="hidden" name="b{{ $j }}1" id="b{{ $j }}1" value="">
                                    <input type="hidden" name="b{{ $j }}2" id="b{{ $j }}2" value="">
                                @endfor


                            </div>


                            <div>
                                <table>
                                    <tr>
                                        <th>Tipo</th>
                                        <th> Precio</th>
                                    </tr>
                                    @for($i=0;$i<3;$i++)
                                        <tr>
                                            <td><p id="d{{ $i }}1"></p></td>
                                            <td><p id="d{{ $i }}2"></p></td>
                                        </tr>
                                    @endfor
                                </table>



                            </div>

                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
                            <script>

                                function garant() {
                                    var h = document.getElementById("h1").value;
                                    var hi = parseInt(h, 10);
                                    var s = [];
                                    s[0] = [];
                                    var w = document.getElementById("garantia");
                                    s[0][0] = w.options[w.selectedIndex].text;
                                    s[0][1] = document.getElementById("box1").value;
                                    s[0][2] = document.getElementById("garantia").value;
                                    if(s[0][1]== ""){
                                        alert("Se debe llenar campo");
                                        return false;
                                    }
                                    if(isNaN(s[0][1])) {
                                        alert("Se debe poner numero");
                                        return false;
                                    }
                                    while(hi<3) {
                                        if(document.getElementById("d" + hi + "1").innerHTML == "") {
                                            document.getElementById("d" + hi + "1").innerHTML = s[0][0];
                                            document.getElementById("d" + hi + "2").innerHTML = s[0][1];
                                            document.getElementById("b" + hi + "1").value = s[0][2];
                                            document.getElementById("b" + hi + "2").value = s[0][1];
                                            hi = hi + 1;
                                            document.getElementById("box1").value = '';
                                            document.getElementById("h1").value = hi;
                                            break;
                                        }
                                        else {
                                            hi = hi + 1;
                                        }
                                    }

                                    /*for (var i=0;i<2;i++) {

                                    }*/

                                }

                                function val() {
                                    var nu1 = document.getElementById("monto").value;
                                    var hi = document.getElementById("h1").value;
                                    var e = 0;
                                    var f;
                                    if(hi>0){
                                        for(var i=0;i<hi;i++){
                                            f = parseInt(document.getElementById("b" + i + "2").value, 10);
                                            e=e+f;
                                        }
                                        if(nu1>e) {
                                            alert("El monto no debe exceder el valor de la suma de las garantias");
                                            return false;
                                        }
                                    }

                                }

                            </script>

                            <div class="col-md-6">
                                <br><br>
                                Archivos: <br>
                                <input multiple="multiple" name="files[]" type="file">
                                <br><br>
                                @if ($errors->has('note'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('note') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Registrar Solicitud
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <center><a href="{{ url('/home') }}" class="btn btn-info" role="button">Regresar</a></center>
    </div>
@endsection