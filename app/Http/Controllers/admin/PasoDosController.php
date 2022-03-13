<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Externo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
Use Alert;
use Illuminate\Http\Request;

class PasoDosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $externo = Externo::whereUserId(Auth::id())->latest()->get();
        return view('admin.pasos.dos.index',compact('externo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Externo(){
        $externo = Externo::all();
        return view('admin.pasos.externo',compact('externo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $max_size = (int)ini_get('upload_max_filesize') * 10240;

        $externos = $request->file('externos');
        $user_id = Auth::id();

        if ($request->hasFile('externos') ) {

        foreach ($externos as $externo) {
            if (Storage::putFileAs('public/Externo/' . $user_id . '/', $externo, $externo->getClientOriginalName())) {
                Externo::create([
                    'name' => $externo->getClientOriginalName(),
                    'user_id' => $user_id
                ]);
            }
        }

        Alert::success('EXCELENTE!!!', 'TU Archivo se Subio Exitosamente');
        return back();
        }else{
            Alert::error('¡¡¡ERROR!!!', 'Sube Uno o Varios Archivos');
            return back();
        }
    }

    public function download(Externo $externo, $id){
        $externo = Externo::whereId($id)->firstOrFail();
        return response()->download('storage/externo/' . '/' . Auth::id() . '/' . $externo->name);
        //dd('storage' . '/' . Auth::id() . '/' . $file->name);
        //return Storage::download('storage' . '/' . Auth::id() . '/' . $file->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $externo = Externo::whereId($id)->firstOrFail();
        $user_id = Auth::id();

        if ($externo->user_id == $user_id) {
            return redirect('/storage' . '/' . 'Externo/' . $user_id . '/' . $externo->name);
        }else{
            return redirect('/storage' . '/' . 'Externo/' . $user_id . '/' . $externo->name);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $externo = Externo::whereId($id)->firstOrFail();
        unlink(public_path('storage' . '/' . 'Externo/' . Auth::id() . '/' . $externo->name));
        $externo->delete();

        Alert::info('¡¡¡ATENCION!!!', 'El Archivo Fue Eliminado Exitosamente!!!');
        return back();
    }
}
