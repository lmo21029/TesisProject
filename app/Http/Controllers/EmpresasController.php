<?php

namespace App\Http\Controllers;

use App\Empresas;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class EmpresasController extends Controller
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
        return view('admin.empresas.index', ['empresas'=>Empresas::paginate()]);
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
    public function store()
    {
        if  (!Empresas::isValid(Input::all()))
        {
            return Redirect::back()->withInput()->withErrors(Empresas::$messages);
        }

        Empresas::create(Input::all());

        return Redirect::route('empresas.index')->with('succes', true);
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
        $edit = Empresas::find($id);

        $empresas = Empresas::paginate();

        return view('admin.empresas.index', compact('edit','empresas'));
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
        if (!Empresas::isValid(Input::all())) {
            return Redirect::back()->withInput()->withErrors(Empresas::$messages);
        }

        Empresas::find($id)->update(Input::all());

        return Redirect::route('empresas.index')->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Empresas::find($id)->delete();

        return Redirect::route('empresas.index')->with('delete', true);
    }
}
