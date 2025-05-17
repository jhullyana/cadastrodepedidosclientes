<?php 

function form_nao_enviado($msg) {
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        exit('<h3 class="alert alert-warning">'.$msg.'</h3>');
    }
}

function ha_campos_em_branco($msg) {
    if (empty($_POST['nome']) || empty($_POST['fone']) || empty($_POST['email'])) {
        exit('<h3 class="alert alert-warning">'.$msg.'</h3>');
    }
}

function verificar_erro_stmt($stmt) {
    if (!$stmt) { // se houver algum erro na estrutura do sql
        exit('<h3 class="alert alert-danger">Erro na preparação da consulta.</h3>');
    }
}

function verificar_bind_stmt($bind) {
    if (!$bind) { // se houver algum erro na execução do statement
        exit('<h3 class="alert alert-danger">Erro ao vincular parâmetros. Impossível salvar./h3>');
    }
}

function verificar_erro_execucao($exe, $stmt, $msg) {
    if (!$exe) { // se houver algum erro na execução do statement
        exit('<h3 class="alert alert-danger">'. $msg .': ' . mysqli_stmt_error($stmt) . "</h3>");
    }
}

function id_nao_informado($msg) {
    if (!isset($_GET['id'])) {
        exit('<h3 class="alert alert-danger">'.$msg.'</h3>');
    }
}

function nao_ha_linhas_afetadas($conn, $msg) {
    if(mysqli_affected_rows($conn) == 0) {
        exit('<h3 class="alert alert-danger">' . $msg .'</h3>');
    }    
}


?>