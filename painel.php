<?php
session_start();
//inicia uma sessao


// verifica se essta logado, se nao estiver logado manda pro login
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}
?>


<!DOCTYPE html>
<!--define nossa linguagem-->
<html lang="pt-br">
    <!--define o idioma da pagina-->
<head>
<meta charset="UTF-8">
<!--permite o uso de acentuação-->
<title>Painel da Loja</title>
<!--da nome a nossa pagina-->


<style>
    /* define todo o estilo da pagina de painel*/


/* Fundo elegante escuro */
body {
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(135deg, #2b0000, #5a0000);
    margin: 0;
}


/* Caixa principal */
.container {
    width: 340px;
    margin: 100px auto;
    padding: 30px;
    background: #ffffff;
    border-radius: 15px;
    box-shadow: 0 0 25px rgba(0,0,0,0.4);
    text-align: center;
}


/* Título */
h2 {
    margin-bottom: 5px;
    color: #5a0000;
}


/* Nome do usuário */
.bemvindo {
    margin-bottom: 20px;
    color: #777;
    font-size: 14px;
}


/* Botões padrão */
button {
    width: 100%;
    padding: 14px;
    margin: 8px 0;
    border: none;
    border-radius: 8px;
    background: #800000;
    color: white;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}


/* Hover elegante */
button:hover {
    background: #a00000;
    transform: scale(1.03);
}


/* Botão sair */
.sair {
    background: #d10000;
}


.sair:hover {
    background:rgb(159, 9, 9);
}


</style>


</head>
<body>

<div class="container">


    <h2>Painel da Loja</h2>


    <!-- AGORA FORA DO CSS (CORRETO) -->
       <!-- exibe o nome do usuario logado -->
    <div class="bemvindo">
        Bem-vindo, <?php echo $_SESSION['nome']; ?>
    </div>


    <!-- Cliente -->
    <a href="cliente.php">
        <button>Cadastrar Cliente</button>
    </a>
    <!-- ao escolhermos o botao cadstrar cliente vamos diretamente para a pagina de referencia cliente.php-->


    <!-- fornecedor somente admin ve, por isso o session tipo admin -->
    <?php if ($_SESSION['tipo'] == 'admin') { ?>
        <a href="fornecedor.php">
            <button>Cadastrar Fornecedor</button>
        </a>
    <?php } ?>
    <!-- ao escolhermos o botao cadstrar fornecedor vamos diretamente para a pagina de referencia fornecedor.php-->


    <!-- Vendedor somente admin ve, por isso o session tipo admin -->
    <?php if ($_SESSION['tipo'] == 'admin') { ?>
        <a href="cadastro_vendedor.php">
            <button>Cadastrar Vendedor</button>
        </a>
    <?php } ?>
        <!-- ao escolhermos o botao cadstrar vendedor vamos diretamente para a pagina de referencia cadastro_vendedor.php-->



    <!-- Estoque 
     acesso ao controle de produtos -->
    <a href="estoque.php">
        <button>Acessar Estoque</button>
    </a>


    <!-- da uma ação ao botao do tipo sair e uma pagina para executar essa ação, ou seja, 
     uma pagina para voltar ao sair do login atual -->
    <form action="index.php" method="post">
        <button class="sair">Sair</button>
    </form>


</div>


</body>
</html>
