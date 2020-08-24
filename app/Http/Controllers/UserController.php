<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Role;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
            $usuarios = User::where('name', 'LIKE', '%' . $sql . '%')
                ->orderBy('id', 'desc')
                ->paginate(10);
            $roles = Role::all();


            //MOSTRAR TODAS LAS CATEGORIAS



            return view('usuario.index', ["usuarios" => $usuarios, "buscarTexto" => $sql, "roles" => $roles]);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $user = new User();
        $user->name = $request->nombre;
        $user->apellidos = $request->apellidos;
        $user->ci = $request->ci;
        $user->celular = $request->celular;
        $user->email = $request->email;
        $user->direccion = $request->direccion;
        $user->password = bcrypt($request->password);
        $user->estado = '1';
        $user->fecha_nacimiento = $request->fecha;
        $user->role_id = $request->id_rol;
        $imagen = $request->file('imagen');

        // Guardar imagen
        if ($imagen) {

            $image_path_name = time() . $imagen->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($imagen));
            $user->foto = $image_path_name;
        }

        $user->save();
        return Redirect::to("admin/usuario");
    }

    public function show($filename)
    {
        $file = Storage::disk('images')->get($filename);
        return new Response($file, 200);
    }
}
