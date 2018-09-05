<?php

namespace App\Http\Controllers;

use App\Choferes;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class ChoferesController extends Controller
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
        return view('admin.choferes.index', ['choferes'=>Choferes::paginate()]);
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





        if  (!Choferes::isValid(Input::all()))
        {
            return Redirect::back()->withInput()->withErrors(Choferes::$messages);
        }

        Choferes::create(Input::all());

        return Redirect::route('choferes.index')->with('succes', true);




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


        $edit = Choferes::find($id);

        $choferes = Choferes::paginate();

        return view('admin.choferes.index', compact('edit','choferes'));



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
        if (!Choferes::isValid(Input::all())) {
            return Redirect::back()->withInput()->withErrors(Choferes::$messages);
        }

        Choferes::find($id)->update(Input::all());

        return Redirect::route('choferes.index')->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Choferes::find($id)->delete();

        return Redirect::route('choferes.index')->with('delete', true);
    }

    public function actividad(){


    }


}


