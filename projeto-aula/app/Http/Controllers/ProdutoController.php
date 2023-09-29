<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Response;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$produtos = Produto::all();        
        //$produtos = DB::table('tbProduto')->orderBy('valor','desc')->get();
        //$produtos = DB::table('tbProduto')->orderBy('valor','asc')->get();

        $sql = "select * from tbProduto";
        $produtos = DB::select($sql);

        return view('produto',compact('produtos'));
    }

    public function index2()
    {
        $produtos = Produto::all();        
        return $produtos;
    }

    public function indexApi()
    {
        $sql = "select * from tbProduto";
        $produtos = DB::select($sql);

        return $produtos;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produtos = Produto::where('idProduto','=',$id)->get();                
        
        return view('produto-escolhido',compact('produtos'));
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

    public function updateApi(Request $request, string $id)
    {   
        $produto = Produto::where('idProduto',$id)->update([
            'produto' => $request->produto,
            'descrProduto' => $request->descricao,
            'valor'=> $request->valor            
        ]);
        
        return response()->json([
            'message'=> 'Dados alterados com sucesso',
            'code'=>200]);        
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
        Produto::where('idProduto',$id)->delete();
        return redirect('/produto');        
    }

    public function destroyApi(string $id)
    {
        Produto::where('idProduto',$id)->delete();
        
        return response()->json([
            'message'=> 'Dados excluídos com sucesso',
            'code'=>200]); 
    }


    public function download()
    {               
        $sql = 'select * from tbProduto';

        $queryJson = DB::select($sql);

        // Nome do arquivo CSV
        $filename = 'problemas.csv';

        // Cabeçalho do arquivo        
        $headers = [
            'Content-Type' => 'text/csv;charset=utf-8',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];        

        //Cabeçalho        
        
        $file = fopen('php://output', 'w');

        fclose($file);

        // Gera o arquivo CSV
        $callback = function () use ($queryJson) {
            
        $file = fopen('php://output', 'w');

        //Cabeçalho
        $col1 = "ID";
        $col2 = "Produto";
        $col3 = mb_convert_encoding("Descrição","ISO-8859-1");
        $col4 = "Valor";
        $col5 = "Data de Cadastro";
        
        $escreve = fwrite($file, "$col1,$col2,$col3,$col4,$col5");
        
        
            foreach($queryJson as $d) {
                $data1 = $d->idProduto;
                $data2 = $d->produto;
                $data3 = $d->descrProduto;
                $data4 = $d->valor;
                $data5 = $d->dtCadastro;
                
               //$escreve = fwrite($file, "\n$data1;$data2;$data3;$data4;$data5");
               $escreve = fwrite($file, "\n$data1,$data2,$data3,$data4,$data5");
               
            }
            fclose($file);
        };

        // Retorna o arquivo CSV para download
        return Response::stream($callback, 200, $headers);
    }




}
