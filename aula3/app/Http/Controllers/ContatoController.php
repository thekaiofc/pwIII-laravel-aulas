<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contato;

    
class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contatos = Contato::all();

       //          nome da view        nome do atributo que contem os dados da consulta
    return view('contato', compact('contatos'));

    // foreach($contatos as $c){
    //     echo "Id ". $c->idContato . "<br />";            
    //     echo "Nome ".$c->nome . "<br />"; 
    //     echo "E-mail ".$c->email . "<br />";             
    //     echo "Assunto ".$c->assunto . "<br />";  
    //     echo "Mensagem".$c->mensagem . "<br />"; 
    //     echo "<br />"
    //}
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contato = new Contato();

        $contato->nome = $request->txNome;
        $contato->email = $request->txEmail;
        $contato->assunto = $request->txAssunto;
        $contato->mensagem = $request->txMensagem;

        $contato->save();

        return redirect('/contato');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
