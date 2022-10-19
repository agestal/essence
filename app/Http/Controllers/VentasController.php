<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Ventas;
use App\Models\VentasContenido;

class VentasController extends Controller
{
    public $path = 'admin.ventas';
    public function index()
    {
        $sql = "SELECT v.id,v.fecha,c.nombre,sum(vc.precio) AS total,sum(vc.duracion) AS tiempo
                FROM ventas AS v
                INNER JOIN clientes AS c
                ON v.id_cliente=c.id
                INNER JOIN ventas_contenido AS vc
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
    public function contenido($id)
    {
        $servicios = DB::table('servicios')->get();
        return view($this->path);
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
}
