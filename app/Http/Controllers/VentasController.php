<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Ventas;
use App\Models\VentasContenido;
use App\Models\Servicios;
use Illuminate\Support\Facades\Auth;

class VentasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public $path = 'admin.ventas';
    public function index()
    {
        $sql = "SELECT v.id,v.fecha,c.nombre,sum(vc.precio) AS total,sum(vc.duracion) AS tiempo
                FROM ventas AS v
                LEFT JOIN clientes AS c
                ON v.id_cliente=c.id
                LEFT JOIN ventas_contenido AS vc
                ON vc.id_venta=v.id
                GROUP BY v.id,v.fecha,c.nombre";
        $datos = DB::select($sql);
        //$datos = DB::table('ventas AS v')->join('clientes as c','v.id_cliente','c.id')->get();
        return view($this->path.'.index',compact('datos'));
    }
    public function create()
    {
        $clientes = DB::table('clientes')->get();
        return view($this->path.'.create',compact('clientes'));
    }
    public function store(Request $request)
    {
        $s = new Ventas();
        $s->id_cliente= $request->cliente;
        $s->id_usuario = Auth::user()->id;
        $s->fecha = date('Y-m-d');
        $s->save();
        return $s->id;
    }

    public function store_contenido(Request $request)
    {
        $servicios = $request->servicios;
        $id = $request->venta;
        foreach ( $servicios as $s )
        {
            $sv = Servicios::findOrFail($s);
            $vc = new VentasContenido();
            $vc->id_venta = $id;
            $vc->id_servicio = $s;
            $vc->precio = $sv->precio;
            $vc->duracion = $sv->duracion;
            $vc->save();
        }
        return 1;
    }
    public function contenido($id)
    {
        $venta = DB::table('ventas')->where('id',$id)->first();
        $cliente = DB::table('clientes')->where('id',$venta->id_cliente)->first();
        $servicios = DB::table('servicios')->get();
        $lineas = DB::table('ventas_contenido AS vc')->join('servicios AS s','s.id','vc.id_servicio')->where('id_venta',$venta->id)->select('vc.*','s.nombre')->get();
        $duracion = 0;
        foreach ( $lineas as $l )
        {
            $time = date("H",strtotime($l->duracion))*60+date("i",strtotime($l->duracion));
            $duracion += $time;
        }
        $precio = $lineas->sum('precio');
        return view($this->path.'.contenido',compact('servicios','venta','cliente','lineas','precio','duracion'));
    }
    public function delete(Request $request)
    {
        $datos = DB::table('ventas_contenido')->where('id_venta',$request->id)->get();
        foreach ( $datos as $data )
        {
            $vc = VentasContenido::findOrFail($data->id);
            $vc->delete();
        }
        $v = Ventas::findOrFail($request->id);
        $v->delete();
        return 1;
    }
    public function delete_contenido(Request $request)
    {
        $v = VentasContenido::findOrFail($request->id);
        $v->delete();
        return 1;
    }
}
