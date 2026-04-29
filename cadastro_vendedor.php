

<!--define a linguagem e o idioma da nossa pagina-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">

<!-- define todo o estilo da pagina de cadastrar vendedor-->
<style>
   body {
    font-family: 'Montserrat', sans-serif;
    background: linear-gradient(135deg, #2b0000, #5c0000);
    margin: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.topo h1 {
    font-family: 'Playfair Display', serif;
    letter-spacing: 4px;
}

/* topo corrigido */
.topo {
    text-align: center;
    color: white;
    margin-top: 20px;
}

/* container CENTRALIZADO */
.container {
    width: 420px;
    margin: 20px auto;
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
input, select {
    width: 100%;
    padding: 12px;
    margin: 6px 0;
    border-radius: 8px;
    border: 1px solid #ccc;
    transition: 0.3s;
}

/* foco */
input:focus, select:focus {
    border-color: #5c0000;
    box-shadow: 0 0 5px rgba(92,0,0,0.5);
}

/* LINHA */
.row {
    display: flex;
    gap: 10px;
}

/* SELECT DIFERENCIADO */
select {
    font-weight: bold;
    font-family: 'Playfair Display';
    color: #5c0000;
}

/* botão principal */
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

/* BOTÃO VOLTAR PADRÃO ESTOQUE */
.voltar {
    background: #999;
    margin-top: 14px;
}

.voltar:hover {
    background: #777;
}
</style>
</head>

<body>
<!-- Início do corpo da página, tudo que aparece na tela fica dentro do body -->

<div class="topo">
     <!-- Div (caixa) usada para o topo da página -->
    <!-- class="topo" serve para aplicar estilo CSS específico -->

    <h1>CLASS PANTS</h1>
    <!-- h1 é o título principal da página -->
</div>

<div class="container">
<!-- Container principal que segura todo o conteúdo -->
<!-- usado para centralizar e estilizar (largura, fundo, borda, etc) -->

    <h2>Controle de Vendedores</h2>
    <!-- h2 é um subtítulo (hierarquia abaixo do h1) -->

    <form action="salvar_vendedor.php" method="post">
    <!-- form cria um formulário -->
    <!-- action="salvar_vendedor.php" = para onde os dados vão -->
    <!-- method="post" = envia os dados de forma segura (não aparece na URL) -->

        <!-- IDENTIFICAÇÃO -->
        <div class="section">
        <!-- Div para separar visualmente uma seção -->
        <!-- class="section" permite estilizar essa área -->

            <h3>Dados Pessoais</h3>
            <!-- h3 = título menor para organizar conteúdo -->

            <input type="text" name="nome" placeholder="Nome completo" required>
            <!-- input cria um campo de entrada -->
            <!-- type="text" = aceita texto -->
            <!-- name="nome" = nome da variável que vai para o PHP -->
            <!-- placeholder = texto dentro do campo (dica pro usuário) -->
            <!-- required = campo obrigatório -->

            <input type="text" name="cpf" placeholder="CPF" required>
            <!-- outro campo de texto -->
            <!-- name="cpf" será usado no PHP ($_POST['cpf']) -->

        </div>

        <!-- ACESSO -->
        <div class="section">
        <!-- nova seção separando os dados de acesso -->

            <h3>Acesso ao Sistema</h3>

            <input type="password" name="senha" placeholder="Senha (6 números)" pattern="[0-9]{6}" required>
            <!-- type="password" esconde o que o usuário digita -->
            <!-- name="senha" = enviado para o PHP -->
            <!-- pattern="[0-9]{6}" = aceita apenas 6 números -->
            <!-- [0-9] = números de 0 a 9 -->
            <!-- {6} = exatamente 6 caracteres -->
            <!-- required = obrigatório -->

            <select name="tipo" required style="font-weight: bold;">
            <!-- select cria uma lista de opções -->
            <!-- name="tipo" = valor enviado ao PHP -->
            <!-- required = precisa escolher uma opção -->
            <!-- style="font-weight: bold;" deixa o texto em negrito -->

                <option value="">Nível de acesso</option>
                <!-- opção padrão (vazia) só para exibir texto -->

                <option value="vendedor">Vendedor (limitado)</option>
                <!-- value="vendedor" é o valor enviado ao banco -->

                <option value="admin">Administrador (total)</option>
                <!-- value="admin" define acesso maior -->

            </select>
        </div>

        <button type="submit">Registrar Vendedor</button>
        <!-- botão que envia o formulário -->
        <!-- type="submit" faz o envio -->
        <!-- texto dentro é o que aparece na tela -->

    </form>

    <button class="voltar" onclick="window.location.href='painel.php'">Voltar</button>
    <!-- botão separado (fora do form) -->
    <!-- class="voltar" para estilização -->
    <!-- onclick executa JavaScript ao clicar -->
    <!-- window.location.href redireciona para outra página -->
    <!-- 'painel.php' = página de destino -->

</div>

</body>
</html>
<!-- fim do documento HTML -->