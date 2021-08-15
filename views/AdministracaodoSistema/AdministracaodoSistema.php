
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Controle de entrada de produto </title>
    <link rel="stylesheet" type="text/css" href="../../public/css/administracaodosistema2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">

</head>
<body>
      <section id="nav-test">
      <div id="nav-container">
          <ul>
           
              
              <li class="nav-li"><a href="../../Login2/usuarios.php">USUARIOS <img src="../../public/imagem/clientes.png"></a></li>
            
             <li class="nav-li"><a href="../views/Cadastro_fornecedor/Cadastro_fornecedor.php">FORNECEDOR <img src="../../public/imagem/fornecedor.png"></a></li>
               
               <li class="nav-li"><a href="../Login2/AdministracaodoSistema.php">ADMINISTRAÇÃO <img src="../../public/imagem/administracao.png"></a></li> 

          </ul>
          <img class="logo" src="../../public/imagem/LOGO2.png">

      </div>

  </section>



     <h1 class='titulo'>SESSÕES</h1>
    <!-- Inicio da tabela -->

        <table>
           
           <td><button class="buton">Entrada</button></td>

           <a href="../../model/listarFornecedor.php"> <button class="buton">Fornecedores</button></a>
            <td><a href="../model/listarDevolucao.php"><button class="buton">Devoluções</button></td></a>

            <a href="../../model/listarFormapagamento.php"><button class="buton"> Forma de pagamento</button></td></a>

            <a href="../../model/listarParcela.php"><button class="buton"> Parcelas</button></td></a>

            <a href="../../model/listar_Cliente.php"><button class="buton"> Clientes </button></td></a>

            <td><a href="../../model/listarVendas.php"><button class="buton"> Vendas </button><br></td></a>

            <td><a href="../../model/listar_Itens_Vendas.php"><button class="buton"> Itens_Vendas </button></td></a>

            <td><a href="../../model/listar_Produto.php"><button class="buton"> Produtos </button></td></a>
            
            <td><a href="../../model/listar_Itens_Entrada.php"><button class="buton"> Itens_Entrada </button></td></a>

            <td><a href="../../model/listarCategoria.php"><button class="buton"> Categorias </button></td></a>
           
              
            </table>
      
            <!-- Fim da tabela -->

 
<footer> &#169; 2021 Copyright - <b>John, Leonardo, Paulo Sergio, Robério.</b>
    <a href ='logout.php'>Sair</a>
 </footer>
 
 

</body>
</html>