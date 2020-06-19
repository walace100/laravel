<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>cache</title>
        <style>
            table {
                border-collapse: collapse;
            }
            table, th, td {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <table>
            <tr>
            <td> ID
            <td> Nome
            <td> Categorias
            @foreach($produtos as $p)
                <tr>
                <td> {{$p->id}}
                <td> {{$p->nome}}
                <td> 
                <ul>
                    @foreach($p->categorias as $c)
                        <li>{{$c->nome}}</li>
                    @endforeach
                </ul>
            @endforeach
        </table>
    </body>
</html>