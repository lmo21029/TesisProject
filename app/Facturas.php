<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Facturas extends Model
{



    public static $rules = [
        'descripcion'=> 'required',


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






    protected $table = 'facturas';

    protected $fillable = ['descripcion',];



}
