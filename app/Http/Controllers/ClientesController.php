<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Clientes;

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
        $s->apellido1 = $request->ape1;
        $s->apellido2 = $request->ape2;
        $s->email = $request->email;
        $s->movil = $request->tlf;
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
