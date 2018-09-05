<?php

namespace App\Http\Controllers;

use App\Choferes;
use App\Servicios;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class AdminiServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('adminpersonal.servicios.index', ['servicios'=>Servicios::whereNull('chofer_id')->paginate()]);


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

        if  (!Servicios::isValid(Input::all()))
        {
            return Redirect::back()->withInput()->withErrors(Servicios::$messages);
        }

        Servicios::create(Input::all());




        return Redirect::route('admin_servicio.index')->with('succes', true);



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
        $edit = Servicios::find($id);

        $servicios =Servicios::whereNull('chofer_id')->paginate();;

        return view('adminpersonal.servicios.index', compact('edit','servicios'));
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
        if (!Servicios::isValid(Input::all())) {
            return Redirect::back()->withInput()->withErrors(Servicios::$messages);
        }

      $servicios=  Servicios::find($id);
        $servicios->update(Input::all());

        $chofer=Choferes::find($servicios->chofer_id);
        $chofer->estado='Inactivo';
        $chofer->servicios_realizados++;
        $chofer->update();


        return Redirect::route('admin_servicio.index')->with('success', true);
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
