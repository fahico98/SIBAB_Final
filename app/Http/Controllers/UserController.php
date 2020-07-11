<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    public function password ()
    {
        return View('perfil.password');
    }

        public function updatePassword(Request $request){
        $rules = [
            'mypassword' => 'required',
            'password' => 'required|confirmed|security_password',
        ];
        
        $messages = [
            'mypassword.required' => 'El campo es requerido',
            'password.required' => 'El campo es requerido',
            'password.confirmed' => 'Las contraseñas no coinciden',
            'password.min' => 'El mínimo permitido son 6 caracteres',
            'password.max' => 'El máximo permitido son 18 caracteres',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect('perfil/password')->withErrors($validator);
        }
        else{
            if (Hash::check($request->mypassword, Auth::user()->password)){
                $user = new User;
                $user->where('email', '=', Auth::user()->email)
                     ->update(['password' => bcrypt($request->password)]);
                if (Auth::user()->rol == '1') {
                         alert()->success('Administrador su Contraseña fue actualizada');     
                         return redirect()->route('PerfilA', [Auth::user()->id_usuario]);
                }     
                elseif (Auth::user()->rol == '2') {
                         alert()->success('Funcinario su Contraseña fue actualizada');     
                         return redirect()->route('Perfil', [Auth::user()->id_usuario]);
                } 
                elseif (Auth::user()->rol == '3') {
                         alert()->success('Auxiliar su Contraseña fue actualizada');     
                         return redirect()->route('Perfil', [Auth::user()->id_usuario]);
                } 
                if (Auth::user()->rol == '4') {
                         alert()->success('Aprediz su Contraseña fue actualizada');     
                         return redirect()->route('PerfilAp', [Auth::user()->id_usuario]);
                }                                                
            }
            else
            {
                return redirect('perfil/password')->with('message', 'Contraseñas incorrectas');
            }
        }
    }

}
