<?php
session_start();
// inicia a sessão é como “ligar” o sistema de login para saber quem está logado

// é uma fomra de identificar o login do usuario. 
// o isset é usado justamente para verificar uma variaval
if (!isset($_SESSION['id'])) {
    //o header é um direcionamento, e a location define para qual pagina será redirecionado
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Cadastro de Cliente</title>

<style>
    /*a partir do style temos todo o estilo do nosso front end, fonte, margem, cor,
    de botoes, de campos e do corpo da pagina*/
body {
    font-family: Arial;
    background-color: #f4f4f4;
}

.container {
    width: 320px;
    margin: 60px auto;
    padding: 20px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 0 10px gray;
}

h2 {
    text-align: center;
}

input {
    width: 100%;
    max-width: 95%;
    display: block;
    margin: 6px auto;
}

button {
    width: 100%;
    padding: 10px;
    background: blue;
    color: white;
    border: none;
    cursor: pointer;
}

.voltar {
    background: gray;
}
</style>

</head>
<body>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Cadastro de Cliente</title>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">

<style>

body {
    font-family: 'Montserrat', sans-serif;
    background: linear-gradient(135deg, #2b0000, #5c0000);
    margin: 0;
}

/* topo */
.topo {
    text-align: center;
    color: white;
    margin-top: 30px;
}

.topo h1 {
    font-family: 'Playfair Display';
    letter-spacing: 4px;
}

/* container */
.container {
    width: 420px;
    margin: 30px auto;
    background: white;
    border-radius: 15px;
    padding: 25px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.5);
}

/* título */
h2 {
    text-align: center;
    color: #5c0000;
    font-family: 'Playfair Display';
}

/* seção */
.section {
    margin-top: 20px;
}

/* título da seção */
.section h3 {
    border-left: 4px solid #5c0000;
    padding-left: 10px;
    color: #5c0000;
    margin-bottom: 10px;
}

/* inputs */
input {
    width: 100%;
    padding: 12px;
    margin: 6px 0;
    border-radius: 8px;
    border: 1px solid #ccc;
    transition: 0.3s;
}

/* foco */
input:focus {
    border-color: #5c0000;
    box-shadow: 0 0 5px rgba(92,0,0,0.5);
}

/* linha */
.row {
    display: flex;
    gap: 10px;
}

/* botão */
button {
    width: 100%;
    padding: 12px;
    margin-top: 15px;
    background: linear-gradient(135deg, #5c0000, #7a0000);
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
}

/* hover */
button:hover {
    transform: scale(1.03);
}

/* voltar */
.voltar {
    background: gray;

    
}

</style>

</head>
<body>


<div class="topo">
    <h1>CLASS PANTS</h1>
</div>

<div class="container">
<!-- Container principal que envolve todo o formulário -->
<!-- Serve para centralizar e aplicar estilo (tamanho, fundo, borda, etc) -->

    <h2>Cadastro de Cliente</h2>
    <!-- Título da página (nível 2) -->
    <!-- Usado para indicar o objetivo da tela -->

    <form action="cadastra.php" method="post">
    <!-- Formulário que coleta os dados -->
    <!-- action="cadastra.php" = arquivo que vai processar os dados -->
    <!-- method="post" = envia os dados de forma segura (não aparece na URL) -->

        <!-- DADOS PESSOAIS -->
        <div class="section">
        <!-- Div usada para separar visualmente uma parte do formulário -->

            <h3>Dados Pessoais</h3>
            <!-- Subtítulo da seção -->

            <input type="text" name="nome" placeholder="Nome" required>
            <!-- Campo de texto para o nome -->
            <!-- name="nome" = chave usada no PHP ($_POST['nome']) -->
            <!-- placeholder = texto de dica dentro do campo -->
            <!-- required = campo obrigatório -->

            <div class="row">
            <!-- Div usada para colocar campos lado a lado (com CSS flex) -->

                <input type="text" name="cpf" placeholder="CPF" required>
                <!-- Campo para CPF -->
                <!-- type="text" permite qualquer texto -->
                <!-- name="cpf" = enviado ao PHP -->

                <input type="email" name="email" placeholder="Email" required>
                <!-- Campo de email -->
                <!-- type="email" valida formato automaticamente -->
                <!-- (ex: exige @ no valor digitado) -->

            </div>
        </div>

        <!-- ENDEREÇO -->
        <div class="section">
        <!-- Nova seção para separar endereço dos dados pessoais -->

            <h3>Endereço</h3>

            <input type="text" name="rua" placeholder="Rua" required>
            <!-- Campo para nome da rua -->

            <div class="row">
                <input type="number" name="numero" placeholder="Número" required>
                <!-- Campo numérico -->
                <!-- type="number" só aceita números -->

                <input type="text" name="bairro" placeholder="Bairro" required>
                <!-- Campo para bairro -->
            </div>

            <div class="row">
                <input type="text" name="cidade" placeholder="Cidade" required>
                <!-- Campo cidade -->

                <input type="text" name="estado" placeholder="Estado" required>
                <!-- Campo estado -->
            </div>

            <div class="row">
                <input type="text" name="cep" placeholder="CEP" required>
                <!-- Campo CEP -->

                <input type="text" name="complemento" placeholder="Complemento">
                <!-- Campo opcional -->
                <!-- Não tem "required", então pode ficar vazio -->
            </div>
        </div>

        <button type="submit">Cadastrar Cliente</button>
        <!-- Botão que envia o formulário -->
        <!-- type="submit" dispara o envio para o action -->

    </form>

    <a href="painel.php">
    <!-- Link para outra página -->

        <button class="voltar">Voltar</button>
        <!-- Botão visual dentro do link -->
        <!-- class="voltar" permite aplicar estilo diferente -->

    </a>

</div>

</body>
</html>