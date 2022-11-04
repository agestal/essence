<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use App\Models\Ventas;
use App\Models\VentasContenido;

class ventas_cmd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:ventas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $clientes = DB::table('clientes')->where('nombre','Ventas en B')->first();
        $idc = $clientes->id;
        $ventas = DB::table('ventas')->get();
        foreach ( $ventas as $v )
        {
            $vnt = Ventas::findOrFail($v->id);
            $vnt->id_cliente = $idc;
            $vnt->save();
        }
        $clientes = DB::table('clientes')->where('nombre','Ventas en A')->first();
        $idc = $clientes->id;
        $servicio = DB::table('servicios')->where('nombre','CORTE HOMBRE')->first();
        $ids = $servicio->id;

        $v1 = new Ventas();
        $v1->id_cliente = $idc;
        $v1->id_usuario = 1;
        $v1->fecha = '2022-11-02';
        $v1->created_at = '2022-11-02 16:00:00';
        $v1->updated_at = '2022-11-02 16:00:00';
        $v1->save();

        $vc1 = new VentasContenido();
        $vc1->id_venta = $v1->id;
        $vc1->id_servicio = $ids;
        $vc1->precio = 260;
        $vc1->created_at = '2022-11-02 16:00:00';
        $vc1->updated_at = '2022-11-02 16:00:00';
        $vc1->save();

        $v2 = new Ventas();
        $v2->id_cliente = $idc;
        $v2->id_usuario = 1;
        $v2->fecha = '2022-11-03';
        $v2->created_at = '2022-11-03 16:00:00';
        $v2->updated_at = '2022-11-03 16:00:00';
        $v2->save();

        $vc2 = new VentasContenido();
        $vc2->id_venta = $v2->id;
        $vc2->id_servicio = $ids;
        $vc2->precio = 194;
        $vc2->created_at = '2022-11-03 16:00:00';
        $vc2->updated_at = '2022-11-03 16:00:00';
        $vc2->save();

    }
}
