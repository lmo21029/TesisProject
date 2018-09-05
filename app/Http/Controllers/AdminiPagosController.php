<?php

namespace App\Http\Controllers;

use App\Pagos;
use App\Servicios;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class AdminiPagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function mostrarservicios(){

        $servicio=Servicios::where('chofer_id','=',Input::get('chofer_id'))->where('servicios_pagados','=','0')->paginate();

        $mensaje1='No hay servicios para cancelar';


        if (count($servicio)==0) {

            $servicio = null;




        }
        return view('adminpersonal.pagos.index', ['servicios'=>$servicio,'mensaje1'=>$mensaje1]);


    }


    public function index()
    {

        return view('adminpersonal.pagos.index', ['pagos'=>Pagos::paginate()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {





        if  (!Pagos::isValid(Input::all()))
        {
            return Redirect::back()->withInput()->withErrors(Pagos::$messages);
        }

        Pagos::create(Input::all());

        return Redirect::route('admin_pagos.index')->with('success', true);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $suma=0;
        $servicio=Servicios::where('chofer_id','=',$id)->where('servicios_pagados','=','0')->get();


        foreach ($servicio as $servi){

            $suma=(float)$servi->monto+$suma;
            $servi->servicios_pagados=1;
            $servi->update();
        }
        $pago= new Pagos();
            $pago->cantidad_servicios=count($servicio);
            $pago->monto_pago=$suma*0.1;
            $pago->chofer_id=$id;
            $pago->save();



        return Redirect::route('admin_pagos.index')->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
