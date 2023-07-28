<?php

namespace App\Http\Controllers\Api;
use App\models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class registercontroller extends Controller
{
    public function store(Request $request) {
        // $register = new register;
        $register = new User;
        $register->name = $request->name;
        $register->email = $request->email;
        $register->password = bcrypt($request->password);
        // $register->remember_token = $register->createToken('MyApp')->accessToken; 
        $success['token'] = $register->createToken("MyApp")->accessToken;

        $pos = $register->save();


        return response()->json([
            'status' => true,
            'message' => 'success tambah data',
            'data'  => $success  
        ]);
    }
}
