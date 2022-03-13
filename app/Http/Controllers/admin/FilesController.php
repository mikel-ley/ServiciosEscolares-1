<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
//use RealRashid\SweetAlert\Facades\Alert;
Use Alert;
use App\Models\Externo;

class FilesController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$file = File::all();
        $file = File::whereUserId(Auth::id())->latest()->get();
        return view('admin.uploads.index',compact('file'));
    }

    public function Files(){
        $file = File::all();
        return view('admin.pasos.index',compact('file'));
    }


    public function Externo(){
        return view('admin.pasos.externo');
    }

    public function store(Request $request)
    {
        $max_size = (int)ini_get('upload_max_filesize') * 10240;

        $files = $request->file('files');
        $user_id = Auth::id();

        if ($request->hasFile('files') ) {

        foreach ($files as $file) {
            if (Storage::putFileAs('public/' . $user_id . '/', $file, $file->getClientOriginalName())) {
                File::create([
                    'name' => $file->getClientOriginalName(),
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

    public function download(File $file, $id){
        $file = File::whereId($id)->firstOrFail();
        return response()->download('storage' . '/' . Auth::id() . '/' . $file->name);
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
        $file = File::whereId($id)->firstOrFail();
        $user_id = Auth::id();

        if ($file->user_id == $user_id) {
            return redirect('/storage' . '/' . $user_id . '/' . $file->name);
        }else{
            return redirect('/storage' . '/' . $user_id . '/' . $file->name);
        }
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
        $file = File::whereId($id)->firstOrFail();
        unlink(public_path('storage' . '/' . Auth::id() . '/' . $file->name));
        $file->delete();

        Alert::info('¡¡¡ATENCION!!!', 'El Archivo Fue Eliminado Exitosamente!!!');
        return back();
    }
}
