<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Pagos extends Model
{



    public static $rules = [
        'chofer'=> 'required',
        'cantidad_servicios'=> 'required',
        'monto_pago'=> 'required',

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


    protected $table = 'pagos';




    protected $fillable = ['chofer', 'cantidad_servicios', 'monto_pago',];



    public function choferes(){


        return $this->belongsTo('App\Choferes','chofer_id','id');


    }





}
