<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 09 - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body class="container-fluid">

    <h1>Aula 09 - Home</h1>

    <?php require_once 'menu.php'; ?>

    <h2>Cadastro de Pedidos de empresas</h2>

    <form action="salvar.php" method="post">

        <label for="nome">Nome: </label><br>
        <input type="text" name="nome" id="nome"><br><br>

        <label for="fone">Fone: </label><br>
        <input type="text" name="fone" id="fone"><br><br>

        <label for="email">E-mail: </label><br>
        <input type="email" name="email" id="email"><br><br>

        <label for="servico">Serviço prestado: </label><br>
        <input type="servico" name="servico" id="servico"><br><br>

        <label for="prazo_entrega">Prazo de entrega: </label><br>
        <input type="prazo_entrega" name="prazo_entrega" id="prazo_entrega"><br><br>

        <label for="data_prevista">Data prevista de entrega: </label><br>
        <input type="data_prevista" name="data_prevista" id="data_prevista"><br><br>

        <button type="submit" class="btn btn-primary">Cadastrar</button>

    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>