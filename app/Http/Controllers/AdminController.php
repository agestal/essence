<?php

namespace App\Http\Controllers;
use App\Models\Veces;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $veces = Veces::where('gestionada',false)->count();
        $users = User::count();
        $gestiones = Veces::where('gestionada',true)
                        ->where('updated_at','>=',date("Y-m-d"))
                        ->count();
        return view('admin.index',compact('veces','users','gestiones'));
    }
    public function veces_pendientes()
    {
        $veces = Veces::where('gestionada',false)->orderBy('created_at','ASC')->get();
        return view('admin.pendientes',compact('veces'));
    }
}
