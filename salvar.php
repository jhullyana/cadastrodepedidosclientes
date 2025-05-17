<?php require_once 'validacoes.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 09 - Salvar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body class="container-fluid">

    <h1>Aula 09 - Salvar Cliente</h1>

    <p>
        <a href="index.php">Voltar à home</a>
    </p>

    <?php 
        
        form_nao_enviado("Por favor, retorne à home e preencha o form");

        ha_campos_em_branco("Por favor, preencha todos os campos do form");

        require_once 'conexao.php'; 

        $nome  = $_POST['nome'];
        $fone  = $_POST['fone'];
        $email = $_POST['email'];
        $servico = $_POST['servico'];
        $prazo_entrega = $_POST['prazo_entrega'];
        $data_prevista = $_POST['data_prevista'];

        
        $conn = conectar_banco();

        $sql = "INSERT INTO tb_clientes (nome, fone, email, servico, prazo_entrega, data_prevista ) 
                VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);

        verificar_erro_stmt($stmt); 

        $bind = mysqli_stmt_bind_param($stmt, "ssssss", $nome, $fone, $email, $servico, $prazo_entrega, $data_prevista);

        verificar_bind_stmt($bind); 
        $exe = mysqli_stmt_execute($stmt);

        verificar_erro_execucao($exe, $stmt, "Erro ao cadastrar cliente"); 
        echo '<h3 class="alert alert-success">Cliente cadastrado com sucesso!</h3>';

        mysqli_close($conn);     

    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>