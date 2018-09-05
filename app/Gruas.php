<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Gruas extends Model
{

    public static $rules = [
        'tipo_grua'=> 'required',
        'marca_grua'=> 'required',
        'placa_grua'=> 'required',
        'estado'=> 'required',
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


    protected $table = 'gruas';




    protected $fillable = ['tipo_grua', 'marca_grua', 'placa_grua','estado',];



    public static function todogruass()
    {

        return self::all()->lists('placa_grua','id');
    }

}
