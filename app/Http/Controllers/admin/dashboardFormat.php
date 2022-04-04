<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class dashboardFormat extends Controller
{
    public function __construct(){
        $this->middleware('can:admin.dashboard')->only('dashboard');
        //$this->middleware('can:admin.uploads.store')->only('edit','update', 'store');
    }


    public function index(){

        $users = User::where('id', '<>', auth()->user()->id)->get();

        return view('admin.dashboard', compact('users'));
    }
}
