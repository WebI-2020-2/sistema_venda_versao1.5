<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include '../controller/ItensEntrada.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

	<title>Alteração de Itens Entrada - WEB I</title>

</head>

<body>
	<h3>Alterar Itens da Entrada</h3>
	<fieldset>
	<?php
		//Alterar Cliente

		$iditensentrada = $_POST['iditensentrada'];
		$identrada = $_POST['identrada'];
		$idproduto = $_POST['idproduto'];
		$precocompra = $_POST['precocompra'];
		$quantidadeitensentrada = $_POST['quantidadeitensentrada'];
		$unidade = $_POST['unidade'];
		$ipi = $_POST['ipi'];
		$frete_itensentrada = $_POST['frete_itensentrada'];
		$icms = $_POST['icms'];
		

		if (isset($_POST['alterarDados']));
		{
		 $itensentrada = new Itensentrada;

		 	$itensentrada->setIdentrada($identrada);
		 	$itensentrada->setIdproduto($idproduto);
		 	$itensentrada->setPrecocompra($precocompra);
		 	$itensentrada->setQuantidadeitensentrada($quantidadeitensentrada);
		 	$itensentrada->setUnidade($unidade);
		 	$itensentrada->setIpi($ipi);
		 	$itensentrada->setFrete_itensentrada($frete_itensentrada);
		 	$itensentrada->setIcms($icms);
		 	$itensentrada->update($iditensentrada);

		 }

		//endif;
	?>

	<form method='post' action="">
		<br><label for='identrada'> Entrada</label>
            <br><input type="text" name="identrada" value="<?php echo $identrada;?>"/>
		<br><br><label for='idproduto'> Produto</label>
			<br><input type="text" name="idproduto" value="<?php echo $idproduto;?>"/>
		<br><br><label for='precocompra'> Preco de compra</label>
			<br><input type="text" name="precocompra" value="<?php echo $precocompra;?>"/>
		<br><br><label for='quantidadeitensentrada'> Quantidade de itens entrada</label>
			<br><input type="text" name="quantidadeitensentrada" value="<?php echo $quantidadeitensentrada;?>"/>
		<br><br><label for='unidade'> Unidade</label>
			<br><input type="text" name="unidade" value="<?php echo $unidade;?>"/>
			<br><br><label for='ipi'> Ipi</label>
			<br><input type="text" name="ipi" value="<?php echo $ipi;?>"/>
			<br><br><label for='frete_itensentrada'> Frete_itens entrada</label>
			<br><input type="text" name="frete_itensentrada" value="<?php echo $frete_itensentrada;?>"/>
			<br><br><label for='icms'> Icms</label>
			<br><input type="text" name="icms" value="<?php echo $icms;?>"/>
		
		<input type="hidden" name="iditensentrada" value="<?php echo $iditensentrada;?>"/>
		<br><br><input type="submit" value="AlterarDados"/><br>
		<br><br><br><a href=Listar_Itens_Entrada.php>Lista de itens entrada</a>

	</form>
						<!-- Fim da tabela -->
</fieldset>
</body>
</html>