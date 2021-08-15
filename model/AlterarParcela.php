<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include '../controller/Parcelas.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

	<title>Alteração de parcelas - WEB I</title>

</head>

<body>
	<h3>Alterar Parcela</h3>
	<fieldset>
	<?php
		//Alterar  prateleira
	
		$idparcelas = $_POST['idparcelas'];
		$idforma_de_pagamento = $_POST['idforma_de_pagamento'];
		$numerodeparcelas = $_POST['numerodeparcelas'];		
		$valorparcela = $_POST['valorparcela'];
		$status = $_POST['status'];
		$vencimento = $_POST['vencimento'];
		//$valortotalparcela = $_POST['valortotalparcela'];

		if (isset($_POST['alterarDados']));
		{
		 $parcelas = new Parcelas;

		 	
		 	$parcelas->setIdforma_de_pagamento($idforma_de_pagamento);
		 	$parcelas->setNumerodeparcelas($numerodeparcelas);
		 	$parcelas->setValorparcela($valorparcela);
		 	$parcelas->setStatus($status);
		 	$parcelas->setVencimento($vencimento);
		 	//$parcelas->setValortotalparcela($valortotalparcela);
		 	$parcelas->update($idparcelas);

		 }

		//endif;
	?>

	<form method='post' action="">
		 <br><label for='idforma_de_pagamento'> Forma_de_pagamento</label>
            <br><input type="text" name="idforma_de_pagamento" value="<?php echo $idforma_de_pagamento;?>"/>

            <br><label for='idforma_de_pagamento'> Formas de pagamento</label>
            <br><select name="idforma_de_pagamento" >
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

                                    $data = $conn->query('SELECT idforma_de_pagamento, tipo_pagamento FROM forma_de_pagamento');

                                    foreach($data as $row) {
                                         echo  '<option value="'.$row['idforma_de_pagamento'].'">'.$row['tipo_pagamento'].'</option>';
                                         //echo  '<option value="'.$row['idforma_de_pagamento'].'">'.$row['idforma_de_pagamento']. '-'.$row['tipo_pagamento'].'</option>';

                                    }

                                    } catch(PDOException $e) {
                                    echo 'ERROR: ' . $e->getMessage();
                                }
                            ?>

                            </option>
                     </select><br><br>      

		<br><label for='numerodeparcelas'> Número de parcelas</label>
            <br><input type="text" name="numerodeparcelas" value="<?php echo $numerodeparcelas;?>"/>          
        <br><br><label for='valorparcela'> Valor da parcela</label>
			<br><input type="text" name="valorparcela" value="<?php echo $valorparcela;?>"/>
			<br><br><label for='status'> Status</label>
			<br><input type="text" name="status" value="<?php echo $status;?>"/>
			<br><br><label for='vencimento'> Vencimento</label>
			<br><input type="text" name="vencimento" value="<?php echo $vencimento;?>"/>
			
		
		<br><input type="hidden" name="idparcelas" value="<?php echo $idparcelas;?>"/>
		<br><br><input type="submit" value="AlterarDados"/><br>
		<br><br><br><a href=ListarParcela.php>Lista de parcelas</a>

	</form>
						<!-- Fim da tabela -->
</fieldset>
</body>
</html>