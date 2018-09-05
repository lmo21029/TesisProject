<?php

namespace App\Http\Controllers;

use App\Gruas;
use App\Http\Requests;
use App\Http\Controllers\Controllerroller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;

class GruasController extends Controller
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

        return view('admin.gruas.index', ['gruas'=>Gruas::paginate()]);

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

        if  (!Gruas::isValid(Input::all()))
        {
            return Redirect::back()->withInput()->withErrors(Gruas::$messages);
        }

        Gruas::create(Input::all()); echo'Guardado';

        return Redirect::route('gruas.index')->with('succes', true);
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

        return view('admin.gruas.index', compact('edit','gruas'));

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

        if (!Gruas::isValid(Input::all())) {
            return Redirect::back()->withInput()->withErrors(Gruas::$messages);
        }

        Gruas::find($id)->update(Input::all());

        return Redirect::route('gruas.index')->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {

        Gruas::find($id)->delete();

        return Redirect::route('gruas.index')->with('delete', true);
    }
}
