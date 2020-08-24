<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;

use Barryvdh\DomPDF\Facade as PDF;

class SaleController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
       
        $ventas = Sale::where('estado','=','1')->orderBy('id','desc')->paginate(10);

        return view('venta.index',["ventas" => $ventas]);
        //return $categorias;

    }

    public function pdfventa (){
        $ventas = Sale::where('estado','=','1')->orderBy('id','asc')->get();
        $pdf= PDF::loadView('pdfventa',["ventas" => $ventas]);
        return $pdf->download('ventas.pdf');
    }
}
