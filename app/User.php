<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Auth;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password','apellido','cedula','direccion','telefono','id_rol'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function setPasswordAttribute($value) {

        $this->attributes['password'] = \Hash::make($value);

    }


public function roles(){


    return $this->belongsTo('App\Rol','id_rol','id');


}


    public static function todousers()
    {

        return self::all()->lists('name', 'id');
    }


    public static function todousers2()
    {

        return self::where('id_rol', '=' , '2')->lists('name','id');

      // return Auth::user()->id;
    }
}


