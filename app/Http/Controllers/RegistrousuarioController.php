<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\roles;
use App\Models\datos_funcionarios;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Rules\Uppercase;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegistrousuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('revalidate');
        $this->middleware('Admin');
    }
    public function index()
    {
    	return view('funcionario.registro');
    }

    protected function validator_admin(array $data)
    {
        return Validator::make($data, [
            'email' => ['required','max:65', 'unique:usuarios','email_admin'],
            'password' => ['required','security_password', 'confirmed'],
            'nombres' => ['required','max:45','alpha_spaces', new Uppercase],
            'apellidos' => ['required','max:45','alpha_spaces', new Uppercase],
            'telefono' => ['required','numeric','digits_between:7,15'],
            'rol' => ['required'],

        ]);
    }

    protected function validator_aux(array $data)
    {
        return Validator::make($data, [
            'email' => ['required','max:65', 'unique:usuarios','email_sena'],
            'password' => ['required','security_password', 'confirmed'],
            'nombres' => ['required','max:45','alpha_spaces', new Uppercase],
            'apellidos' => ['required','max:45','alpha_spaces', new Uppercase],
            'telefono' => ['required','numeric','digits_between:7,15'],
            'rol' => ['required'],

        ]);
    }

    protected function validator_aprendiz(array $data)
    {
        return Validator::make($data, [
            'estado' => ['required'],
        ]);
    }
    protected function validator_informacion(array $data)
    {
        return Validator::make($data, [
            'email' => ['required','max:65', 'unique:usuarios','email_sena'],
        ]);
    }
    protected function validator_funcionario(array $data)
    {
        return Validator::make($data, [
            'email' => ['required','max:65', 'unique:usuarios','email_admin'],
            'estado' => ['required'],
            'nombres' => ['required','max:45','alpha_spaces', new Uppercase],
            'apellidos' => ['required','max:45','alpha_spaces' , new Uppercase],
            'telefono' => ['required','numeric','digits_between:7,15'],
            'rol' => ['required'],
        ]);
    }

    protected function validator_auxiliar(array $data)
    {
        return Validator::make($data, [
            'email' => ['required','max:65', 'unique:usuarios','email_sena'],
            'estado' => ['required'],
            'nombres' => ['required','max:45','alpha_spaces', new Uppercase],
            'apellidos' => ['required','max:45','alpha_spaces', new Uppercase],
            'telefono' => ['required','numeric','digits_between:7,15'],
            'rol' => ['required'],
        ]);
    }

    protected function validator_funcionario_sin_email(array $data)
    {
        return Validator::make($data, [
            'estado' => ['required'],
            'nombres' => ['required','max:45','alpha_spaces', new Uppercase],
            'apellidos' => ['required','max:45','alpha_spaces', new Uppercase],
            'telefono' => ['required','numeric','digits_between:7,15'],
            'rol' => ['required'],
        ]);
    }

    public function registrar(Request $request)
    {
        if($request->input('rol')== 3){
            $this->validator_aux($request->all())->validate();
            $user= new User();
            $datos= new datos_funcionarios();
            $user->email=$request->input('email');
            $user->password=Hash::make($request->input('password'));
            $user->rol=$request->input('rol');
            $user->save();
            $datos->nombres=$request->input('nombres');
            $datos->apellidos=$request->input('apellidos');
            $datos->telefono=$request->input('telefono');
            $datos->id_usuario=$user->id_usuario;
            $datos->save();
            alert()->success('Usuario registrado exitosamente');
            return redirect()->route('lista_funcionarios');
        }else{
            $this->validator_admin($request->all())->validate();
            $user= new User();
            $datos= new datos_funcionarios();
            $user->email=$request->input('email');
            $user->password=Hash::make($request->input('password'));
            $user->rol=$request->input('rol');
            $user->save();
            $datos->nombres=$request->input('nombres');
            $datos->apellidos=$request->input('apellidos');
            $datos->telefono=$request->input('telefono');
            $datos->id_usuario=$user->id_usuario;
            $datos->save();
            alert()->success('Usuario registrado exitosamente');
            return redirect()->route('lista_funcionarios');
        }
        
    }

    public function store_aprendiz()
    {
        $user =  User::all();
        return view('funcionario.store_aprendiz',compact('user'));
    }
    public function edit_aprendiz($id)
    {
        $user = User::find($id);
        return view('funcionario.edit_aprendiz',compact('user'));
    }
    public function update_aprendiz(Request $request, $id)
    {
        $this->validator_aprendiz($request->all())->validate();
        $user = User::find($id);
        $user->fill($request->all());
        $user->save();
        alert()->success('La Modificacion fue realizada correctamente.', 'Estado actualizado');
        return redirect()->route('lista_aprendiz');
    }
    public function edit_informacion($id)
    {
        $user = User::find($id);
        return view('funcionario.edit_informacion',compact('user'));
    }
    public function update_informacion(Request $request, $id)
    {
        $user = User::find($id);
        if ($user->email==$request->input('email')) {
            alert()->info('La Modificación no fue realizada.', 'Estas guardando el mismo correo que esta registrado')->autoclose(3500);
            return redirect()->route('lista_aprendiz');
        }
        else{
         $this->validator_informacion($request->all())->validate();
         $user->fill($request->all());
         $user->save();
         alert()->success('La Modificacion fue realizada correctamente.', 'Correo electronico actualizado');
         return redirect()->route('lista_aprendiz');
     }
 }
 public function store_funaux()
 {
    $user =  User::all();
    $roles = roles::all();
    return view('funcionario.store_funaux',compact('user','roles'));
}

