<!DOCTYPE html>
<!--define a linguem html-->
<html lang="pt-br">
    <!-- define o idioma da nossa pagina-->
<head>
<meta charset="UTF-8">
<!--permite usar acentos corretamente-->
<title>Login - CLASS PANTS</title>
<!--mostra o nome da nossa loja em forma de titulo na aba do navegador-->




<!-- Fonte elegante -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">




<style>
/*o style define todo o estilo da nossa pagina de login, 
como a paleta de cores, onde irao ficar as caixas de texto
o estilo da fonte, margem, toda essa parte estsetica*/


body {
    font-family: 'Montserrat', sans-serif;
    background: linear-gradient(135deg, #2b0000, #5c0000);
    margin: 0;
}




/* Menu (3 linhas) */
.menu {
    position: absolute;
    top: 20px;
    right: 20px;
    cursor: pointer;
}




.menu div {
    width: 25px;
    height: 3px;
    background: white;
    margin: 5px 0;
    border-radius: 2px;
}




/* Texto de boas-vindas */
.welcome {
    text-align: center;
    color: white;
    margin-top: 80px;
    font-family: 'Playfair Display', serif;
}




.welcome span {
    display: block;
    font-size: 14px;
    letter-spacing: 2px;
    opacity: 0.8;
}




.welcome h1 {
    margin: 5px 0;
    font-size: 36px;
    letter-spacing: 5px;
    font-weight: 700;
}




/* Container */
.container {
    width: 340px;
    margin: 40px auto;
    padding: 30px;
    background: #ffffff;
    border-radius: 18px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.5);
}




/* Título */
h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #3b0000;
    font-family: 'Playfair Display', serif;
    letter-spacing: 2px;
}




/* Inputs */
input {
    width: 100%;
    padding: 12px;
    margin: 8px 0;
    border-radius: 10px;
    border: 1px solid #ccc;
    outline: none;
    transition: 0.3s;
}




/* Focus */
input:focus {
    border: 1px solid #5c0000;
    box-shadow: 0 0 6px rgba(92, 0, 0, 0.5);
}




/* Botão */
button {
    width: 100%;
    padding: 14px;
    margin-top: 15px;
    background: linear-gradient(135deg, #5c0000, #7a0000);
    color: white;
    border: none;
    border-radius: 10px;
    font-weight: 600;
    letter-spacing: 1px;
    cursor: pointer;
    transition: 0.3s;
}




/* Hover */
button:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.4);
}

</style>

</head>
<body>


<!-- título de recepção -->
<div class="welcome">
    <span>BEM-VINDO À</span>
    <h1>CLASS PANTS</h1>
</div>




<!-- Login -->
<div class="container">
    <h2>Login</h2>




    <form action="verifica_login.php" method="post">
        <!--da uma ação pro arquivo verifica login, no qual vai verificar se o login existe.-->
        <input type="text" name="login" placeholder="Login" required>
        <!--insere um tipo de texto com o nome login, que vai pedir o login-->
        <input type="password" name="senha" placeholder="Senha" required>
        <!--insere um tipo de senha com o nome senha, para ser iserido a senha do usuario-->

<!--ação e inserção dos campos de texto e dos textos respectivamente-->


        <button type="submit">Entrar</button>
        <!--cria o botao do tipo entrar-->
    </form>
</div>




</body>
</html>




