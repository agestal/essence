<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ClientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public $path = 'admin.clientes';
    public function index()
    {
        $datos = DB::table('clientes')->get();
        return view($this->path.'.index',compact('datos'));
    }
    public function create()
    {
        return view($this->path.'.create');
    }
    public function store(Request $request)
    {
        $s = new clientes();
        $s->nombre = $request->nombre;
        $s->estetica = $request->estetica;
        $s->cita_previa = $request->cita;
        $s->save();
        return 1;
    }
    public function delete(Request $request)
    {
        $s = Clientes::findOrFail($request->id);
        $s->delete();
        return 1;
    }
}
