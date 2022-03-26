<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MessageFormat;
use App\Models\User;
use App\Notifications\MessageFormatSent;

class MessageFormatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required|min:10',
            'subject' => 'required|min:10',
            'body' => 'required|min:10',
            'file' => 'required|file|mimes:ppt,pptx,doc,docx,xlsx,txt,xlx,xls,pdf|min:1024',
            'to_user_id' => 'required|exists:users,id',
        ]);

        $message = MessageFormat::create([
            'name' => $request->name,
            'subject' => $request->subject,
            'body' => $request->body,
            'file' => $request->file,
            'from_user_id' => auth()->id(),
            'to_user_id' => $request->to_user_id,
        ]);

        $user = User::find($request->to_user_id);
        $user->notify(new MessageFormatSent($message));

        $request->session()->flash('flash.banner', 'Tu mensaje se Envio Exitosamente!!!');
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(MessageFormat $message){
        return view('admin.messages.show', compact('message'));
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
        //
    }
}
