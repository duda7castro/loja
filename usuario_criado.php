<?php
//pega os dados enviados
$login = $_GET['login'];

//e o get captura as informações
?>

<h2>Usuário criado com sucesso!</h2>
<!--mensagem de confirmação-->

<p><strong>Login:</strong> <?php echo $login; ?></p>
<!-- echo exibe o login gerado na tela -->

<a href="painel.php">Voltar</a>