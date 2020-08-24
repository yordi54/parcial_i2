<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        if($request){

            $sql=trim($request->get('buscarTexto'));
            $categorias=Category::where('nombre','LIKE','%'.$sql.'%')
            ->orderBy('id','desc')
            ->paginate(10);

            return view('categoria.index',["categorias"=>$categorias,"buscarTexto"=>$sql]);
            //return $categorias;
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
        $categoria= new Category();
        $categoria->nombre= $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->estado= '1';
        $categoria->save();
        return Redirect::to("/admin/categoria");
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $categoria= Category::findOrFail($request->id_categoria);
        $categoria->nombre= $request->nombre;
        $categoria->descripcion= $request->descripcion;
        $categoria->estado= '1';
        $categoria->save();
        return Redirect::to("/admin/categoria");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // 
            $categoria= Category::findOrFail($request->id_categoria);

            if($categoria->estado=="1"){
                
                $categoria->estado= '0';
                $categoria->save();
                return Redirect::to("/admin/categoria");
        
            } else{

                $categoria->estado= '1';
                $categoria->save();
                return Redirect::to("/admin/categoria");

            }
    }
}
