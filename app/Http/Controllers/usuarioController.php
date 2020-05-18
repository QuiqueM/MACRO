<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sitiocentral;
use DB;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;

class usuarioController extends Controller
{
    public function index(){
        $sc = new sitiocentral();
        $sc->setConnection('sitiocentral');
        $sc = sitiocentral::where('tabla','=','usuarios')->first();
        $usuario = DB::connection('sitio'.$sc->sitio)->table($sc->nombre)
            ->orderBy('id','asc')
            ->get();
        return view('administracion.addUsuario',compact('usuario'));
    }

    public function agregarUsuario(Request $request){
        
        
        $sc = new sitiocentral();
        $sc->setConnection('sitiocentral');
        $sc = sitiocentral::where('tabla','empleado')->get();
        if(count($sc) == 2){
            DB::connection('sitio'.$sc[0]->sitio)->table($sc[0]->nombre)->insert([
                'nombre' => $request->nombre
            ]);
            DB::connection('sitio'.$sc[1]->sitio)->table($sc[1]->nombre)->insert([
                'telefono' => $request->telefono,
                'direccion' => $request->direccion
            ]);
            User::create([
                'usuario' => $request->usuario,
                'email' => $request->email,
                'rol' => $request->rol,
                'password' => Hash::make($request->password),
            ]);
            
            #hacemos el registro la bitacora de historial
            $sc = new sitiocentral();
            $sc->setConnection('sitiocentral');
            $sc = sitiocentral::where('tabla','historial')->first();
            DB::connection('sitio'.$sc->sitio)->table($sc->nombre)->insert([
                'empleado' => Auth::user()->id,
                'accion' => 'Añadio un nuevo usuario',
                'fecha' => Date('d-m-Y'),
                'hora' => Date('h:m:s')
            ]);
            return back()->with('add',true);
        } else {
            return back()->with('fail',true);
        }
        
    }
}
