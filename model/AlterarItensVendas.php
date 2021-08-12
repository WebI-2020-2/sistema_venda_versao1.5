<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include '../controller/ItensVenda.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

	<title>Alteração de Itens Vendas - WEB I</title>

</head>

<body>
    <h3>Alterar Itens da Venda</h3>
    <fieldset>
	<?php
		//Alterar Cliente

		$iditensvendas = $_POST['iditensvendas'];
		$idvenda = $_POST['idvenda'];
		$idproduto = $_POST['idproduto'];
		$quantidade = $_POST['quantidade'];
		$valorvenda = $_POST['valorvenda'];
		$desconto = $_POST['desconto'];
		

		if (isset($_POST['alterarDados']));
		{
		 $itensvendas = new Itensvendas;

		 	$itensvendas->setIdvenda($idvenda);
		 	$itensvendas->setIdproduto($idproduto);
		 	$itensvendas->setQuantidade($quantidade);
		 	$itensvendas->setValorvenda($valorvenda);
		 	$itensvendas->setDesconto($desconto);
		 	$itensvendas->update($iditensvendas);

		 }

		//endif;
	?>

	<form method='post' action="">
		<br><label for='idvenda'> Código vendas</label>
            <br><input type="text" name="idvenda" value="<?php echo $idvenda;?>"/>
            <br><label for='idvenda'> Vendas</label>
            <br><select name="idvenda"  placeholder="Digite a venda">
                <option> Selecione </option>
                        <option>
                            <?php
                                /*
                                * Método de conexão sem padrões
                                */

                                $username = 'postgres';
                                $password = '123456';

                                try {
                                    $conn = new PDO('pgsql:host=localhost;dbname=John2', $username, $password);
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                    $data = $conn->query('SELECT idvenda, datavenda FROM venda');

                                    foreach($data as $row) {
                                         echo  '<option value="'.$row['idvenda'].'">'.$row['datavenda'].'</option>';
                                         //echo  '<option value="'.$row['idvenda'].'">'.$row['idvenda']. '-'.$row['datavenda'].'</option>';


                                    }

                                    } catch(PDOException $e) {
                                    echo 'ERROR: ' . $e->getMessage();
                                }
                            ?>

                            </option>
                     </select><br><br>  

                     
                     <br><br><label for='idproduto'> Código produto</label>
			<br><input type="text" name="idproduto" value="<?php echo $idproduto;?>"/>
    <br><label for='idproduto'> Produtos</label>
            <br><select name="idproduto"  placeholder="Digite o produto">
                <option> Selecione </option>
                        <option>
                            <?php
                                /*
                                * Método de conexão sem padrões
                                */

                                $username = 'postgres';
                                $password = '123456';

                                try {
                                    $conn = new PDO('pgsql:host=localhost;dbname=John2', $username, $password);
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                    $data = $conn->query('SELECT idproduto, nomedoproduto FROM produto');

                                    foreach($data as $row) {
                                         echo  '<option value="'.$row['idproduto'].'">'.$row['nomedoproduto'].'</option>';
                                         //echo  '<option value="'.$row['idproduto'].'">'.$row['idproduto']. '-'.$row['nomedoproduto'].'</option>';

                                    }

                                    } catch(PDOException $e) {
                                    echo 'ERROR: ' . $e->getMessage();
                                }
                            ?>

                            </option>
                     </select><br><br>  

		
		<br><br><label for='quantidade'> Quantidade</label>
			<br><input type="text" name="quantidade" value="<?php echo $quantidade;?>"/>
		<br><br><label for='valorvenda'> Valor venda</label>
			<br><input type="text" name="valorvenda" value="<?php echo $valorvenda;?>"/>
		<br><br><label for='desconto'> Desconto</label>
			<br><input type="text" name="desconto" value="<?php echo $desconto;?>"/>
		
		<input type="hidden" name="iditensvendas" value="<?php echo $iditensvendas;?>"/>
		<br><br><input type="submit" value="AlterarDados"/><br>
		<br><br><br><a href=Listar_Itens_Vendas.php>Lista de itens vendas</a>

	</form>
						<!-- Fim da tabela -->
</fieldset>
</body>
</html>