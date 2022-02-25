<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email|email'
        ]);
        if($validator->fails())
            return response()->json([
                'data' => 'No se ha podido crear el usuario', 
                'errors' => $validator->errors()
            ], 400);

        
        $user = User::create($request->all());

        
        return response()->json(['data' => $user], 200);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);
        if($validator->fails())
            return response()->json([
                'data' => 'Datos incompletos', 
                'errors' => $validator->errors()
            ], 400);
        $data = $request->all();
        $user = User::where('email', '=', $request['email'])->first();
        if(empty($user)) //no se encontró un usuario con el email especificado
        {
            return response()->json(['data' => 'No existe un usuario con el email ingresado '], 401);
        }
        else
        {
            //si la contraseña está vacía, se crea
            if(empty($user->password))
            {
                $user->password = bcrypt($data['password']);
                $user->save();
                if(Auth::attempt($data))
                {
                    $userAuth = Auth::user();
                    return response()->json([
                        'data' => 'Contraseña seteada y login correcto',
                        'user' => $userAuth
                    ], 200); 
                }
            }
            else
            {
                //se hace login normal, con la contraseña ingresada
                if(Auth::attempt($data))
                {
                    $userAuth = Auth::user();
                    return response()->json([
                        'data' => 'Login correcto',
                        'user' => $userAuth
                    ], 200); 
                }
                else
                {
                    return response()->json([
                        'data' => 'Error: Credenciales inválidas',
                    ], 401); 
                }
            }
        }
    }

}
