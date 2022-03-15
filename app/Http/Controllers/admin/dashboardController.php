<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index(){

        $cant_users = User::count();


        return view('admin.index',compact('cant_users'));
    }
}
