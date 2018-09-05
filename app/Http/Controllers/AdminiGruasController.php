<?php

namespace App\Http\Controllers;

use App\Choferes;
use App\Gruas;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class AdminiGruasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('adminpersonal.gruas.index', ['gruas'=>Gruas::paginate(), 'gruas'=>Gruas::paginate()]);
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
        //
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
        $edit = Gruas::find($id);

        $gruas = Gruas::paginate();

        return view('adminpersonal.gruas.index', compact('edit','gruas'));
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

        $grua= Gruas::find($id);

        if  (Input::get('activar')){
            $grua->estado='activo';
        } elseif(Input::get('desactivar')){
            $grua->estado='Inactiva';
        }
        $grua->save();



        return Redirect::route('admin_grua.index')->with('success', true);
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
