<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\roles;
use App\Models\datos_funcionarios;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\RegitrousuarioController;
use Illuminate\Http\Request;

class PerfilController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
            $this->middleware('auth');
            $this->middleware('revalidate');
    }

    //Funcionarios
    public function index($id)
    {
     $user = User::find($id);
   // $roles= roles::where('id_rol', '=',$id)->first();
     $roles = roles::all();
     $datos_funcionarios = datos_funcionarios::where('id_usuario', '=',$id)->first();
     return view('perfil.Perfil',compact('user','roles','datos_funcionarios'));

   }

   // administrador
   public function indexA($id)
   {
     $users = User::find($id);
   // $roles= roles::where('id_rol', '=',$id)->first();
     $roles = roles::all();
     return view('perfil.PerfilA',compact('users','roles'));

   }

   public function indexAp($id)
   {
     $user = User::find($id);
   // $roles= roles::where('id_rol', '=',$id)->first();
     $roles = roles::all();
     return view('perfil.PerfilAp',compact('user','roles'));

   }

   protected function validator_funcionario(array $data)
   {
    return Validator::make($data, [

      'nombres' => ['required','max:45','alpha_spaces'],
      'apellidos' => ['required','max:45','alpha_spaces'],
      'telefono' => ['required','numeric','digits_between:7,15'],

    ]);
  }
  // protected function validator_password(array $data)
  //  {
  //     return Validator::make($data, [


  //   'password' => ['required', 'string', 'min:6', 'confirmed'],

  //     ]);
  // }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function edit_funcionario($id)
    {

     $user = User::find($id);
     $datos_funcionarios = datos_funcionarios::where('id_usuario', '=',$id)->first();
     return view('perfil.Perfil_edit',compact('user','datos_funcionarios'));
   }   
   public function update_funcionario(Request $request, $id)
   {
     $this-> validator_funcionario($request->all())->validate();
     $user = User::find($id);
     $datos_funcionarios = datos_funcionarios::where('id_usuario', '=',$id)->first();

     $datos_funcionarios->fill([
      'nombres' => $request->input('nombres'),
      'apellidos' => $request->input('apellidos'),
      'telefono' => $request->input('telefono'),
    ]);
     $datos_funcionarios->save();
     alert()->success('Las modificaciones fueron realizadas exitosamente' , 'Datos actualizados');
     return redirect()->route('Perfil',[$user->id_usuario]);
   }
  // public function clambiado(){
  //     return view('auth.passwords.reset');
  // }

  //  public function cambiar_passwords_edit($id)
  //  {

  //    $user = User::find($id);

  //    $user = User::where('id_usuario', '=',$id)->first();
  //    return view('perfil.Cambiar_password',compact('user','datos_funcionarios'));
  // }   


  // public function cambiar_passwords_update(Request $request, $id)
  // {
  //  $this-> validator_password($request->all())->validate();
  //  $user = User::find($id);
  //  $user = User::where('id_usuario', '=',$id)->first();

  //  $password->fill([
  //      'password' => Hash::make($data['password']),
  // ]);
  //  $password->save();
  //  return redirect()->route('Perfil',[$user->id_usuario])->with('status','Contraseña cambiada exitosamente');
  // }

  // public function clambiado(){
  //     return view('auth.passwords.reset');
  // }
 }
