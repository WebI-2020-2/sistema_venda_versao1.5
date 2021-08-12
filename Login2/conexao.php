<?php
//Responsável pela conexão com o banco de dados 

	//Parâmetros
	$server = "ec2-35-172-16-31.compute-1.amazonaws.com"; //Pelo Ip já conecta direto, já o localhost precisar passar pelo servidor de DNS para buscar o ip, demora!
	$usuario = "ezxdmbtnsjpgnp";
	$senha= "a1a8d24d1e702c67dbcd66fba34b6dca0cb8d35ddb7b7ee6b2714de0cb9c420f";
	$banco = "d77pg4ripdb004";


	//MOSTRA OS ERROS
	try{ 
	$conexao = new PDO("pgsql:host=$server;dbname=$banco", $usuario, $senha);
	//Ativar relatorio de erros
	//Setar o relatorio de erros
	$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $erro){
		echo "Falha na conexão: {$erro->getMessage()}";
		//senão consegui conectar, o resultado da conexão será nulo
		$conexao = null;


	}


?> 