public function edit_estado($id)
{
    $user = User::find($id);
    return view('funcionario.edit_estado',compact('user'));
}
public function update_estado(Request $request, $id)
{
    $this->validator_aprendiz($request->all())->validate();
    $user = User::find($id);
    $user->fill($request->all());
    $user->save();
    alert()->success('La Modificacion fue realizada correctamente.', 'Estado actualizado');
    return redirect()->route('lista_funcionarios');
}
public function edit_funcionario($id)
{
    $user = User::find($id);
    $datos_funcionarios = datos_funcionarios::where('id_usuario', '=',$id)->first();
    return view('funcionario.edit_funcionario',compact('user','datos_funcionarios'));
}
public function update_funcionario(Request $request, $id)
{
    $user = User::find($id);
    $datos_funcionarios = datos_funcionarios::where('id_usuario', '=',$id)->first();
    if ($user->email==$request->input('email')) {
        $this->validator_funcionario_sin_email($request->all())->validate();
        $user->fill([
            'rol' => $request->input('rol'),
            'estado' => $request->input('estado'),

        ]);
        $user->save();
        $datos_funcionarios->fill([
            'nombres' => $request->input('nombres'),
            'apellidos' => $request->input('apellidos'),
            'telefono' => $request->input('telefono'),
        ]);
        $datos_funcionarios->save();
        alert()->success('Las Modificaciones fueron realizadas correctamente excepto el correo debido a que es el mismo que tiene en la base de datos.', 'Datos actualizados ')->autoclose(3500);
        return redirect()->route('lista_funcionarios');
    }
    else{
        if ($request->input('rol')==3) {
            $this->validator_auxiliar($request->all())->validate();
            $user->fill([
                'email' =>$request->input('email'),
                'rol' => $request->input('rol'),
                'estado' => $request->input('estado'),

            ]);
            $user->save();
            $datos_funcionarios->fill([
                'nombres' => $request->input('nombres'),
                'apellidos' => $request->input('apellidos'),
                'telefono' => $request->input('telefono'),
            ]);
            $datos_funcionarios->save();
            alert()->success('Las Modificaciones fueron realizadas correctamente.', 'Datos actualizados');
            return redirect()->route('lista_funcionarios');
        }else{
            $this->validator_funcionario($request->all())->validate();
            $user->fill([
                'email' =>$request->input('email'),
                'rol' => $request->input('rol'),
                'estado' => $request->input('estado'),

            ]);
            $user->save();
            $datos_funcionarios->fill([
                'nombres' => $request->input('nombres'),
                'apellidos' => $request->input('apellidos'),
                'telefono' => $request->input('telefono'),
            ]);
            $datos_funcionarios->save();
            alert()->success('Las Modificaciones fueron realizadas correctamente.', 'Datos actualizados');
            return redirect()->route('lista_funcionarios');
        }
        
    }
    
}    

}
