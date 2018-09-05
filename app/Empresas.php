<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Empresas extends Model
{




    public static $rules = [
        'nombre_empresa'=> 'required',
        'rif_empresa'=> 'required',
        'direccion_empresa'=> 'required',
        'telefono_empresa'=> 'required',
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



    protected $table = 'empresas';

    protected $fillable = ['nombre_empresa', 'rif_empresa', 'direccion_empresa','telefono_empresa',];




    public static function todoempresa()
    {

        return self::all()->lists('nombre_empresa', 'id');
    }


}
