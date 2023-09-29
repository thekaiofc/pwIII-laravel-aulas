<a href="/download-csv"> Downloads dos produtos em CSV </a>

<br />

@foreach($produtos as $p)

    {{$p->idProduto}}
    <a href="/produto/escolhido/{{$p->idProduto}}"> 
        {{$p->produto}}
    </a>
    {{$p->descrProduto}}
    {{$p->valor}}
    {{$p->dtCadastro}}
    <a href="/produto/excluir/{{$p->idProduto}}"> Excluir </a>
    <br />
@endforeach