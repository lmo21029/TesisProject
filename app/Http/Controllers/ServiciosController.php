<?php

namespace App\Http\Controllers;

use App\Servicios;
use App\Choferes;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class ServiciosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.servicios.index', ['servicios'=>Servicios::paginate()]);
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


        $chofer=Choferes::find(Input::get('chofer_id'));
        $chofer->estado='Inactivo';
            $chofer->save();

        return Redirect::route('servicios.index')->with('succes', true);




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

        $servicios = Servicios::paginate();

        return view('admin.servicios.index', compact('edit','servicios'));






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

        Servicios::find($id)->update(Input::all());

        return Redirect::route('servicios.index')->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Servicios::find($id)->delete();

        return Redirect::route('servicios.index')->with('delete', true);
    }
}
