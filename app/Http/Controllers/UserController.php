<?php

namespace App\Http\Controllers;

use App\Choferes;
use App\Facturas;
use App\Gruas;
use App\Pagos;
use App\Servicios;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;


class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *4
     * @return Response
     */
    public function index()
    {
        return view('admin.roles.index', ['roles'=>User::paginate()]);
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

        $usuario = new User(Request::all());
        $usuario->save();

        return view('index');




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
        $conteo = User::all($id);
        return View::make('admin.index' ,array ('conteo'=>$conteo->count()));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

        $edit = User::find($id);

        $roles = User::paginate();

        return view('admin.roles.index', compact('edit','roles'));


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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return Redirect::route('registro_roles.index')->with('delete', true);
    }



    public function login()
    {
        $credentials = Input::only('email');
        $credentials['password'] = Input::get('password'); // siempre tiene q ser password el nombre del campo obligatoriamente por laravel
        if(Auth::attempt($credentials)) {

            if(Auth::user()->id_rol == 1){

                return Redirect::intended('admin');
            }




                elseif(Auth::user()->id_rol == 2)  {

                    return Redirect::intended('from');
                }



            elseif(Auth::user()->id_rol == 3){
                return Redirect::intended('adminpersonal');
            }




        }
            return Redirect::back()->withInput()->with(['login_fail' =>true]);
    }


    public  function  logout(){

        Auth::logout();
        return Redirect::to('welcome');


    }



    public function admin(){

        return view('admin.index',['usuarios'=>User::count(),'choferes'=>Choferes::count(),'servi'=>Servicios::count(),'pago'=>Pagos::count()]);

    }

    public function administrativo(){

        return view('adminpersonal.index',['choferesEstado'=>Choferes::where('estado','=','Activo')->count(),'gruas'=>Gruas::where('estado','=','Activo')->count()]);

    }


}
