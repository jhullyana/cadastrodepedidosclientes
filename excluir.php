<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 09 - Parte 2 - Excluir Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body class="container-fluid">

    <h1>Aula 09 - Parte 02 - Excluir Cliente</h1>

    <?php 

        require_once 'menu.php';

        require_once 'validacoes.php';

        id_nao_informado("ID não informado"); // verifica se o id foi informado via get

        require_once 'conexao.php'; // incluir arquivo de conexão com o BD

        $id = (int)$_GET['id']; // type cast para tipo id recebido via get
        // type cast = converter um valor para um tipo específico

        $conn = conectar_banco(); // conecta ao banco de dados
        
        $sql = "DELETE FROM tb_clientes WHERE id = ?";

        $stmt = mysqli_prepare($conn, $sql);

        verificar_erro_stmt($stmt); // verifica se há erros neste statement (declaração)

        $bind = mysqli_stmt_bind_param($stmt, "i", $id);

        verificar_bind_stmt($bind); // verifica se há erros no bind (associação) dos parâmetros

        // Executa o comando e verifica o retorno
        $exe = mysqli_stmt_execute($stmt);

        verificar_erro_execucao($exe, $stmt, "Erro ao excluir cliente"); // verifica se há erro na execução do stmt
        
        // se, ao executar o comando DELETE, nenhum registro for excluído com base no
        // id fornecido, apresenta o erro abaixo e encerra o script

        nao_ha_linhas_afetadas($conn, "Não foi possível excluir o cliente com o ID especificado");
            
        // se passou por todas as validações, apresenta msg de sucesso
        echo '<h3 class="alert alert-success">Cliente excluído com sucesso!</h3>';
                
        mysqli_stmt_close($stmt); // encerrar o stmt

        mysqli_close($conn); // encerra a conexao com o bd
    
    
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>