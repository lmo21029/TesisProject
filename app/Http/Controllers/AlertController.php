<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AlertController extends Controller
{

    public function show()
    {
        \Alert::message('this is a test message', 'info');
        return view('choferes.index');
    }

}
