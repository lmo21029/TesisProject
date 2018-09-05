<?php

namespace App\Http\Controllers;

use App\Pagos;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class PagosController extends Controller
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
        return view('admin.pagos.index', ['pagos'=>Pagos::paginate()]);
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

        return Redirect::route('pagos.index')->with('success', true);





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
        $edit = Pagos::find($id);

        $pagos = Pagos::paginate();

        return view('admin.pagos.index', compact('edit','pagos'));
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
        if (!Pagos::isValid(Input::all())) {
            return Redirect::back()->withInput()->withErrors(Pagos::$messages);
        }

        Pagos::find($id)->update(Input::all());

        return Redirect::route('pagos.index')->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Pagos::find($id)->delete();

        return Redirect::route('pagos.index')->with('delete', true);
    }
}
