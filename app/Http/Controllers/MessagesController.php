<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateMessajeRequest;
use App\Message;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' =>['create', 'store']]);
    }

    public function index()
    {
        //$messages = DB::table('message')->get();
        $messages = Message::all();
        return view('mensaje.index', ['messages'=>$messages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mensaje.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMessajeRequest $request)
    {
       //guardar mensaje
    //    DB::table('message')->insert([
    //        "nombre" => $request->input('nombre'),
    //        "email" => $request->input('email'),
    //        "mensaje" => $request->input('mensaje'),
    //        "created_at" => Carbon::now(),
    //        "updated_at" => Carbon::now()
    //    ]);

        // $message = new Message;
        // $message->nombre = $request->input('nombre');
        // $message->email = $request->input('email');
        // $message->mensaje = $request->input('mensaje');
        // $message->save();
        // dd($request->all());
        Message::create($request->all());
       //Redireccionar
       return redirect()->route('mensaje.create')->with('info', 'Hemos recibido tu mensaje');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $message = DB::table('message')->where('id', $id)->first();
        $message = Message::findOrFail($id);
        return view('mensaje.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $message = DB::table('message')->where('id', $id)->first();
        $message = Message::findOrFail($id);
        return view('mensaje.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Actualizar
        // DB::table('message')->where('id', $id)->update([
        //     "nombre" => $request->input('nombre'),
        //     "email" => $request->input('email'),
        //     "mensaje" => $request->input('mensaje'),
        //     "updated_at" => Carbon::now()
        // ]);

        Message::findOrFail($id)->update($request->all());

        //Redireccionar
        return redirect()->route('mensaje.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Eliminar mensaje
        // DB::table('message')->where('id', $id)->delete();
        Message::findOrFail($id)->delete();

        //Redireccionar
        return redirect()->route('mensaje.index');
    }
}
