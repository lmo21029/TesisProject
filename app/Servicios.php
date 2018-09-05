<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Servicios extends Model
{


    public static $rules = [
        'origen'=> 'required',
        'reforigen'=> 'required',
        'destino'=> 'required',
        'refdestino'=> 'required',
        'monto'=> 'required',
        'placa'=> 'required',
        'tipo_servicio'=> 'required',
        'kilometros'=> 'required',
        'tipo_cliente'=> 'required',
        'users_id'=> 'required',
        'empresa_id'=> 'required',
        'servicios_pagados'=> 'required',
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


    public function usuarios(){


        return $this->belongsTo('App\User','users_id','id');


    }


    public function empresa(){


        return $this->belongsTo('App\Empresas','empresa_id','id');


    }


    public function choferes(){


        return $this->belongsTo('App\Choferes','chofer_id','id');


    }


    protected $table = 'servicios';




    protected $fillable = ['origen','reforigen', 'destino','refdestino', 'monto','placa','kilometros','tipo_servicio','tipo_cliente','users_id','chofer_id','empresa_id','servicios_pagados'];



    public function origen()
    {
        return $this->hasOne('App\Estado', 'origen');
    }



    public static function todousers()
    {

        return self::all('users_id')->lists('users_id');
    }

    public static function todochof()
    {

        return self::all('chofer_id')->lists('chofer_id');
    }


}
