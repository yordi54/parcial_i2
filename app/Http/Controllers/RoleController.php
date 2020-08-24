<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    //
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
       
        $roles = Role::where('estado','=','1')->orderBy('id','desc')->paginate(10);

        return view('rol.index',["roles" => $roles]);
        //return $categorias;


    }
}
