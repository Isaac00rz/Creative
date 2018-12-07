<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Auth;// Biblioteca para poder acceder a las sesiones.


class homeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    public function admin(){
        return view('/Home/homeAdmin');
    }
    public function user(){
        return view('/Home/homeUsuario');
    }  

    public function Redireccion()
    {
        $id = Auth::id();
        $consulta = DB::table('roles')->select('Rol')->where('id','=',$id)->get();
        $rol = '';
        foreach($consulta as $c){
            $rol = $c->Rol;
        }
        if($rol=='Administrador'){
            return view('/Home/homeAdmin');
        }else if($rol == 'Usuario'){
            $ids = DB::table('FinMan')
                ->select('id_mantenimiento')->get();
                $data[] = 0;
                foreach($ids as $id){
                    $data[] = $id->id_mantenimiento;
                }

                if($data==null){
                    $data[] = 0;
                }
                $consulta = DB::table('mantenimiento')
                ->leftJoin('FinMan', 'mantenimiento.id_Mantenimiento', '=', 'FinMan.id_Mantenimiento')
                ->join('impresoras','mantenimiento.id_impresora','=','impresoras.id_impresora')
                ->select(DB::raw("mantenimiento.id_Mantenimiento,mantenimiento.descripcion,DATE_FORMAT(fechaMan,'%d/%m/%Y') as fechaMan,mantenimiento.id_impresora, modelo"))
                ->where('mantenimiento.Activo','=',1)
                ->whereNotIn('mantenimiento.id_Mantenimiento', $data)
                ->orderBy('fechaMan', 'asc')->paginate(15);

            return view('/Home/homeUsuario')->with('reportes',$consulta);
        }
    }

}


