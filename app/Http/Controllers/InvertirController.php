<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invertir;
use App\Garantia;
use App\Investment;
use Auth;
use App\Http\Requests\UploadRequest;


class InvertirController extends Controller
{
    public function formula()
    {
        return view('lista');
    }

    public function valid(UploadRequest $request)
    {
        $this->validate($request, [
            'titulo' => 'required',
            'note' => 'required',
            'monto' => 'required|numeric|min:1',
            'plazo' => 'required',
            'interes' => 'required',
            'meses' => 'required',
        ]);

        $iduser = Auth::user()->id;

        $invertir = new Invertir();
        $invertir->titulo = $request['titulo'];
        $invertir->descripcion = $request['note'];
        $invertir->monto = $request['monto'];
        $invertir->plazo = $request['plazo'];
        $invertir->interes = $request['interes'];
        $invertir->meses = $request['meses'];
        $invertir->user = $iduser;
        $invertir->owner = $iduser;
        $invertir->sell = 0;
        $invertir->invest = 0;
      //  $invertir->days = $request['days'];
       // $request['files']->store('files');

            $invertir->save();

        for($i=0;$i<3;$i++) {
                $b[$i][0] = $request['b'.$i.'1'];
                $b[$i][1] = $request['b'.$i.'2'];
        }

            $idg = $invertir->id;
        for($j=0;$j<3;$j++) {
            $garantia = new Garantia();
            $garantia->id_usuario = $idg;
            $garantia->monto = $b[$j][1];
            if($garantia->monto!=null) {
                $garantia->save();
            }
        }
        echo '<script language="javascript">';
        echo 'alert("Registro exitoso")';
        echo '</script>';
        return view('home');

    }

    public function comprar(Request $request){

        $prod = Invertir::findOrFail($request->id_tipo);

        $prod->sell = 1;
        $prod->save();
        echo '<script language="javascript">';
        echo 'alert("Proyecto puesto en venta")';
        echo '</script>';

        return redirect('home');

    }

    public function compra2(Request $request){

        $iduser = Auth::user()->id;
        $prod = Invertir::findOrFail($request->id_tipo);

        $prod->sell = 0;
        $prod->owner = $iduser;
        $prod->save();
        echo '<script language="javascript">';
        echo 'alert("Proyecto comprado")';
        echo '</script>';

        return redirect('home');

    }

    public function verproy(){

        $tipos = Invertir::all();
        $id = Auth::user()->id;

        return view('comprados' ,['tipos' => $tipos, 'id' => $id ]);
    }

    public function venta() {

        $tipos = Invertir::all();
        $id = Auth::user()->id;

        return view('venta' ,['tipos' => $tipos, 'id' => $id ]);
    }

    public function venta2() {

        $tipos = Invertir::all();
        $id = Auth::user()->id;

        return view('venta2' ,['tipos' => $tipos, 'id' => $id ]);
    }

    public function tabla(Request $request)
    {
        $id = $request['id_tipo_proyecto'];
        $proy = Invertir::where('id', $id)
            //  ->join('')
            ->first();

        $plazo=$proy->plazo;

        $cantidad_cuotas=0;
        switch($plazo)
        {
            case 1: //mensual
                switch($proy->interes)
                {
                    case 1:
                        $pa = 6/12;  break;

                    case 2:
                        $pa = 8/12; break;

                    case 3:
                        $pa = 12/12;  break;

                    //  default:
                    //  $pa = 1;

                }
                break;
            case 2: //bimestral
                switch($proy->interes)
                {
                    case 1:
                        $pa = 6/6;  break;

                    case 2:
                        $pa = 8/6; break;
                    case 3:
                        $pa = 12/6;  break;

                    // default:
                    //  $pa = 1;

                }
                break;
            case 3: //semestral
                switch($proy->interes)
                {
                    case 1:
                        $pa = 6/2;  break;

                    case 2:
                        $pa = 8/2; break;

                    case 3:
                        $pa = 12/2; break;
                    /*
                     default:
                       $pa = 1;*/

                }
                break;

            //default:
            // $pa = 1;
        }

        if($plazo==1) // mensual
        {  $cantidad_cuotas=($proy->meses)/1;  }
        else
        {
            if($plazo==2)  //bimestre
            {
                $cantidad_cuotas=($proy->meses)/2;
            }
            else
            {
                if($plazo==3) //semestre
                {
                    $cantidad_cuotas=($proy->meses)/6;
                }

            }
        }


        $pa = $pa/100;
        $c1 = pow(1+$pa,-$cantidad_cuotas);
        $c2 = 1-$c1;
        $c3 = $pa/$c2;
        $cp = $proy->monto*$c3; //enviando

        // return $cantidad_cuotas;

        //  return $cantidad_cuotas;
        return view('tabla',
            ['proy' => $proy, 'cp' => $cp, 'pa' => $pa, 'cantidad_cuotas' => $cantidad_cuotas]);


    }

    function lista(){


        $tipos = Invertir::all();
        $id = Auth::user()->id;


        return view('lista2' ,['tipos' => $tipos, 'id' => $id ]);
    }

    function listainv(){
        $tipos = Invertir::all();
        $id = Auth::user()->id;


        return view('lista3' ,['tipos' => $tipos, 'id' => $id ]);
    }

    function invertir(Request $request){
        $iduser = Auth::user()->id;
        $prod = Invertir::findOrFail($request->id_tipo);

        return view('invertir' ,['id' => $iduser, 'proy' => $prod ]);

    }

    function vistainv(Request $request){
        $iduser = Auth::user()->id;
        $prod = Invertir::findOrFail($request->id_tipo);
        $newinv = $prod->invest+$request->monto;

        if($prod->monto!=$prod->invest) {
            $investment = new Investment;
            $investment->usuario = $iduser;
            $investment->proyecto = $prod->id;
            $investment->monto = $request->monto;
            $investment->save();
            
            Invertir::where('id', $request->id_tipo)->update(['invest' => $newinv]);
            $prod = Invertir::findOrFail($request->id_tipo);
            $per = ($prod->invest*100)/$prod->monto;

            echo '<script language="javascript">';
            echo 'alert("Inversion exitosa")';
            echo '</script>';
            return view('vistainv' ,['id' => $iduser, 'proy' => $prod, 'per' => $per  ]);
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("El proyecto esta lleno")';
            echo '</script>';
            return view('invertir' ,['id' => $iduser, 'proy' => $prod ]);
        }

    }

    function verinv(Request $request){
        $iduser = Auth::user()->id;
        $prod = Invertir::findOrFail($request->id_tipo);
        $per = ($prod->invest*100)/$prod->monto;

        return view('vistainv' ,['id' => $iduser, 'proy' => $prod, 'per' => $per ]);

    }

    function misinv(){
        $tipos = Investment::all();
        $proy = Invertir::all();
        $id = Auth::user()->id;


        return view('misinv' ,['tipos' => $tipos, 'proy'=> $proy, 'id' => $id ]);
    }
}
