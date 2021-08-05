<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\InformacionMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Response;
class InformacionControllers extends Controller
{
    public function index(){
        return view('informacion.index');
    } 

    public function store (Request $request){
        $validate = $request->validate([
            'nombre' => 'required',
            'correo' => 'email:rfc,dns',
            'mensaje' => 'required',
        ]);
        $correo = new InformacionMailable($request->all());
        Mail::to('jppardom@hotmail.com')->send($correo);
        return 'Mensaje enviado con éxito';
    }
}