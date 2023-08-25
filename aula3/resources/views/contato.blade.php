<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/app.css">
        <title>Document</title>
    </head>
    <body>
    <h1><b>Cadastro<b></h1>
        <br>
    <form method="post" action="/contato">
    {{ csrf_field() }}
        <input type="text" placeholder= "Nome "name="txNome" />
        <input type="text" placeholder= "Email"name="txEmail" />
        <input type="text" placeholder= "Assunto" name="txAssunto" />
        <input type="text" placeholder= "Mensagem" name="txMensagem" />

        <input type="submit" value="Salvar" />
    </form>

        <h1><b>Contatos<b></h1>
        <table class="table table-bordered border-primary">

            <tr>
                <th scope="col">Nome:</th>
                <th scope="col">Email:</th>
                <th scope="col">Assunto:</th>
                <th scope="col">Mensagem:</th>
            </tr>
            @foreach($contatos as $c)

            <tr>
                <td>{{$c->nome}}</td>
                <td>{{$c->email}}</td>
                <td>{{$c->assunto}}</td>
                <td>{{$c->mensagem}}</td>
            </tr>

            <!-- <tr> <th>Nome</th> <th>Email</th> <td>{{$c->nome}}</td>
            <td>{{$c->email}}</td> <td>{{$c->assunto}}</td> </tr> -->
            @endforeach

        </table>
    </body>
</html>