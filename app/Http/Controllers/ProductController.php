<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;
use Barryvdh\DomPDF\Facade as PDF;
class ProductController extends Controller
{
    //
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
            $productos = Product::where('nombre', 'LIKE', '%' . $sql . '%')
                ->orderBy('id', 'desc')
                ->paginate(6);
            


            //MOSTRAR TODAS LAS CATEGORIAS
            $categorias = Category::where('estado', '=', '1')->get();
            

            return view('producto.index', ["productos" => $productos, "categorias" => $categorias, "buscarTexto" => $sql]);
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

        $producto = new Product();
        $producto->category_id = $request->id;
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->stock = 0;
        $producto->precio = $request->precio;
        $imagen = $request->file('imagen');
        
        // Guardar imagen
        if($imagen){
            
            $image_path_name = time().$imagen->getClientOriginalName();
            Storage::disk('products')->put($image_path_name, File::get($imagen));
            $producto->imagen = $image_path_name;
        }

        $producto->estado = '1';
        $producto->save();
        return Redirect::to("admin/producto");
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
        $producto = Product::findOrFail($request->id_producto);
        $producto->category_id = $request->id;
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->descripcion = $request->descripcion;
        $producto->stock = 0;
        $producto->estado = '1';
        $imagen = $request->file('imagen');
        
        $imagenes = 'storage/app/products/'.$producto->imagen;
      
        // Guardar imagen
        if($imagen){
            Storage::delete($imagenes);
            $image_path_name = time().$imagen->getClientOriginalName();
            Storage::disk('products')->put($image_path_name, File::get($imagen));
            $producto->imagen = $image_path_name;
        }
        $producto->save();
        return Redirect::to("admin/producto");
    }


    public function edit(Request $request)
    {
        //
        $producto = Product::findOrFail($request->id_producto);
        $producto->stock = $producto->stock + $request->stock;

        $producto->save();
        return Redirect::to("admin/producto");
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
        $producto = Product::findOrFail($request->id_producto);

        if ($producto->estado == "1") {

            $producto->estado = '0';
            $producto->save();
            return Redirect::to("admin/producto");
        } else {

            $producto->estado = '1';
            $producto->save();
            return Redirect::to("admin/producto");
        }
    }

    public function show($filename){
        $file = Storage::disk('products')->get($filename);
        return new Response($file, 200);
    }

    public function listarpdf(){
        $productos = Product::where('estado','=','1')->orderBy('id','asc')->get();
        $pdf= PDF::loadView('productopdf',["productos" => $productos]);
        return $pdf->download('producto.pdf');
    }
}
