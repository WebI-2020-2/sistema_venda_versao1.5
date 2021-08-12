<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include '../controller/Produto.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

	<title>Alteração de produtos - WEB I</title>

</head>

<body>
    <h3>Alterar Produto</h3>
    <fieldset>
	<?php
		//Alterar Cliente

		$idproduto = $_POST['idproduto'];
		$nomedoproduto = $_POST['nomedoproduto'];
		$idmarca = $_POST['idmarca'];
		$idcategoria = $_POST['idcategoria'];
		$quantidade = $_POST['quantidade'];
		$datavencimento = $_POST['datavencimento'];
		

		if (isset($_POST['alterarDados']));
		{
		 $produto = new Produtos;

		 	$produto->setNomedoproduto($nomedoproduto);
		 	$produto->setIdmarca($idmarca);
		 	$produto->setIdcategoria($idcategoria);
		 	$produto->setQuantidade($quantidade);
		 	$produto->setDatavencimento($datavencimento);
		 	$produto->update($idproduto);

		 }

		//endif;
	?>

	<form method='post' action="">
		<br><label for='nomedoproduto'> Nome do produto</label>
            <br><input type="text" name="nomedoproduto" value="<?php echo $nomedoproduto;?>"/>
            <br><label for='idmarca'> Marcas</label>
		<br><select name="idmarca" >
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

                                    $data = $conn->query('SELECT idmarca, nomemarca FROM marca');

                                    foreach($data as $row) {
                                         echo  '<option value="'.$row['idmarca'].'">'.$row['nomemarca'].'</option>';
                                         //echo  '<option value="'.$row['idmarca'].'">'.$row['idmarca']. '-'.$row['nomemarca'].'</option>';


                                    }

                                    } catch(PDOException $e) {
                                    echo 'ERROR: ' . $e->getMessage();
                                }
                            ?>

                            </option>
                     </select><br><br>

      <br><label for='idcategoria'> Categorias</label>
            <br><select name="idcategoria">
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

                                    $data = $conn->query('SELECT idcategoria, nome_categoria FROM categoria');

                                    foreach($data as $row) {
                                         echo  '<option value="'.$row['idcategoria'].'">'.$row['nome_categoria'].'</option>';
                                         //echo  '<option value="'.$row['idcategoria'].'">'.$row['idcategoria']. '-'.$row['nome_categoria'].'</option>';

                                    }

                                    } catch(PDOException $e) {
                                    echo 'ERROR: ' . $e->getMessage();
                                }
                            ?>

                            </option>
                     </select><br><br>




		<br><br><label for='quantidade'> Quantidade</label>
			<br><input type="text" name="quantidade" value="<?php echo $quantidade;?>"/>
		<br><br><label for='datavencimento'> Data_Vencimento</label>
			<br><input type="text" name="datavencimento" value="<?php echo $datavencimento;?>"/>
		
		
		<input type="hidden" name="idproduto" value="<?php echo $idproduto;?>"/>
		<br><br><input type="submit" value="AlterarDados"/><br>
		<br><br><br><a href=Listar_Produto.php>Lista de produtos</a>

	</form>
						<!-- Fim da tabela -->
</fieldset>
</body>
</html>