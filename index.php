<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset=" UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teste-rte</title>
</head>
<body>
<div>
    <button class="enviarJsonPhp">Gravar</button>
    <button class="buscarJsonPhp">Ler</button>
</div>
<label>Nome</label>
<input id="nome" name="nome" type="text">
<button id="incluirButton">incluir</button>
<br><br>
<div>
    <table border="1">
        <thead>
        <tr>
            <th colspan="5">Pessoas</th>
        </tr>
        </thead>
        <tbody id="tbody">
        </tbody>
    </table>
</div>
<br>
<div>
<textarea id="textjson">

</textarea>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>