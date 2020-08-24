<?php

namespace App\Http\Controllers;

use App\Order;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{
    //
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pagos = Payment::where('estado', '=', '0')->orderBy('id', 'desc')->paginate(5);


        return view('pago.index', ["pagos" => $pagos]);
        //return $categorias;


    }

    public function show($id)
    {
        $pago = Payment::find($id);
        return view('pago.show',["pago" => $pago]);
    }

    public function mostrar_voucher($filename)
    {
        $file = Storage::disk('vouchers')->get($filename);
        return new Response($file, 200);
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
        $categoria = Payment::findOrFail($request->id_pago);

        if ($categoria->estado == "0") {

            $categoria->estado = '1';
            $categoria->save();
            return Redirect::to("/admin/pago");
        } else {

            $categoria->estado = '0';
            $categoria->save();
            return Redirect::to("/admin/pago");
        }
    }
}
