<?php

namespace App\Http\Controllers;
use App\Models\Veces;
use App\Models\Clientes;
use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $fechai = date('Y-m-')."01 00:00:00";
        $fechaf = date('Y-m-d 23:59:59');
        $ventas = DB::table('ventas_contenido')->where('created_at','>=',date('Y-m-d 00:00:00'))->where('created_at','<=',$fechaf)->sum('precio');
        $ventas_mes = DB::table('ventas_contenido')->where('created_at','>=',$fechai)->where('created_at','<=',$fechaf)->sum('precio');
        $sql = "SELECT count(distinct dia) AS dias FROM
                (
                    SELECT extract(day from created_at) AS dia
                    FROM ventas_contenido
                    WHERE created_at>='".$fechai."'
                    AND created_at<='".$fechaf."'
                ) AS s1";
        $ddias = DB::select($sql);
        $dias = $ddias[0]->dias;
        $veces = Veces::where('gestionada',false)->count();
        $clientes = Clientes::count();
        $gestiones = Veces::where('gestionada',true)
                        ->where('updated_at','>=',date("Y-m-d"))
                        ->count();
        return view('admin.index',compact('veces','clientes','gestiones','ventas','ventas_mes','dias'));
    }
    public function veces_pendientes()
    {
        $veces = Veces::where('gestionada',false)->orderBy('created_at','ASC')->get();
        return view('admin.veces.pendientes',compact('veces'));
    }
}
