<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Choferes extends Model
{


    public static $rules = [
        'nombre_chofer'=> 'required',
        'cedula_chofer'=> 'required',
        'telefono_chofer'=> 'required',
        'estado'=> 'required',
        'users_id'=> 'required',
        'gruas_id'=> 'required',
        'servicios_realizados'=> 'required',

    ];

    public static $messages;

    public static function isValid($input)
    {
        $validator = Validator::make($input, self::$rules);

        if($validator->fails())
        {
            self::$messages = $validator->messages();
            return false;
        }
        return true;
    }

    protected $table = 'choferes';

    protected $fillable = ['nombre_chofer', 'cedula_chofer', 'telefono_chofer','estado','users_id','gruas_id','servicios_realizados'];



    public static function todochofere()
    {
        return self::where('estado','=','Activo')->orderBy('nombre_chofer')->lists('nombre_chofer', 'id');
    }



    public static function todochofere2()
    {

        return self::all()->lists('nombre_chofer','id');
    }












}
