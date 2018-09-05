<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    public static $rules = [

        'nombre_estado'=> 'required',

    ];






    protected $table = 'Estado';

    protected $fillable = ['nombre_estado',];




    public static function todoestado()
    {
        return self::all()->sortBy('nombre_estado')->lists('nombre_estado', 'id');
    }

    public function servicio()
    {
        return $this->belongsToMany('App\Servicios', 'origen', 'id');
    }


}
