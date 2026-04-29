

<?php
    // o echo exibe algo na tela, nesse caso vai exibir a nossa senha criptografada
echo password_hash("1234", PASSWORD_DEFAULT);
?>