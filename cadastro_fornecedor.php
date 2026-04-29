<?php
include("conexao.php");

//define nosso metodo como post
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // pega os dados inseridos para cadastrar um fornecedor
    $cnpj = $_POST['cnpj'];
    $qtd_produto = $_POST['qtd_produto'];
    $preco_fornecedor = $_POST['preco_fornecedor'];

    // e os dados do fornecedor, porem que vao para a tabela endereco
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];
    $complemento = $_POST['complemento'];

    try {

        // defiene nossa linguagem do banco de dados
        //$conn serve de intermediario entre a programação e o banco de dados
        //insere a ordem certa, prepara o envio do nosso codigo, para trocar os valores pelos reais
        $sql_endereco = $conn->prepare("
            INSERT INTO endereco
            (rua, cep, bairro, cidade, estado, complemento, numero)
            VALUES
            (:rua, :cep, :bairro, :cidade, :estado, :complemento, :numero)
        ");

            //executa e manda o formulario pro banco de dados
        $sql_endereco->execute([
            ':rua' => $rua,
            ':cep' => $cep,
            ':bairro' => $bairro,
            ':cidade' => $cidade,
            ':estado' => $estado,
            ':complemento' => $complemento,
            ':numero' => $numero
        ]);

        // pega o ID unico que foi criado no endereco_id pro fornecedor
        $endereco_id = $conn->lastInsertId();

        // prepara o fornecedor para ser inserido
        $sql = $conn->prepare("
            INSERT INTO fornecedor (cnpj, qtd_produto, preco_fornecedor, endereco_id)
            VALUES (:cnpj, :qtd_produto, :preco_fornecedor, :endereco_id)
        ");

        //manda os dados do fornecedor
        $sql->execute([
            ':cnpj' => $cnpj,
            ':qtd_produto' => $qtd_produto,
            ':preco_fornecedor' => $preco_fornecedor,
            ':endereco_id' => $endereco_id
        ]);

        //echo exibe algo, o alerta de cadastrado com sucesso
        //apos cadastrado com sucesso, o widow.location mostra para qual pagina ele deve voltar automaticamente
        echo "<script>
        alert('Cadastro realizado com sucesso!');
        window.location='painel.php';
        </script>";
        
        //possivel mensagem de erro
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>