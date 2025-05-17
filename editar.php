<?php  require_once 'conexao.php';?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 09 - Parte 02 - Editar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body class="container-fluid">

    <h1>Aula 09 - Parte 02 - Editar Cliente</h1>
    <?php 
    
        require 'menu.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id     = $_POST['id'];
            $nome   = $_POST['nome'];
            $fone   = $_POST['fone'];
            $email  = $_POST['email'];
            $servico = $_POST['servico'];
            $data_entrega = $_POST['prazo_entrega'];
            $data_prevista = $_POST['data_prevista'];

            require_once 'validacoes.php';
            
            ha_campos_em_branco("Ao editar cliente, os campos não podem estar em branco");

            $conn = conectar_banco();

            $sql = "UPDATE tb_clientes set nome = ?, fone = ?, email = ?, servico = ?, prazo_entrega = ?, data_prevista = ?
                    WHERE id = ?";

            $stmt = mysqli_prepare($conn, $sql);

            mysqli_stmt_bind_param($stmt, "ssssssi", $nome, $fone, $email, $id, $servico, $prazo_entrega, $data_prevista);

            if(mysqli_stmt_execute($stmt)) {
                echo '<h3 class="alert alert-success">Cliente ediatado com sucesso!</h3>';
            } else {
                echo '<h3 class="alert alert-danger">Erro ao editar cliente!</h3>';
            }

            mysqli_stmt_close($stmt);

            mysqli_close($conn);

        } else {

            // se chegamos na página via get:
            // verificar se recebemos um id
            if (!isset($_GET['id'])) {
                exit('<h3 class="alert alert-warning">ID não informado</h3>');
            }

            $id = (int) $_GET['id']; // armazenamos o id em uma variável local


            $conn = conectar_banco(); // conexão com o bd

            $query = "SELECT * FROM tb_clientes WHERE id = $id";

            $resultado = mysqli_query($conn, $query);

            // se, ao tentar fazer um select, não for encontrado um cliente com o id fornecido
            if (!mysqli_num_rows($resultado) > 0) {
                // mensagem de erro e encerramos o script
                exit('<h3 class="alert alert-warning">Cliente não localizado</h3>');
            }

            // se não foi disparado a mensagem de erro, prosseguimos:
            // variavel local 'cliente' se tornará um array associativo contendo os dados
            // do cliente retornado pelo nosso SELECT e armazenado na variável 'resultado'
            $cliente = mysqli_fetch_assoc($resultado)
            ?>

                <h2>Editando dados do Cliente</h2>
                <form action="editar.php" method="post">

                    <label for="nome">Nome: </label><br>
                    <input type="text" name="nome" id="nome" 
                    value="<?php echo $cliente['nome'];?>"><br><br>

                    <label for="fone">Fone: </label><br>
                    <input type="text" name="fone" id="fone" 
                    value="<?= $cliente['fone']; ?>"><br><br>

                    <label for="email">E-mail: </label><br>
                    <input type="email" name="email" id="email" 
                    value="<?= $cliente['email']; ?>"><br><br>

                    <label for="servico">Serviço: </label><br>
                    <input type="servico" name="servico" id="servico" 
                    value="<?= $cliente['servico']; ?>"><br><br>

                    <label for="prazo_entrega">Prazo de entrega: </label><br>
                    <input type="prazo_entrega" name="prazo_entrega" id="prazo_entrega" 
                    value="<?= $cliente['prazo_entrega']; ?>"><br><br>

                    <label for="data_prevista">Data prevista de entrega: </label><br>
                    <input type="data_prevista" name="data_prevista" id="data_prevista" 
                    value="<?= $cliente['data_prevista']; ?>"><br><br>

                    <input type="hidden" name="id" 
                    value="<?= $cliente['id']; ?>">

                    <button type="submit" class="btn btn-warning">Editar</button>

                </form>

                <?php

        }

    
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>