<?php
//inicia uma sessao e conecta os arquivos
session_start();
include("conexao.php");

//da valor ao nosso login e senha digitados no formulario e pega eles
$login = $_POST['login'];
$senha = $_POST['senha'];

//conecta com o banco de dados para verificar um login correto ou incorreto, 
// se foi salvo no nosso banco ou nao
$sql = $conn->prepare("SELECT * FROM usuarios WHERE login = :login");
//execute envia o login para o banco
$sql->execute([':login' => $login]);

$usuario = $sql->fetch();
//pega o resultado do usuario encontrado

//verifica se o login e senha batem com o do usuario encontrado
if ($usuario && password_verify($senha, $usuario['senha'])) {

    $_SESSION['id'] = $usuario['id'];
    $_SESSION['nome'] = $usuario['nome'];
    $_SESSION['tipo'] = $usuario['tipo'];
    //salva os dados na sessão, como um login ativo
   

    header("Location:painel.php");
    //redireciona para o painel
    exit;

} else {
    echo "<script>alert('Login inválido'); window.location='index.php';</script>";
    //exibe um alerta de login invalido caso o login e senha nao sejam correspondentes com o usuario encontrado
}
?>