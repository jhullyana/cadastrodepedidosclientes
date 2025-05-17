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

        id_nao_informado("ID não informado"); 

        require_once 'conexao.php'; 

        $id = (int)$_GET['id']; 

        $conn = conectar_banco(); 
        
        $sql = "DELETE FROM tb_clientes WHERE id = ?";

        $stmt = mysqli_prepare($conn, $sql);

        verificar_erro_stmt($stmt); 

        $bind = mysqli_stmt_bind_param($stmt, "i", $id);

        verificar_bind_stmt($bind); 

        $exe = mysqli_stmt_execute($stmt);

        verificar_erro_execucao($exe, $stmt, "Erro ao excluir cliente");

        

        nao_ha_linhas_afetadas($conn, "Não foi possível excluir o cliente com o ID especificado");
            
        
        echo '<h3 class="alert alert-success">Cliente excluído com sucesso!</h3>';
                
        mysqli_stmt_close($stmt); 

        mysqli_close($conn); 
        
    
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>