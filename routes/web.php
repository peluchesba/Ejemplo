<?php

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

Route::get('/','PagesController@welcome');

Route::get('/contact','PagesController@contact');

Route::get('/about','PagesController@about');

Route::get('/booking','PagesController@booking');

Route::get('/gallery','PagesController@gallery');

Route::get('/service','PagesController@service');

Route::post('mensajes',function(){
  //enviar correo
$data = request()->all();
//var_dump($data);
Mail::send("emails.mensaje", $data, function($message) use ($data){
  $message->from($data['correo'], $data['nombre'])
  ->to('jperez.ejemplo1@gmail.com','sebastian')
  ->subject($data['mensaje']);
});

//  return request()->all();
return back();

})->name('mensajes');
