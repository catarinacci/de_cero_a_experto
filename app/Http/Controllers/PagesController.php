<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateMessajeRequest;
class PagesController extends Controller
{
    protected $request;

    public function __construct()
    {
        $this->middleware('example', ['except' => ['']]);
    }

    public function home(){
        return view('home');
    }

    public function saludo($nombre = "Invitado"){
        return view('saludo', compact('nombre'));
    }

    // public function contacto(){
    //     return view('contacto');
    // }

    // public function mensajes(CreateMessajeRequest $request){
    //     //return $request->all();
    //     // $data = $request->all();
    //     // return response()->json(['data' => $data], 202);
    //     return back()->with('info', 'Tu mensaje ha sido enviado correctamente :)');

    // }
}
