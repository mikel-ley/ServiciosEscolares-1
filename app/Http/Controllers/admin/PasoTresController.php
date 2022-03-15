<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MessageFormat;

class PasoTresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::where('id', '<>', auth()->user()->id)->get();
        
        return view('admin.pasos.tres.index',compact('users'));
    }


}
