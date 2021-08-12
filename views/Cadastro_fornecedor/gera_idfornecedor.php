<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once'../../controller/Fornecedor.php';
require_once'../../controller/Contato_Fornecedor.php';
require_once'../../controller/Endereco_cliente.php';
?>




<?php
$fornecedor = new Fornecedor();



try {
$idfornecedor = $fornecedor->insert($idfornecedor, date("Y-m-d"), 0);
/*index.php?idcliente significa que vou passa o ultimo idvenda da tabela para proximo pagina
para proximo pagina */
header("Location:Cadastro_fornecedor.php?idfornecedor=" . $idfornecedor);




} catch (PDOException $err) {
echo $err->getMessage();
}

?>

