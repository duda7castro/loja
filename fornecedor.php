<?php
session_start();
// inicia a sessão é como “ligar” o sistema de login para saber quem está logado

// é uma fomra de identificar o login do usuario. 
// o isset é usado justamente para verificar uma variaval
if (!isset($_SESSION['id'])) {
     //o header é um direcionamento, e a location define para qual pagina será redirecionado
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<!-- Define que o documento é HTML5 -->

<html lang="pt-br">
<!-- Define o idioma da página como português -->

<head>
<meta charset="UTF-8">
<!-- Permite usar acentos corretamente -->

<title>Cadastro de Fornecedor</title>
<!-- Nome que aparece na aba do navegador -->

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
<!-- Importa fontes externas -->
<!-- Playfair Display = títulos elegantes -->
<!-- Montserrat = texto moderno -->

<style>

body {
    font-family: 'Montserrat', sans-serif;
    /* Define a fonte principal */

    background: linear-gradient(135deg, #2b0000, #5c0000);
    /* Fundo com degradê vermelho escuro */

    margin: 0;
    /* Remove margem padrão */
}

/* topo */
.topo {
    text-align: center;
    /* Centraliza conteúdo */

    color: white;
    /* Cor do texto */

    margin-top: 30px;
    /* Espaço acima */
}

.topo h1 {
    font-family: 'Playfair Display';
    /* Fonte diferente para destaque */

    letter-spacing: 4px;
    /* Espaço entre letras */
}

/* caixa principal */
.container {
    width: 420px;
    /* Largura fixa */

    margin: 30px auto;
    /* Centraliza horizontalmente */

    background: white;
    /* Fundo branco */

    border-radius: 15px;
    /* Bordas arredondadas */

    padding: 25px;
    /* Espaço interno */

    box-shadow: 0 10px 30px rgba(0,0,0,0.5);
    /* Sombra para efeito de profundidade */
}

/* título */
h2 {
    text-align: center;
    /* Centraliza */

    color: #5c0000;
    /* Cor vermelha */

    font-family: 'Playfair Display';
}

/* seção separada */
.section {
    margin-top: 20px;
    /* Espaço entre blocos */
}

/* linha decorativa da seção */
.section h3 {
    border-left: 4px solid #5c0000;
    /* Linha lateral */

    padding-left: 10px;
    /* Espaço do texto */

    color: #5c0000;

    margin-bottom: 10px;
}

/* inputs */
input {
    width: 100%;
    /* Ocupa toda largura disponível */

    max-width: 95%;
    /* Limita para não encostar na borda */

    padding: 12px;
    /* Espaço interno */

    margin: 6px auto;
    /* Centraliza e dá espaço vertical */

    border-radius: 8px;
    /* Bordas arredondadas */

    border: 1px solid #ccc;
    /* Borda padrão */

    transition: 0.3s;
    /* Animação suave */
}

/* efeito ao clicar */
input:focus {
    border-color: #5c0000;
    /* Muda cor da borda */

    box-shadow: 0 0 5px rgba(92,0,0,0.5);
    /* Brilho ao focar */
}

/* campos lado a lado */
.row {
    display: flex;
    /* Coloca elementos lado a lado */

    gap: 10px;
    /* Espaço entre eles */
}

/* botão principal */
button {
    width: 100%;
    /* Ocupa toda largura */

    padding: 12px;

    margin-top: 15px;
    /* Espaço acima */

    background: linear-gradient(135deg, #5c0000, #7a0000);
    /* Cor com degradê */

    color: white;

    border: none;
    /* Remove borda */

    border-radius: 8px;

    cursor: pointer;
    /* Mostra mãozinha */
}

/* efeito ao passar mouse */
button:hover {
    transform: scale(1.03);
    /* Leve aumento */
}

/* botão voltar */
.voltar {
    background: gray;
    /* Cor diferente para indicar ação secundária */
}

</style>
</head>

<body>

<div class="topo">
    <h1>CLASS PANTS</h1>
    <!-- Nome da loja no topo -->
</div>

<div class="container">

    <h2>Cadastro de Fornecedor</h2>
    <!-- Título da página -->

    <form action="cadastro_fornecedor.php" method="post">
    <!-- Formulário -->
    <!-- action = arquivo que vai salvar os dados -->
    <!-- method="post" = envio seguro -->

        <!-- DADOS DO FORNECEDOR -->
        <div class="section">
            <h3>Dados do Fornecedor</h3>

            <input type="text" name="cnpj" placeholder="CNPJ" required>
            <!-- Campo para CNPJ -->
            <!-- required = obrigatório -->

            <div class="row">
                <input type="number" name="qtd_produto" placeholder="Quantidade" required>
                <!-- Quantidade de produtos -->

                <input type="number" step="0.01" name="preco_fornecedor" placeholder="Preço" required>
                <!-- Preço do fornecedor -->
            </div>
        </div>

        <!-- ENDEREÇO -->
        <div class="section">
            <h3>Endereço</h3>

            <input type="text" name="rua" placeholder="Rua" required>
            <!-- Nome da rua -->

            <div class="row">
                <input type="number" name="numero" placeholder="Número" required>
                <!-- Número da casa -->

                <input type="text" name="bairro" placeholder="Bairro" required>
                <!-- Bairro -->
            </div>

            <div class="row">
                <input type="text" name="cidade" placeholder="Cidade" required>
                <!-- Cidade -->

                <input type="text" name="estado" placeholder="Estado" required>
                <!-- Estado -->
            </div>

            <div class="row">
                <input type="text" name="cep" placeholder="CEP" required>
                <!-- CEP -->

                <input type="text" name="complemento" placeholder="Complemento">
                <!-- Campo opcional -->
            </div>
        </div>

        <button type="submit">Cadastrar</button>
        <!-- Envia os dados para o PHP -->

    </form>

    <a href="painel.php">
    <!-- Link para voltar -->

        <button class="voltar">Voltar</button>
        <!-- Botão visual de retorno -->

    </a>

</div>

</body>
</html>