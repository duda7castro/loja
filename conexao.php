<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=loja;charset=utf8", "root", "");
    
    // ativa modo de erro
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>