<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Veces;
use DB;
use Session;
class VecesController extends Controller
{
    public function pedirvez(Request $request)
    {
        $nombre=$request->nombre;
        $tlf = $request->tlf;
        $mail = $request->email;
        $v = new Veces();
        $v->nombre = $nombre;
        $v->tlf = $tlf;
        $v->email = $mail;
        $v->ip = Veces::verip();
        $v->gestionada = false;
        $v->save();
        return redirect()->route('/');
    }
    public function pedirvezapi(Request $request)
    {
        $postdata = file_get_contents("php://input");
        if (isset($postdata)) {
         $request = json_decode($postdata);
        }
        $nombre=$request->nombre;
        $tlf = $request->tlf;
        $mail = $request->email;
        $v = new Veces();
        $v->nombre = $nombre;
        $v->tlf = $tlf;
        $v->email = $mail;
        $v->ip = Veces::verip();
        $v->gestionada = false;
        $v->save();
        return redirect()->route('/');
    }
    public function siguiente(Request $request)
    {
        $hayveces = Veces::where('gestionada',false)->count();
        if ( $hayveces > 0 )
        {
            $siguiente = Veces::where('gestionada',false)
                                ->orderBy('created_at','ASC')
                                ->first();
            $vez = Veces::findOrFail($siguiente->id);
            $vez->gestionada = true;
            $vez->save();
            return view('admin.siguiente',compact('siguiente'));
        }
        else 
        {
            return 0;
        }
    }
    public function whatsapp($id)
    {
        
    }
    public function siguiente_debug()
    {
        $hayveces = Veces::where('gestionada',false)->count();
        if ( $hayveces > 0 )
        {
            $siguiente = Veces::where('gestionada',false)
                                ->orderBy('created_at','ASC')
                                ->first();
            $vez = Veces::findOrFail($siguiente->id);
            $vez->gestionada = true;
            $vez->save();
            return view('admin.siguiente',compact('siguiente'));
        }
        else 
        {
            return 0;
        }
    }
}
