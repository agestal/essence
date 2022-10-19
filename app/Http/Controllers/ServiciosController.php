<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Servicios;

class ServiciosController extends Controller
{
    public $path = 'admin.servicios';
    public function index()
    {
        $datos = DB::table('servicios as s')->join('categorias as c','s.id_categoria','c.id')->select('s.*','c.nombre AS categoria','c.cita_previa')->get();
        return view($this->path.'.index',compact('datos'));
    }
    public function create()
    {
        $categorias = DB::table('categorias')->get();
        return view($this->path.'.create',compact('categorias'));
    }
    public function store(Request $request)
    {
        $s = new Servicios();
        $s->nombre = $request->nombre;
        $s->id_categoria = $request->categoria;
        $s->precio = $request->precio;
        $s->duracion = $request->duracion;
        $s->save();
        return 1;
    }
    public function delete(Request $request)
    {
        $s = Servicios::findOrFail($request->id);
        $s->delete();
        return 1;
    }
}
