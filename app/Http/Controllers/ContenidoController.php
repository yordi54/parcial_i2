<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\Category;
use App\Order;
use App\Payment;
use App\Product;
use App\Sale;
use App\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;

use Barryvdh\DomPDF\Facade as PDF;

class ContenidoController extends Controller
{
    //
    //
    public function index()
    {
        $productos = Product::where('estado', '=', '1')->orderBy('id', 'desc')->paginate(7);
        $categorias = Category::all();
        return view('home', ["productos" => $productos, "categorias" => $categorias]);
    }

    public function show($filename)
    {
        $file = Storage::disk('products')->get($filename);
        return new Response($file, 200);
    }
    public function detalle($id)
    {
        $producto = Product::find($id);
        $categorias = Category::all();
        return view('detail',['producto' => $producto, "categorias" => $categorias]);
    }
    public function carrito()
    {
        $categorias = Category::all();
        return view('carrito' ,["categorias" => $categorias]);
    }
    public function addToCart($id)
    {
        $prod = Product::find($id);
        $cart = session()->get('cart');
        //si carrito esta vacio es el primer producto
        if (!$cart) {
            $cart = [
                $id => [
                    "id" => $prod->id,
                    "name" => $prod->nombre,
                    "quantity" => 1,
                    "price" => $prod->precio,
                    "photo" => $prod->imagen
                ]
            ];
            session()->put('cart', $cart);
            return Redirect::back();
        }
        //si carrito no esta vacio entonces verificamos el producto existe aumentamos la cantidad
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return Redirect::back();
        }
        //si el producto no existe entonces agregamos uno nuevo
        $cart[$id] = [
            "id" => $prod->id,
            "name" => $prod->nombre,
            "quantity" => 1,
            "price" => $prod->precio,
            "photo" => $prod->imagen
        ];
        session()->put('cart', $cart);
        return Redirect::back();
    }

    public function eliminarprod($id)
    {
        $carrito = session('cart');
        unset($carrito[$id]);
        session()->put('cart', $carrito);
        return redirect()->back()->with('success', 'Producto añadido correctamente');
    }


    public function pagar(Request $request)
    {
        $pago = $request->input('pago'); 
        $monto = 0;
        foreach (session('cart') as $id => $details) {
            $monto += $details['price'] * $details['quantity'];
        }

        $id = DB::table('orders')->insertGetId(
            ['user_id' => Auth::user()->id, 'fecha_solicitada' => date('Y-m-d'), 'fecha_entregada'=> null, 'estado' => 'P',
            'monto_total' => $monto+5]);
        $id_order = Order::where('estado','=','P')->orderBy('id','desc')->paginate(1);
        foreach($id_order as $ped){
            $pedido = $ped->id;
        }
        foreach (session('cart') as $id => $details) {
            DB::table('orders_products')->insert( ['order_id' => $pedido, 'product_id' => $details['id'],
            'cantidad' => $details['quantity'], 'precio_u' => $details['price'], 'precio' => $details['price']*$details['quantity']
            ]);  
            $producto = Product::find($details['id']);
            $producto->stock = $producto->stock - $details['quantity'] ;
            $producto->save();
        }
        DB::table('invoices')->insert(['id' => null]);
        $factura = Bill::orderBy('id','desc')->paginate(1);
        foreach($factura as $fac){
            $fact =$fac->id;
        }

        $venta = new Sale();
        $venta->order_id = $pedido;
        $venta->bill_id = $fact;
        $venta->fecha = null;
        $venta->monto = $monto+5;
        $venta->estado = '0';
        $venta->save();

        $pagos = new Payment();
        $pagos->order_id = $pedido;
        $pagos->monto = $monto+5;
        $pagos->tipo_pago = $pago;
        $pagos->voucher = null;
        $pagos->fecha = null;
        $pagos->estado = '0';
        $pagos->save();

        Session::forget('cart');
        Session::save();

        return Redirect::to('/');
        

    }

    public function showperfil(){
        $categorias = Category::all();
        return view('perfil',["categorias" => $categorias]);
    }

    public function perfil(Request $request){
        $user = User::find(Auth::user()->id);
        $user->name =$request->input('nombre');
        $user->apellidos = $request->input('apellidos');
        $user->ci = $request->input('ci');
        $user->email = $request->input('email');
        $user->direccion = $request->input('direccion');
        $user->celular = $request->input('telefono');
        $user->ciudad = $request->input('ciudad');
        $user->save();

        return redirect()->back()->with('success', 'Producto añadido correctamente');
    }

    public function pagarProd(){
        $categorias = Category::all();
        return view('pagoproducto',["categorias" => $categorias]);
    }

    public function detallepedido(){
        $pedidos = Order::where('user_id', '=', Auth::user()->id)->orderBy('id','desc')->paginate(20);
        $categorias = Category::all();
        return view('detailpedido',["pedidos" => $pedidos, "categorias" => $categorias]);
    }

    public function detallepago($id){
        $pagos = Payment::where('order_id','=',$id)->orderBy('id','desc')->paginate(1);
        $categorias = Category::all();
        return view('detailpago',["pagos" => $pagos, "categorias" => $categorias]);
    }


    public function subir_voucher(Request $request){
        $id = $request->input('usuario');
        $pago = Payment::find($id);
        $imagen = $request->file('voucher');
        if($imagen){
            $image_path_name = time().$imagen->getClientOriginalName();
            Storage::disk('vouchers')->put($image_path_name, File::get($imagen));
            $pago->voucher = $image_path_name;
            $pago->save();
        }
        
        return redirect()->back()->with('success', 'Producto añadido correctamente');
    }

    public function show_voucher($filename)
    {
        $file = Storage::disk('vouchers')->get($filename);
        return new Response($file, 200);
    }

    public function perfil_pago(Request $request){
        $user = User::find(Auth::user()->id);
        $user->name =$request->input('nombre');
        $user->apellidos = $request->input('apellidos');
        $user->email = $request->input('email');
        $user->direccion = $request->input('direccion');
        $user->celular = $request->input('telefono');
        $user->ciudad = $request->input('ciudad');
        $user->save();

        return redirect()->back()->with('success', 'Producto añadido correctamente');
    }
    public function categorias($id){
        $categorias = Category::all();
        $productos = Product::where('category_id', '=',$id)->orderBy('id','desc')->paginate(9);
        return view('categoriaproducto',["productos" => $productos, "categorias" =>$categorias]);

    }

    public function pedidopdf($id){
        $ventas = Sale::where('order_id','=',$id)->orderBy('id','asc')->get();
        $detalles = DB::table('orders_products')->join('products','orders_products.product_id','=','products.id')
        ->select('orders_products.cantidad','orders_products.precio','products.nombre as producto','orders_products.precio_u','products.id as productos')
        ->where('orders_products.order_id','=',$id)
        ->orderBy('orders_products.id', 'desc')->get();
        $pdf= PDF::loadView('pedidospdf',['ventas'=>$ventas,'detalles'=>$detalles]);
        return $pdf->download('venta.pdf');

    }

}
