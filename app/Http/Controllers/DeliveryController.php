<?php

namespace App\Http\Controllers;

use App\Delivery;
use App\Order;
use App\Payment;
use App\User;
use App\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DeliveryController extends Controller
{
    //
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $entregas = Delivery::where('estado', '=', '0')->orderBy('id', 'desc')->paginate(10);
        $users = User::where('role_id', '=', '2')->orderBy('id', 'desc')->paginate(10);

        return view('entrega.index', ["users" => $users, "entregas" => $entregas]);
        //return $categorias;


    }

    public function store(Request $request)
    {
        //
        $entrega = new Delivery();
        $entrega->order_id = $request->pedido;
        $pedidos = Order::findOrFail($request->pedido);
        $pedidos->estado = 'E';
        $entrega->user_id = $request->usuario;
        $entrega->cargo = 5;
        $entrega->estado = '0';
        $entrega->save();
        $pedidos->save();
        return Redirect::to("/admin/entrega");
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
        $entrega = Delivery::findOrFail($request->id_entrega);
        $pago = Payment::where('order_id', '=', $entrega->order_id)
            ->orderBy('id', 'desc')->paginate(1);
        foreach ($pago as $p) {
            if ($p->estado == '0') {
                $p->estado = '1';
                $p->fecha = getdate();
                $p->save();
            }
        }
        $venta = Sale::where('order_id', '=', $entrega->order_id)
        ->orderBy('id', 'desc')->paginate(1);
        foreach ($venta as $v) {
            if ($v->estado == '0') {
                $v->estado = '1';
                $v->fecha = date('Y-m-d H:i:s');
                $v->save();
            }
        }
        $pedido = Order::where('id', '=', $entrega->order_id)
        ->orderBy('id', 'desc')->paginate(1);
        foreach ($pedido as $p) {
            if ($p->estado == 'E') {
                $p->estado = 'L';
                $p->fecha_entregada = date('Y-m-d H:i:s');
                $p->save();
            }
        }

        if ($entrega->estado == '0') {

            $entrega->estado = '1';
            $entrega->save();
            return Redirect::to("/admin/entrega");
        } else {

            $entrega->estado = '0';
            $entrega->save();
            return Redirect::to("/admin/entrega");
        }
    }
}
