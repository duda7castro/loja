<?php
// esse include importa arquivos, entao aqui estamos meio q ligando ele com o arquivo de conexao
include("conexao.php");

//aqui ele verifica se todos os dados estao sendo enviados pelo metodo post
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // o post basicamente pega seus dados para serem enviados
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];


    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];
    $complemento = $_POST['complemento'];


    try {


         // define nossa tabela do banco 
         // o $conn é tipo quem conversa as duas linguagens 
         // e o prepare junto com o insert prepara pra ser inserido, mostra a ordem que vai ser etc
        $sql_endereco = $conn->prepare("
            INSERT INTO endereco
            (rua, cep, bairro, cidade, estado, complemento, numero)
            VALUES
            (:rua, :cep, :bairro, :cidade, :estado, :complemento, :numero)
        ");
        // detalhe, o : é pra tipo trocar o ficticio pelo real, colocando o dado real q for inserido

       
    // pelo q eu entendi aqui executa o post, entao tudo a cima prepara, define a ordem, o metodo e aqui manda 
        $sql_endereco->execute([
            ':rua' => $rua,
            ':cep' => $cep,
            ':bairro' => $bairro,
            ':cidade' => $cidade,
            ':estado' => $estado,
            ':complemento' => $complemento,
            ':numero' => $numero
        ]);


        // aqui deixa o ID automatico e único 
        $endereco_id = $conn->lastInsertId();


        // tudo de novo só que com outra tabela, nesse caso a de cliente
        //entao ele prepara, define e conversa com a tabela cliente
        $sql_cliente = $conn->prepare("
            INSERT INTO cliente (nome, cpf, endereco_id, email)
            VALUES (:nome, :cpf, :endereco_id, :email)
        ");

        //aqui manda os dados pra tabela cliente
        $sql_cliente->execute([
            ':nome' => $nome,
            ':cpf' => $cpf,
            ':endereco_id' => $endereco_id,
            ':email' => $email
        ]);
        //detalhe: o endereco_id significa que precisamos de um ID que vai mandar pra tabela endereco 

        //echo exibe algo na tela, aqui caso funcionar vai ser mostrado um alerta com a farse entre ()
        //e o window vai fazer voltar automaticamente pra pagina onde esta o location (localização)
        echo "<script>
            alert('Cliente cadastrado com sucesso!');
            window.location='painel.php';
        </script>";

//possivel mensagem de erro
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
//fecha nosso codigo ? > }
}
?>

