<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    //
    //
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        if ($request) {

            $sql = trim($request->get('buscarTexto'));
            $clientes = User::where('role_id', '=', '5')
                ->orderBy('id', 'desc')
                ->paginate(3);

            return view('cliente.index', ["clientes" => $clientes, "buscarTexto" => $sql]);
        }
    }
}
