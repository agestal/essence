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

        $sql = "SELECT extract(month from fecha) AS mes,sum(vc.precio) AS importe
                FROM ventas AS v
                INNER JOIN ventas_contenido AS vc
                ON vc.id_venta=v.id
                INNER JOIN clientes AS c
                ON v.id_cliente=c.id
                WHERE c.nombre='Ventas en A'
                GROUP BY mes
                ORDER BY mes";
        $datos = DB::select($sql);
        $va = [];
        $i = 1;
        while ( $i < 12 )
        {
            foreach ( $datos as $data )
            {
                if ( $data->mes == $i )
                {

                    array_push($va,$data->importe);
                }
            }
            array_push($va,0);
            $i++;
        }

        $sql = "SELECT extract(month from fecha) AS mes,sum(vc.precio) AS importe
                FROM ventas AS v
                INNER JOIN ventas_contenido AS vc
                ON vc.id_venta=v.id
                INNER JOIN clientes AS c
                ON v.id_cliente=c.id
                WHERE c.nombre='Ventas en B'
                GROUP BY mes
                ORDER BY mes";
        $datos = DB::select($sql);
        $vb = [];
        $i = 1;
        while ( $i < 12 )
        {
            foreach ( $datos as $data )
            {
                if ( $data->mes == $i )
                {

                    array_push($vb,$data->importe);
                }
            }
            array_push($vb,0);
            $i++;
        }
        $sql = "SELECT extract(month from fecha) AS mes,sum(vc.precio) AS importe
                FROM ventas AS v
                INNER JOIN ventas_contenido AS vc
                ON vc.id_venta=v.id
                GROUP BY mes
                ORDER BY mes";
        $datos = DB::select($sql);
        $v = [];
        $i = 1;
        while ( $i < 12 )
        {
            foreach ( $datos as $data )
            {
                if ( $data->mes == $i )
                {

                    array_push($v,$data->importe);
                }
            }
            array_push($v,0);
            $i++;
        }


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
        return view('admin.index',compact('veces','clientes','gestiones','ventas','ventas_mes','dias','va','vb','v'));
    }
    public function veces_pendientes()
    {
        $veces = Veces::where('gestionada',false)->orderBy('created_at','ASC')->get();
        return view('admin.veces.pendientes',compact('veces'));
    }
}
