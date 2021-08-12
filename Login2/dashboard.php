<?php
	//validar se o usuário está realmente logado, pra ser redirecionado do login pra cá
	session_start();

	if(isset($_SESSION['usuario']) && is_array($_SESSION['usuario'])){
		//Só inclui o arquivo de conexão se o usuário estiver logado
		require ("conexao.php");
		//adm, vai receber a session no indice usuario e vai está no primeiro indíce do array, indice 1
		$adm = $_SESSION['usuario'][1];
		$nomeusuario = $_SESSION['usuario'][0];

	}else{
		echo "<script>window.location = '../index.html'</script>";
	}
?>

<html>
<head>
	<meta charset="utf-8">
	<?php //nome do usuario exibindo no título da guia?>
	<title>Dashboard - <?php echo $nomeusuario; ?></title>
</head>
<body>
	
	<?php //Verificação pra vê se usuário é administrador?>
	<?php if($adm == 1):	//if($adm ==1) não precisa colocar == 1, pq true é igual a 1?>

		<h4><?php echo "Seja Bem-Vindo: ADMINISTRADOR"; ?></h4>
		<h1>Lista de usuários</h1>
		<?php //criar tabela para vê os usuários que existem?>
		<fieldset>
		<table width="80%">
			<thead>				
				<tr style="font-weight: bold">
					<td>Nome do usuario</td>
					<td>E-mail</td>
					<td>Senha</td>
					<td>Cargo</td>
					<td>Adm</td>
					
					<?php //<td>Excluir</td> ?>
				</tr>				
			</thead>
			<tbody>
					<?php //procurar os usuarios no banco de dados, sem condicoes no select?>
					<?php
					$query = $conexao->prepare("SELECT * FROM usuario");
					$query->Execute();
					//echo $query->rowCount();
					$users = $query->fetchAll (PDO::FETCH_ASSOC);

						//Um for para repetir a estrutura da tabela, ou seja, para cada linha da tabela usuario, mudando os valores;
						for($i = 0; $i < sizeof($users); $i++):
							$usuarioAtual = $users[$i];
					?>

				<tr>
					<?php //Imprimindo os valores das variáveis?>
					<td><?php echo $usuarioAtual["nomeusuario"]; ?></td>
					<td><?php echo $usuarioAtual["email"]; ?></td>
					<td><?php echo $usuarioAtual["senha"]; ?></td>
					<td><?php echo $usuarioAtual["cargo"]; ?></td>
					<td><?php echo $usuarioAtual["adm"]; ?></td>
					
					<?php //<td><button>Excluir</button></td> ?>
				</tr>
					<?php endfor; ?>
			</tbody>
		</table>
		</fieldset>
		<fieldset><br><a href=../views/CadastrarUsuario.php><td><button name="Cadastrar novo Usuário" type="submit">Cadastrar Usuário</button></td></a></fieldset>

		<fieldset><br><a href=../views/Cadastro_fornecedor/gera_idfornecedor.php><td><button name="Cadastrar novo Fornecedor" type="submit">Cadastrar Fornecedor</button></td></a></fieldset>

		<br><br><a href=../login2/AdministracaodoSistema.php><td><button name="AdministracaodoSistema" type="submit">Administração do Sistema</button></td></a><br><br>

		<?php elseif($adm == 0):	//if($adm ==0) não precisa colocar == 0, pq true é igual a 1?>

		<h4><?php echo "Seja Bem-Vindo: VENDEDOR"; ?></h4>		

		<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Olá </title>
</head>
<body>	
	<fieldset>
		<h1>Tela de vendedor</h1>

		<a href="../views/Realizas_Vendas/index.php"><button>Realizar venda</button><br><br>

		<a href="../model/ListarProdutoVenda.php"><button>Ver produtos </button><br><br>

			<a href="../views/CadastrarCliente.php"><button>Cadastrar cliente</button><br><br>

	</fieldset>

<?php else: //if($adm ==2) não precisa colocar == 2, pq true é igual a 1?>

		<h4><?php echo "Seja Bem-Vindo: ESTOQUISTA" ?></h4>		

		<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Olá </title>
</head>
<body>	
	<fieldset>
		<h1>Tela do Estoquista</h1>

		<a href="../views/entrada_produto/gera_id_entrada.php"><button>Realizar entrada</button><br><br>

		<a href="../views/CadastrarItensEntrada.php"><button> Cadastrar itens_entrada </button><br><br>

			<a href="../model/ListarProdutoVenda.php"><button>Visualizar produtos</button><br><br>

	</fieldset>
<?php endif ?>

</body>
</html>

	
	<?php //usuario saindo da pagina que acessou, atraves do destroy da sessão que esta em logout ?>


	<br><br><a href ='logout.php'> Sair</a>
</body>
</html>