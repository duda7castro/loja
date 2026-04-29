<?php
//inclui a conexão com o banco
include("conexao.php");

//post pega os dados inseridos
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$senha = $_POST['senha'];
$tipo = $_POST['tipo'];

// validar senha (apenas números e 6 dígitos)
if (!preg_match('/^[0-9]{6}$/', $senha)) {
    //!preg_match valida regras
    echo "<script>
        alert('A senha deve ter exatamente 6 números!');
        window.history.back();
    </script>";
    //mostra um alerta caso a regra adicionada nao cumpra a regra definida
    exit;
}

// usa hash para salvar a nossa senha de forma criptografada e segura
$hash = password_hash($senha, PASSWORD_DEFAULT);

try {

    // prepara os dados para serem inseridos do vendedor
    $sql_vendedor = $conn->prepare("
        INSERT INTO vendedor (nome, cpf)
        VALUES (:nome, :cpf)
    ");
//executa o envio dos dados do vendedor
    $sql_vendedor->execute([
        ':nome' => $nome,
        ':cpf' => $cpf
    ]);


    //------>
    // pegar ID gerado automaticamente
    $vendedor_id = $conn->lastInsertId();

    // pegar só o primeiro nome
    $primeiro_nome = explode(" ", $nome)[0];

    // formatar (minúsculo e sem caracteres estranhos)
    $nome_formatado = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $primeiro_nome));

    //  gerar login único
    $login = $nome_formatado . $vendedor_id . "@loja.com";

    /*--> esse conjunto de ações é a criação de um login automatico, 
    entao apos nosso vendedor ser cadastrado:
    ele pega o id
    explode separa o primeiro nome pelo espaço dado entre as palavras
    nome_formatado, remove caracteres especiais
    e gera um login unico, com:
    nomeID@loja.com defiinido por mim*/ 
    


    // insere na tabela usuarios
    $sql_usuario = $conn->prepare("
        INSERT INTO usuarios (nome, login, senha, tipo)
        VALUES (:nome, :login, :senha, :tipo)
    ");

    //executa todos esses comandos enviando-os
    $sql_usuario->execute([
        ':nome' => $nome,
        ':login' => $login,
        ':senha' => $hash,
        ':tipo' => $tipo
    ]);

    //mostra um alerta de cadastrado com sucesso
    //retorna para automaticamente para a pagina do painel
    echo "<script>
        alert('Usuário criado com sucesso! Login: $login');
        window.location='painel.php';
    </script>";

    //exibe qual foi o login gerado automaticamente com as informações adicionadas
    //nao exibe a senha por segurança
    header("Location: usuario_criado.php?login=$login");
exit;

} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>