<?php

namespace App\Http\Controllers;

use App\Order;
use App\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
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
            $pedidos = Order::where('user_id', 'LIKE', '%' . $sql . '%')
                ->orderBy('id', 'desc')
                ->paginate(3);

            return view('pedido.index', ["pedidos" => $pedidos, "buscarTexto" => $sql]);
            //return $categorias;
        }
    }


    public function show($id)
    {
        $pedidos = Order::findOrFail($id);
        /*mostrar detalles*/
        $detalles = DB::table('orders_products')->join('products','orders_products.product_id','=','products.id')
        ->select('orders_products.cantidad','orders_products.precio','products.nombre as producto','orders_products.precio_u','products.id as productos')
        ->where('orders_products.order_id','=',$id)
        ->orderBy('orders_products.id', 'desc')->get();
        $ventas = Sale::where('order_id','=',$id)->orderBy('id','desc')->paginate(1);
        return view('pedido.show',['detalles' => $detalles, "pedidos"=>$pedidos, "ventas" => $ventas]);

    }

    

}
