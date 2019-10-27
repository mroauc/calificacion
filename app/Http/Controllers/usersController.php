<?php

namespace App\Http\Controllers;

use App\User;
use App\facultad;
use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\SendMail;


class usersController extends Controller {

    public function index(Request $request){
    	$tipo=$request->user()->permiso;
    	if($tipo=='admin'){
    		return view('admin.index');
    	}else{
    		return view('secretario.index');
    	}
    }

    public function mostrar(){
    	$datos=User::paginate(3);
    	return view('user.index',compact('datos'));
    }

    public function create(){
        $facultades=facultad::all();
    	return view('user.create',compact('facultades'));
    }

    public function store(Request $request){
        $campos=[
            'nombre' => 'required|string|min:2',
            'apellidos' => 'required|string|max:100',
            'rut' => 'required|string|max:100',
            'email' => 'required|string|max:100',
            'facultad' => 'required|string|min:2'
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        $pass=random_int(100,1000);
        $nuevoUsuario=new User();
        $nuevoUsuario->email=request()->input('email');
        $nuevoUsuario->permiso=request()->input('permiso');
        $nuevoUsuario->facultad=request()->input('facultad');
        $nuevoUsuario->rut=request()->input('rut');
        $nuevoUsuario->password=Hash::make($pass);
        $nuevoUsuario->nombre=request()->input('nombre');
        $nuevoUsuario->apellidos=request()->input('apellidos');
        $nuevoUsuario->estado="ACTIVO";
        $nuevoUsuario->save();
        $remitente=request()->input('email');
        $data = new \stdClass();
        $data->nombre=request()->input('nombre');
        $data->pass=$pass;
        Mail::to($remitente)->send(new SendMail($data));
        return redirect('admin/usuarios')->with('Mensaje','Usuario añadido correctamente. Contraseña enviada al email');
    }

    public function buscar(Request $request){
        $rut=request()->input('rut');
        $datos=User::where('rut','=',$rut)->get();
        return view('user.buscar',compact('datos'));
    }

    public function edit($email){
        $user=User::findOrFail($email);
        return view('user.edit',compact('user'));
    }

    public function update(Request $request, $email){
        $datosUsuario=request()->except('_token');
        User::where('email','=',$email)->update($datosUsuario);
        return redirect('admin/usuarios')->with('Mensaje','Académico actualizado correctamente');
    }

    public function reenviarContraseña(Request $request){
        $datos=User::all();
        return view('user.indexReenviarContraseña',compact('datos'));
    }

    public function nuevaContraseña($email){
        $pass=random_int(100, 1000);
        User::where('email','=',$email)->update(['password'=>Hash::make($pass)]);
        $data = new \stdClass();
        $data->nombre=User::where('email','=',$email)->first()->nombre;
        $data->pass=$pass;
        Mail::to($email)->send(new SendMail($data));
        return redirect('admin/usuarios')->with('Mensaje','Contraseña enviada al email');
    }
}
