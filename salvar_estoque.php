<?php
//conecta os arquivos
include("conexao.php");

$fornecedor_id = $_POST['fornecedor_id'];
$vendedor_id = $_POST['vendedor_id'];
$cliente_id = !empty($_POST['cliente_id']) ? $_POST['cliente_id'] : null;
$preco = isset($_POST['preco']) ? $_POST['preco'] : 0;
$qtd = isset($_POST['quantidade']) ? $_POST['quantidade'] : 0;

//prepara para ser inserido, como ordem da tabela, valores para serem substituidos
$sql = $conn->prepare("
    INSERT INTO estoque 
    (fornecedor_id, vendedor_id, cliente_id, preco_produto, qtd_disponivel)
    VALUES 
    (:fornecedor, :vendedor, :cliente, :preco, :qtd)
");

//manda as informações preenchidas
$sql->execute([
    ':fornecedor' => $fornecedor_id,
    ':vendedor' => $vendedor_id,
    ':cliente' => $cliente_id,
    ':preco' => $preco,
    ':qtd' => $qtd
]);

//exibe um alerta de cadastrado e uma pagina para voltar automaticamente
echo "<script>
alert('Estoque cadastrado!');
window.location='painel.php';
</script>";
?>