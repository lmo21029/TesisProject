<?php namespace App\Http\Requests;

class CreateUserRequest extends Request {

    public function rules(){

        return [
            'name' => 'required',

        ];

    }
}

