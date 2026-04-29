<?php
//incia uma sessao
session_start();
//conecta nosso arquivo
include("conexao.php");

//verifica se esta em uma sessao com um login valido
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit;
}
?>

<!-- ação com o nosso formulario -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">

<style>
    /*a partir do style temos todo o estilo do nosso front end, fonte, margem, cor,
    de botoes, de campos e do corpo da pagina*/

    body {
    font-family: Arial;
    background: linear-gradient(135deg, #2b0000, #5c0000);
    /* Fundo com degradê vermelho escuro */
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
    padding: 10px;
    margin: 5px 0;
}

button:hover {
    transform: scale(1.03);
    /* Leve aumento */
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
<!-- Define que o documento é HTML5 -->

<html lang="pt-br">
<!-- Define o idioma da página como português do Brasil -->

<head>
<meta charset="UTF-8">
<!-- Permite usar acentos corretamente (ç, ã, é, etc) -->

<title>Controle de Estoque</title>
<!-- Título que aparece na aba do navegador -->

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
<!-- Importa fontes do Google Fonts -->
<!-- Playfair Display = títulos elegantes -->
<!-- Montserrat = texto moderno -->

<style>
<!-- Início do CSS (estilo da página) -->

body {
    font-family: 'Montserrat', sans-serif;
    /* Define a fonte principal do site */

    background: linear-gradient(135deg, #2b0000, #5c0000);
    /* Fundo com degradê (vermelho escuro) */

    margin: 0;
    /* Remove margem padrão do navegador */
}

/* topo */
.topo {
    text-align: center;
    /* Centraliza o conteúdo */

    color: white;
    /* Texto branco */

    margin-top: 30px;
    /* Espaço acima */
}

.topo h1 {
    font-family: 'Playfair Display';
    /* Fonte diferente para o título */

    letter-spacing: 4px;
    /* Espaçamento entre letras */
}

/* container */
.container {
    width: 420px;
    /* Largura fixa da caixa */

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
    /* Centraliza o título */

    color: #5c0000;
    /* Cor vermelha escura */

    font-family: 'Playfair Display';
}

/* seção */
.section {
    margin-top: 20px;
    /* Espaço entre seções */
}

/* título da seção */
.section h3 {
    border-left: 4px solid #5c0000;
    /* Linha decorativa à esquerda */

    padding-left: 10px;
    /* Espaço entre a linha e o texto */

    color: #5c0000;

    margin-bottom: 10px;
}

/* inputs */
input {
    width: 100%;
    /* Ocupa toda a largura disponível */

    padding: 12px;
    /* Espaço interno */

    margin: 6px 0;
    /* Espaço entre campos */

    border-radius: 8px;
    /* Bordas arredondadas */

    border: 1px solid #ccc;
    /* Borda cinza clara */

    transition: 0.3s;
    /* Animação suave */
}

/* foco */
input:focus {
    border-color: #5c0000;
    /* Muda cor da borda ao clicar */

    box-shadow: 0 0 5px rgba(92,0,0,0.5);
    /* Brilho ao focar */
}

/* linha */
.row {
    display: flex;
    /* Coloca itens lado a lado */

    gap: 10px;
    /* Espaço entre eles */
}

button {
    width: 100%;
    /* Ocupa toda largura */

    padding: 12px;

    margin-top: 15px;
    /* Espaço acima do botão */

    background: linear-gradient(135deg, #5c0000, #7a0000);
    /* Fundo com degradê */

    color: white;

    border: none;
    /* Remove borda padrão */

    border-radius: 8px;

    cursor: pointer;
    /* Mostra “mãozinha” ao passar o mouse */
}

/* botão voltar */
.voltar {
    background: #888;
    /* Cor cinza */

    margin-top: 14px;
    /* Espaço mínimo (quase colado no botão acima) */

}

</style>
</head>

<body>

<div class="topo">
    <h1>CLASS PANTS</h1>
</div>


<div class="container">
    <h2>Controle de Estoque</h2>
    <!-- Subtítulo -->

    <form action="salvar_estoque.php" method="post">
    <!-- Formulário -->
    <!-- action = arquivo que vai receber os dados -->
    <!-- method="post" = envio seguro -->

        <!-- IDENTIFICAÇÃO -->
        <div class="section">
            <h3>Identificação da Operação</h3>

            <div class="row">
                <input type="number" name="fornecedor_id" placeholder="Fornecedor">
                <!-- Campo numérico para ID do fornecedor -->

                <input type="number" name="vendedor_id" placeholder="Vendedor">
                <!-- Campo numérico para ID do vendedor -->
            </div>

            <input type="number" name="cliente_id" placeholder="Cliente (opcional)">
            <!-- Campo opcional -->
            <!-- Não tem required, então pode ficar vazio -->
        </div>

        <!-- MOVIMENTAÇÃO -->
        <div class="section">
            <h3>Movimentação de Estoque</h3>

            <div class="row">
                <input type="number" name="quantidade" placeholder="Quantidade" class="destaque">
                <!-- Quantidade de itens -->

                <input type="number" step="0.01" name="preco" placeholder="Preço" class="destaque">
                <!-- Preço -->
                <!-- step="0.01" permite valores com centavos -->
            </div>
        </div>

        <button type="submit">Registrar Movimentação</button>
        <!-- Envia os dados para o PHP -->

    </form>

    <button class="voltar" onclick="window.location.href='painel.php'">Voltar</button>
    <!-- Botão de voltar -->
    <!-- onclick redireciona para outra página -->

</div>

</body>
</html>