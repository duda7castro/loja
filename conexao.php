<?php
//try traduzido temos tentar, entao seguindo isso ele tenta executar o seguinte codigo:
try {
    $conn = new PDO("mysql:host=localhost;dbname=loja;charset=utf8", "root", "");
    //o $conn é nossa conexão com o banco de dados
    //PDO é uma forma segura de conectar e trabalhar com o banco
    //mysql:host=localhost é o nosso acesso a todo a nossa programação liagada ao banco de dados my sql

    // possivel erro
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // o catch capta os possiveis erros de conexão
} catch (PDOException $e) {

    //transforma o erro em uma mensagem clara
    die("Erro na conexão: " . $e->getMessage());
}
?>