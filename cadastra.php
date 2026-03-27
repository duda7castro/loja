<?php
include("conexao.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];


    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];
    $complemento = $_POST['complemento'];


    try {


        // 1️⃣ inserir endereço
        $sql_endereco = $conn->prepare("
            INSERT INTO endereco
            (rua, cep, bairro, cidade, estado, complemento, numero)
            VALUES
            (:rua, :cep, :bairro, :cidade, :estado, :complemento, :numero)
        ");


        $sql_endereco->execute([
            ':rua' => $rua,
            ':cep' => $cep,
            ':bairro' => $bairro,
            ':cidade' => $cidade,
            ':estado' => $estado,
            ':complemento' => $complemento,
            ':numero' => $numero
        ]);


        // ✅ AGORA SIM pega o ID correto
        $endereco_id = $conn->lastInsertId();


        // 2️⃣ inserir cliente
        $sql_cliente = $conn->prepare("
            INSERT INTO cliente (nome, cpf, endereco_id)
            VALUES (:nome, :cpf, :endereco_id)
        ");


        $sql_cliente->execute([
            ':nome' => $nome,
            ':cpf' => $cpf,
            ':endereco_id' => $endereco_id
        ]);


        echo "<script>
                alert('Cliente cadastrado com sucesso!');
                window.location='index.php';
              </script>";


    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>

