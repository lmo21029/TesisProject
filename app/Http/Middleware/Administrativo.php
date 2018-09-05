<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Administrativo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {


            if ($this->auth->user()->id_rol != 3) {

                return redirect()->to('welcome');
            }


        return $next($request);



    }




protected $auth;

public function __construct(Guard $auth)
{
    $this->auth = $auth;
}




}
