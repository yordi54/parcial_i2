<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::post('/login', 'Auth\LoginController@login')->name('login');

Route::get('/', 'ContenidoController@index')->name('home');
Route::get('/imagen/{filename}', 'ContenidoController@show')->name('imagen.show');
Route::get('/detalle/{id}', 'ContenidoController@detalle')->name('detail');
Route::get('/carrito', 'ContenidoController@carrito')->name('carrito');
Route::get('/añadircarrito/{id}', 'ContenidoController@addToCart')->name('add.carrito');
Route::get('/secion/{id}', 'ContenidoController@eliminarprod')->name('eliminar.prod');
Route::post('/pagar/producto', 'ContenidoController@pagar')->name('pagar.producto');
Route::get('/perfil/show','ContenidoController@showperfil')->name('perfil.show');

Route::post('/perfil/editar','ContenidoController@perfil')->name('perfil.editar');
Route::post('/perfil/pago','ContenidoController@perfil_pago')->name('perfil.pago');

Route::get('/pagar','ContenidoController@pagarProd')->name('pag');

Route::get('/pedido','ContenidoController@detallepedido')->name('pedido');

Route::get('/pedido/pago/{id}','ContenidoController@detallepago')->name('detail.pago');

Route::post('/pedido/subir','ContenidoController@subir_voucher')->name('voucher.pago');


Route::get('/imagen/voucher/{filename}', 'ContenidoController@show_voucher')->name('imagen.voucher');

Route::get('/categorias/{id}','ContenidoController@categorias')->name('categoria.producto');



Route::get('/admin', function () {
    return view('principal');
});


Route::post('/logout', 'Auth\LoginController@logout')->name('logout');


Route::resource('admin/categoria', 'CategoryController');

Route::resource('admin/producto', 'ProductController');
//reporrtes
Route::get('/listarProductoPdf','ProductController@listarpdf')->name('producto.pdf');

Route::resource('admin/cliente', 'CustomerController');

Route::resource('admin/pedido', 'OrderController');

//reporrtes
Route::get('/listarPedidosPdf/{id}','ContenidoController@pedidopdf')->name('pedido.pdf');

Route::resource('admin/venta', 'SaleController');
//reporte

Route::get('/listarVentasPdf','SaleController@pdfventa')->name('venta.pdf');

Route::resource('admin/entrega', 'DeliveryController');

Route::resource('admin/pago', 'PaymentController');
Route::get('admin/pago/{id}', 'PaymentController@show')->name('pago.voucher');
Route::get('admin/pagos/{filename}', 'PaymentController@mostrar_voucher')->name('mostrar.voucher');

Route::resource('admin/rol', 'RoleController');

Route::resource('admin/usuario', 'UserController');





Auth::routes();
