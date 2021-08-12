
--
-- Banco de dados: `perfumaria`
--

-------------------------------------------------------


--
-- Tabela `usuario`
--


CREATE TABLE usuario
(
    idusuario serial primary key,
    nomeusuario varchar(100),
    email varchar(100),
    senha varchar(100),    
    cargo varchar (100),
    adm int
);


--
-- Inserindo dados na tabela usuario
--


insert into usuario (idusuario,nomeusuario,email,senha,cargo,adm)
		values(1,'Reginaldo', '@regisLin','123456','Consultor de vendas','0');
		values(2,'Julliete','@SilvaJu','6544321','Auxiliar de vendas','0');
		values(3,'Ana Rosa','@Aninhagmail.com','123345iur','Vendedora,'0');
		values(4,'Júnior Fagundes','JuniorFag2021','123456','Gerente','1');
		values(5,'Ana CLara','@anaclaragmail.com','112233','Estoquista','2');
------------------------------------------------------------------------------------------------------

--
-- Tabela `fornecedor`
--


CREATE TABLE fornecedor
(
    idfornecedor serial primary key,
    razaosocial varchar(100),
    nomefantasia varchar(100),
    cnpj varchar(100)
);

--
-- Inserindo dados na tabela fornecedor
--

	insert into Fornecedor(idFornecedor,razaosocial,nomefantasia,cnpj)
				values(1,'TM COSMÉTICOS INDÚSTRIA E COMÉRCIO LTDA','Entrega de cosméticos','24.563.783/7423-65');
	insert into Fornecedor(idFornecedor,razaosocial,nomefantasia,cnpj)
				values(2,'R,L importados','Perfumaria importada','52.324.543/5236-27');
	insert into Fornecedor(idFornecedor,razaosocial,nomefantasia,cnpj)
				values(3,'REPRESENTANTE JOICO COSMÉTICOS PROFISSIONAI','Essenza perfumes','86.000.183/2643-66');
--------------------------------------------------------------------------------------------------------

--
-- Tabela `contato_fornecedor`
--


CREATE TABLE contato_fornecedor
(
    idcontatofornecedor serial primary key,
    idfornecedor int,
    telefone_fornecedor varchar(100),
    whatsappfornecedor varchar(100),
    email_fornecedor varchar(100),
    foreign key(idfornecedor) references fornecedor(idfornecedor) on delete cascade on update cascade
);

--
-- Inserindo dados na tabela contato_fornecedor
--

	insert into contato_fornecedor values(1,1,'34546789','02118998626789','TMcosmeticos@outlook.com');
	insert into contato_fornecedor values(2,2,'36610987','02119999967895','RLImportados@gmail.com');
	insert into contato_fornecedor values(3,3,'57879876','04122988626769','essenza@outlook.com');
-------------------------------------------------------------------------------------------------------

--
-- Tabela `entrada`
--


CREATE TABLE entrada
(
    identrada serial primary key,
    idfornecedor int,
    valortotaldanota numeric(7,2),
    dataentrada date,
    idusuario int,
    foreign key (idusuario) references usuario(idusuario) on delete cascade on update cascade,
    foreign key (idfornecedor) references fornecedor(idfornecedor) on delete cascade on update cascade
);

--
-- Inserindo dados na tabela entrada
--

	insert into Entrada(idEntrada,idusuario,idfornecedor,valortotaldanota,dataentrada)
				values(1,3,2,2000,'2021/01/28');
	insert into Entrada(idEntrada,idusuario,idfornecedor,valortotaldanota,dataentrada)
				values(2,2,1,1500,'2021/02/12');
	insert into Entrada(idEntrada,idusuario,idfornecedor,valortotaldanota,dataentrada)
				values(3,1,2,2300,'2021/03/04');
	insert into Entrada(idEntrada,idusuario,idfornecedor,valortotaldanota,dataentrada)
				values(4,3,2,3000,'2021/01/14');
	insert into Entrada(idEntrada,idusuario,idfornecedor,valortotaldanota,dataentrada)
				values(5,2,1,2500,'2020/12/16');
	insert into Entrada(idEntrada,idusuario,idfornecedor,valortotaldanota,dataentrada)
				values(6,5,3,2300,'2020/11/19');
	insert into Entrada(idEntrada,idusuario,idfornecedor,valortotaldanota,dataentrada)
				values(7,3,1,1800,'2020/11/29');
	insert into Entrada(idEntrada,idusuario,idfornecedor,valortotaldanota,dataentrada)
				values(8,6,3,2900,'2021/03/05');
	insert into Entrada(idEntrada,idusuario,idfornecedor,valortotaldanota,dataentrada)
				values(9,4,3,4700,'2020/12/27');
	insert into Entrada(idEntrada,idusuario,idfornecedor,valortotaldanota,dataentrada)
				values(10,3,2,2450,'2021/02/28');
--------------------------------------------------------------------------------------------------------

--
-- Tabela `marca`
--


CREATE TABLE marca
(
    idmarca serial primary key,
    nomemarca varchar(100)
);

--
-- Inserindo dados na tabela marca
--

	insert into Marca(idMarca,nomemarca)
			values(1,'Natura');
			values(2,'Gucci');
			values(3,'O Boticário');
			values(4,'Mercedes Benz');
			values(5,'Jequiti');
			values(6,'Avon');
			values(7,'Ferrari');
			values(8,'Ana Hickmann');
			values(9,'Invictus');
		        values(10,'Armani Code');	
			values(11,'Granado');
			values(12,'Johnson Baby');
			values(13,'Giovanna Baby');
-----------------------------------------------------------------------------

--
-- Tabela `categoria`
--


CREATE TABLE categoria
(
    idcategoria serial primary key,
    nome_categoria varchar(100)
);

--
-- Inserindo dados na tabela categoria
--

	insert into categoria(idcategoria,nome_categoria)
			values(1,'Parfum');
			values(2,'Eau de Parfum');
			values(3,'Eau de Toilette');
			values(4,'Eau de Cologne');
			values(5,'Perfumes Masculinos Importados');
			values(6,'Perfumes Femininos Importados');
			values(7,'Perfumes Masculinos Nacionais');
			values(8,'Perfumes Femininos Nacionais');
			values(9,'Perfumes Infantil');
-------------------------------------------------------------------------------

--
-- Tabela `prateleira`
--


CREATE TABLE prateleira
(
    idprateleira serial primary key,
    idcategoria int,
    descricaoprateleira varchar(100),
    quantidadefrascos int,
    foreign key(idcategoria) references categoria(idcategoria) on delete cascade on update cascade
);

--
-- Inserindo dados na tabela prateleira
--

	insert into Prateleira(idPrateleira,idcategoria,descricaoprateleira,quantidadefrascos)
				values(1,3,'Perfumes Importados',2);
				values(2,1,'Perfumes Nacionais',4);
				values(3,4,'Réplicas de Perfumes Importados',5);
				values(4,2,'Réplicas de Perfumes Nacionais',2);
				values(5,5,'Perfumes Importados',10);
				values(6,9,'Perfumes Importados',12);
				values(7,6,'Perfumes Importados',4);
				values(8,7,'Perfumes Nacionais',20);
				values(9,8,'Perfumes Nacionais',25);
				values(10,9,'Perfumes Nacionais',15);
------------------------------------------------------------------------------------------------------------


--
-- Tabela `produto`
--


CREATE TABLE produto
(
    idproduto serial primary key,
    nomedoproduto varchar(100),
    idmarca int,
    idcategoria int,
    icms numeric(7,2),
    ipi numeric(7,2),
    frete numeric(7,2),
    valornafabrica numeric(7,2),
    valordecompra numeric(7,2),
    lucro numeric(7,2),
    valorvenda numeric(7,2),
    desconto numeric(7,2),
    quantidade numeric(7,2),
    datavencimento date,
    foreign key(idmarca) references marca(idmarca) on delete cascade on update cascade,
    foreign key(idcategoria) references categoria(idcategoria) on delete cascade on update cascade
);

--
-- Inserindo dados na tabela produto
--

	insert into produto(idproduto,nomedoproduto,idmarca,idcategoria,quantidade,datavencimento)
				values(39,'Scuderia Ferarri Forte',7,5,30,'2021/03/30');
insert into produto(idproduto,nomedoproduto,idmarca,idcategoria,quantidade,datavencimento)
				values(40,'Scuderia Ferrari Red',7,5,30,'2021/06/28');
insert into produto(idproduto,nomedoproduto,idmarca,idcategoria,quantidade,datavencimento)
				values(41,'Britney Spears Fantasy',7,6,30,'2021/03/27');
insert into produto(idproduto,nomedoproduto,idmarca,idcategoria,quantidade,datavencimento)
				values(42,'Dream',8,8,30,'2021/03/29');
insert into produto(idproduto,nomedoproduto,idmarca,idcategoria,quantidade,datavencimento)
				values(43,'Invictus Paco Rabanne',9,5,30,'2021/03/30');
insert into produto(idproduto,nomedoproduto,idmarca,idcategoria,quantidade,datavencimento)
				values(44,'Lady Million Lucky',9,6,30,'2021/07/27');
insert into produto(idproduto,nomedoproduto,idmarca,idcategoria,quantidade,datavencimento)
				values(45,'Armani Code Homme',10,5,30,'2021/06/30');
insert into produto(idproduto,nomedoproduto,idmarca,idcategoria,quantidade,datavencimento)
				values(46,'Gerânio e Grapefruit',11,6,30,'2021/09/28');
insert into produto(idproduto,nomedoproduto,idmarca,idcategoria,quantidade,datavencimento)
				values(47,'Mamãe e Bebê',12,9,30,'2021/10/19');
insert into produto(idproduto,nomedoproduto,idmarca,idcategoria,quantidade,datavencimento)
				values(48,'Lavanda Johnson''s Baby',12,9,30,'2021/07/24');
insert into produto(idproduto,nomedoproduto,idmarca,idcategoria,quantidade,datavencimento)
				values(49,'Giovanna Baby Classic',13,9,30,'2021/09/16');
---------------------------------------------------------------------------------------------------------


--
-- Tabela `itensentrada`
--


CREATE TABLE itensentrada
(
    iditensentrada serial primary key,
    identrada int,
    idproduto int,
    precocompra numeric(7,2),
    quantidade numeric(7,2),
    unidade varchar(2),
    ipi numeric(7,2),
    frete numeric(7,2),
    icms numeric(7,2),
    foreign key(identrada) references entrada(identrada) on delete cascade on update cascade,
    foreign key(idproduto) references produto(idproduto) on delete cascade on update cascade
);

--
-- Inserindo dados na tabela itensentrada
--

	insert into itensentrada(iditensentrada,idEntrada,idproduto,precocompra,quantidade,unidade,ipi,frete,icms)
					values(1,1,11,70,50,'Fr',1,3,2.50);
	insert into itensentrada(iditensentrada,idEntrada,idproduto,precocompra,quantidade,unidade,ipi,frete,icms)
					values(2,3,12,80,40,'Fr',2,6,5);
	insert into itensentrada(iditensentrada,idEntrada,idproduto,precocompra,quantidade,unidade,ipi,frete,icms)
					values(3,2,10,50,38,'Fr',2,4,2);
	insert into itensentrada(iditensentrada,idEntrada,idproduto,precocompra,quantidade,unidade,ipi,frete,icms)
					values(4,9,20,100,30,'fr',2,3,3);
	insert into itensentrada(iditensentrada,idEntrada,idproduto,precocompra,quantidade,unidade,ipi,frete,icms)
					values(5,4,34,120,30,'Fr',2,7,4);
-----------------------------------------------------------------------------------------------------------------------------


--
-- Tabela `cliente`
--


CREATE TABLE cliente
(
    idcliente serial primary key,
    nomecliente varchar(100),
    cpfcliente varchar(100), 
    rgcliente varchar(100), 
    sexocliente varchar(100), 
    datanascimento date,
    debito numeric(7,2),
    
);

--
--Inserindo dados na tabela `cliente`
--

	insert into cliente(idcliente,nomecliente,cpfcliente,rgcliente,sexocliente,datanascimento,debito)
			values(1,'Roberio','234.657.980-34','23.400.758-61','M','1990/02/14',NULL);
			values(2,'John','232.085.790-34','23.400.758-61','M','1999/02/10',NULL);
			values(3, 'Matheus Pereira','097.265.798.-34','23.400.758-61','M','2000/01/15',NULL);
			values (4,'Jefferson Moraes','123.897.345-45','18.345.237-56','M','2004/04/18',NULL);
			values (5,'Artur Cardoso','098.677.356-45','23.365.838-55','M','1960/04/12',NULL);
			values (6,'Cleidiane','253.897.288-45','28.345.237-56','F','1980/11/27',NULL);
			values (7,'Aline Souza','444.087.565-45','45.390.229-34','F','1995/07/02',NULL);
--------------------------------------------------------------------------------------------------------------------------

--
-- Tabela `contato_cliente`
--

CREATE TABLE contato_cliente
(
    idcontatocliente serial primary key,
    idcliente int,
    telefone varchar(100),
    email varchar(100),
    whatsapp varchar(100),
    foreign key (idcliente) references cliente (idcliente) on delete cascade on update cascade
);

--
--Inserindo dados na tabela `contato_cliente`
--

	insert into contato_cliente values(1,1,'37717890','Roberiorob@gamil.com','04177991567890');
	insert into contato_cliente values(2,2,'36617753','John6758@gamil.com','02177991567890');
	insert into contato_cliente values(3,3,'40014367','Matheuspereira@gamil.com','04177991567890');
	insert into contato_cliente values(4,4,'34340843','JeffersonMoraes90@gamil.com','04177991567890');
	insert into contato_cliente values(5,5,'37789043','Arturcardoso@gamil.com','04177991567890');
	insert into contato_cliente values(6,6,'37716765','Cleidiane@gamil.com','02177991567890');
----------------------------------------------------------------------------------------------------------------------


--
-- Tabela `venda`
--


CREATE TABLE venda
(
    idvenda serial primary key,
    idusuario int,
    idcliente int,
    datavenda date,
    descontototal numeric(7,2),
    descontoacerto numeric(7,2),
    valortotal numeric(7,2),
    foreign key(idusuario) references usuario(idusuario) on delete cascade on update cascade,
    foreign key(idcliente) references cliente(idcliente) on delete cascade on update cascade
);

--
-- Inserindo dados na tabela venda
--

	insert into Venda(idVenda,idusuario,idcliente,datavenda,valortotal)
				values(1,2,3,'2021/02/28',0);
	insert into Venda(idVenda,idusuario,idcliente,datavenda,valortotal)
				values(2,1,2,'2021/03/20',0);
	insert into Venda(idVenda,idusuario,idcliente,datavenda,valortotal)
				values(3,2,1,'2021/03/25',0);
	insert into Venda(idVenda,idusuario,idcliente,datavenda,valortotal)
				values(4,7,3,'2021/03/25',0);
	insert into Venda(idVenda,idusuario,idcliente,datavenda,valortotal)
				values(5,9,1,'2021/03/25',0);
	insert into Venda(idVenda,idusuario,idcliente,datavenda,valortotal)
				values(6,5,5,'2021/03/24',0);
	insert into Venda(idVenda,idusuario,idcliente,datavenda,valortotal)
				values(7,7,3,'2021/03/24',0);
	insert into Venda(idVenda,idusuario,idcliente,datavenda,valortotal)
				values(8,10,2,'2021/03/19',0);
	insert into Venda(idVenda,idusuario,idcliente,datavenda,valortotal)
				values(9,1,2,'2021/03/19',0);
	insert into Venda(idVenda,idusuario,idcliente,datavenda,valortotal)
				values(10,6,7,'2021/03/19',0);
--------------------------------------------------------------------------------------------------------


--
-- Tabela `forma_de_pagamento`
--


CREATE TABLE forma_de_pagamento(
    idforma_de_pagamento serial primary key,
    tipo_pagamento varchar(100),
    idvenda int,
    numero_parcela int,
    data_parcela DATE,
    foreign key (idvenda) references venda(idvenda) on delete cascade on update cascade
);

--
-- Inserindo dados na tabela forma_de_pagamento
--

	insert into forma_de_pagamento values(1,'Boleto Bancário',1,4,'2021/08/20');
	insert into forma_de_pagamento values(2,'Cartão de crédito',3,4,'2021/08/20');
	insert into forma_de_pagamento values(3,'Cartão de débito',5,4,'2021/08/20');
	insert into forma_de_pagamento values(4,'Cheque',6,4,'2021/08/20');
	insert into forma_de_pagamento values(5,'Dinheiro',7,4,'2021/08/20');
--------------------------------------------------------------------------------------------------------	

--
-- Tabela `pagamento`
--


CREATE TABLE pagamento
(
    idpagamento serial primary key,
    valor_pagamento numeric(7,2),
    data_pagamento date,
    numerosdeparcelas int
);

--
-- Inserindo dados na tabela pagamento
--

	insert into pagamento values(1,150,'2021/03/23',1);
	insert into pagamento values(2,300,'2021/03/23',1);
	insert into pagamento values(3,300,'2021/03/24',1);
	insert into pagamento values(4,100,'2021/03/25',1);
	insert into pagamento values(5,150,'2021/03/22',1);
	insert into pagamento values(6,150,'2021/03/22',1);
------------------------------------------------------------------------------------------------

--
-- Tabela `parcelas`
--


CREATE TABLE parcelas
(
    idparcelas serial primary key,
    idforma_de_pagamento int,
    idpagamento int,
    numerodeparcelas int,
    valorparcela numeric(7,2),
    status varchar(20),
    vencimento date,
    valortotalparcela numeric(7,2),
    foreign key(idforma_de_pagamento) references forma_de_pagamento(idforma_de_pagamento) on delete cascade on update cascade,
    foreign key(idpagamento) references pagamento(idpagamento) on delete cascade on update cascade
);

--
-- Inserindo dados na tabela parcelas
--

	insert into parcelas(idparcelas,idforma_de_pagamento,idpagamento,numerodeparcelas,valorparcela, status, vencimento, valortotalparcela)
 			values(1,3,6,2,100,'NP','2021/03/29',1800);
	insert into parcelas(idparcelas,idforma_de_pagamento,idpagamento,numerodeparcelas,valorparcela, status, vencimento, valortotalparcela)	
 			values(2,2,6,600,200,'NP','2021/03/30',3600); 
	insert into parcelas(idparcelas,idforma_de_pagamento,idpagamento,numerodeparcelas,valorparcela, status, vencimento, valortotalparcela)
			values(3,,5,150,300,'NP','2021/03/24',750);
	insert into parcelas(idparcelas,idforma_de_pagamento,idpagamento,numerodeparcelas,valorparcela, status, vencimento, valortotalparcela)
			values(4,2,5,300,450,'NP','2021/03/25',1500);
	insert into parcelas(idparcelas,idforma_de_pagamento,idpagamento,numerodeparcelas,valorparcela, status, vencimento, valortotalparcela)
			values(5,3,8,100,500,'NP','2021/03/26',800);

-----------------------------------------------------------------------------------------------------------------------------------

--
-- Tabela `itens_vendas`
--


CREATE TABLE itens_vendas
(
    iditensvendas serial primary key,
    idvenda int,
    idproduto int,
    quantidade_itens numeric(7,2),
    valor numeric(7,2),
    desconto numeric(7,2),
    foreign key (idvenda) references venda(idvenda) on delete cascade on update cascade,
    foreign key (idproduto) references produto(idproduto) on delete cascade on update cascade
);

--
-- Inserindo dados na tabela itens_vendas
--

	insert into itens_vendas(iditensvendas,idvenda,idproduto,quantidade_itens,valor,desconto)
				values(1,2,10,5,500,10);
	insert into itens_vendas(iditensvendas,idvenda,idproduto,quantidade_itens,valor,desconto)
				values(2,3,12,10,900,5);
	insert into itens_vendas(iditensvendas,idvenda,idproduto,quantidade_itens,valor,desconto)
				values(3,1,11,7,1200,20);
	insert into itens_vendas(iditensvendas,idvenda,idproduto,quantidade_itens,valor,desconto)
				values(4,5,20,5,151.20,6);
	insert into itens_vendas(iditensvendas,idvenda,idproduto,quantidade_itens,valor,desconto)
				values(5,9,34,2,186.20,10);
	insert into itens_vendas(iditensvendas,idvenda,idproduto,quantidade_itens,valor,desconto)
				values(6,5,39,4,148.40,10);
	insert into itens_vendas(iditensvendas,idvenda,idproduto,quantidade_itens,valor,desconto)
				values(7,4,28,3,166.60,10);
	insert into itens_vendas(iditensvendas,idvenda,idproduto,quantidade_itens,valor,desconto)
				values(8,6,28,2,134.40,10);
	insert into itens_vendas(iditensvendas,idvenda,idproduto,quantidade_itens,valor,desconto)
				values(9,8,19,5,144.20,10);
	insert into itens_vendas(iditensvendas,idvenda,idproduto,quantidade_itens,valor,desconto)
				values(10,10,14,8,833,100);
	insert into itens_vendas(iditensvendas,idvenda,idproduto,quantidade_itens,valor,desconto)
				values(11,7,14,8,833,100);
	insert into itens_vendas(iditensvendas,idvenda,idproduto,quantidade_itens,valor,desconto)
				values(12,10,14,8,833,100);
	insert into itens_vendas(iditensvendas,idvenda,idproduto,quantidade_itens,valor,desconto)
				values(13,10,14,8,833,100);
----------------------------------------------------------------------------------------------------------
--
-- Tabela `endereco_cliente`
--


CREATE TABLE endereco_cliente
(
    idendereco_cliente serial primary key,
    idcliente int,
    cidade varchar(100),
    estado varchar(100),
    bairro varchar(100),
    rua varchar(100),
    numero int,
    cep varchar(100),
    foreign key (idcliente) references cliente (idcliente) on delete cascade on update cascade
);

--
-- Tabela `devolucao`
--

CREATE TABLE devolucao
(
    iddevolucao serial primary key,
    quantidade_devolvida numeric(7,2),
    datadevolucao date,
    descricaodadevolucao varchar(100),
    iditensvendas int,
    foreign key (iditensvendas) references itens_vendas(iditensvendas) on delete cascade on update cascade
);

--
-- Inserindo dados na tabela devolução
--

	insert into devolucao values(1,1,'2021/03/23','Rótulo corrompido',4);
	insert into devolucao values(2,1,'2021/03/22','Produto vencido',1);
	insert into devolucao values(3,1,'2021/03/19','Rótulo Inalterado',2);
	insert into devolucao values(4,1,'2021/03/24','Produto trocado',5);
	insert into devolucao values(5,1,'2021/03/25','Troca',2);

-----------------------------------------------------------------------------------------
/*Trigger para entrada de itens venda*/

CREATE OR REPLACE FUNCTION insert_update_delete_itensvenda_produto()
RETURNS TRIGGER AS $insert_update_delete_itensvenda_produto$
DECLARE
BEGIN
 /*o nome dessa trigger esta insert_delete_itensentrada porque são trigger faz as operações insert or update or delete depende da condição operação realizada pelo usuario*/

IF (TG_OP = 'INSERT') THEN
		if((new.quantidade_itens>0) and (new.desconto>0)) then
			UPDATE produto SET quantidade =quantidade - new.quantidade_itens,
					--valortotal de venda--   --menor-- --o valor da porcentagem--
			lucro=lucro+((new.valor * new.quantidade_itens)-((new.valor * new.quantidade_itens)*(new.desconto/100)))-
					--desconto acerto--
		(((new.valor * new.quantidade_itens)-(new.valor * new.quantidade_itens)*(new.desconto/100)) - 
		trunc((new.valor * new.quantidade_itens)-(new.valor * new.quantidade_itens)*(new.desconto/100)))-
									--valor de compra - quantidade de itens da itens_venda--
									(valordecompra * new.quantidade_itens)
			where idproduto = new.idproduto;
		end if;
		
	-- Aqui temos um bloco IF que confirmará o tipo de operação UPDATE.
	ELSIF (TG_OP = 'UPDATE') THEN
		if((new.quantidade_itens>0) and (new.desconto>0)) then
			UPDATE produto SET quantidade =quantidade - new.quantidade_itens,
					--valortotal de venda--   --menor-- --o valor da porcentagem--
			lucro=lucro-(((new.valor * new.quantidade_itens)-((new.valor * new.quantidade_itens)*(new.desconto/100)))-
					--desconto acerto--
		(((new.valor * new.quantidade_itens)-(new.valor * new.quantidade_itens)*(new.desconto/100)) - 
		trunc((new.valor * new.quantidade_itens)-(new.valor * new.quantidade_itens)*(new.desconto/100)))-
									--valor de compra - quantidade de itens da itens_venda--
									(valordecompra * new.quantidade_itens))
			where idproduto = new.idproduto;
		end if;
		
												
		RETURN old;
	-- Aqui temos um bloco IF que confirmará o tipo de operação DELETE
	ELSIF (TG_OP = 'DELETE') THEN
			UPDATE produto set quantidade=quantidade + new.quantidade_itens,
				lucro=lucro-((new.valor * new.quantidade_itens)-((new.valor * new.quantidade_itens)*(new.desconto/100)))-
					--desconto acerto--
		(((new.valor * new.quantidade_itens)-(new.valor * new.quantidade_itens)*(new.desconto/100)) - 
		trunc((new.valor * new.quantidade_itens)-(new.valor * new.quantidade_itens)*(new.desconto/100)))-
									--valor de compra - quantidade de itens da itens_venda--
									(valordecompra * new.quantidade_itens)
			 where idproduto=new.idproduto;
		RETURN old;
	END IF;
RETURN NULL;
END;
$insert_update_delete_itensvenda_produto$ language plpgsql;


CREATE TRIGGER insert_update_delete_itensvenda_produto
AFTER INSERT ON itens_vendas
FOR EACH ROW
EXECUTE PROCEDURE insert_update_delete_itensvenda_produto();
--------------------------------------------------------------------------------------------------------------------------
/*o nome dessa trigger esta insert_delete_itensentrada porque são trigger faz as operações insert or update or delete depende da condição operação realizada pelo usuario*/
/*Trigger de entrada de produtos no estoque*/

CREATE OR REPLACE FUNCTION insert_update_delete_itensentrada_entrada()
RETURNS TRIGGER AS $insert_update_delete_itensentrada_entrada$
DECLARE
  
BEGIN
-- Aqui temos um bloco IF que confirmará o tipo de operação.
	IF (TG_OP = 'INSERT') THEN
		if((new.quantidade>0) and (new.icms>0) and (new.ipi>0) and (new.frete>0) and (new.precocompra>0)) then
			UPDATE entrada SET valortotalnota =(new.precocompra * (new.quantidade+new.ipi+new.frete+new.icms)),
			datacompra=now()
			where identrada = new.identrada;
		end if;
												
		if((new.quantidade<0) and (new.icms<0) and (new.ipi<0) and (new.frete<0) and (new.precocompra<0)) then
		 RAISE EXCEPTION '% não pode ter valores negativo',new.quantidade;
		 RAISE EXCEPTION '% não pode ter valores negativo',new.icms;
		 RAISE EXCEPTION '% não pode ter valores negativo',new.ipi;
		 RAISE EXCEPTION '% não pode ter valores negativo',new.frete;
		end if;
		
		if((new.quantidade IS NULL) and (new.icms IS NULL) and (new.ipi IS NULL) and (new.frete IS NULL)
		   and (new.precocompra IS NULL)) then
		 RAISE EXCEPTION '% não pode ter valor nulo',new.quantidade;
		 RAISE EXCEPTION '% não pode ter valor nulo',new.icms;
		 RAISE EXCEPTION '% não pode ter valor nulo',new.ipi;
		 RAISE EXCEPTION '% não pode ter valor nulo',new.frete;
		 end if;

		RETURN NEW;
	-- Aqui temos um bloco IF que confirmará o tipo de operação UPDATE.
	ELSIF (TG_OP = 'UPDATE') THEN
		if((new.quantidade>0) and (new.icms>0) and (new.ipi>0) and (new.frete>0) and (new.precocompra>0)) then
			UPDATE entrada SET valortotalnota =new.precocompra * (new.quantidade+new.ipi+new.frete+new.icms),
			datacompra=now()
			where identrada = new.identrada;
		end if;
												
		if((new.quantidade<0) and (new.icms<0) and (new.ipi<0) and (new.frete<0) and (new.precocompra<0)) then
		 RAISE EXCEPTION '% não pode ter valores negativo',new.quantidade;
		 RAISE EXCEPTION '% não pode ter valores negativo',new.icms;
		 RAISE EXCEPTION '% não pode ter valores negativo',new.ipi;
		 RAISE EXCEPTION '% não pode ter valores negativo',new.frete;
		end if;
		
		if((new.quantidade IS NULL) and (new.icms IS NULL) and (new.ipi IS NULL) and (new.frete IS NULL)
		   and (new.precocompra IS NULL)) then
		 	RAISE EXCEPTION '% não pode ter valor nulo',new.quantidade;
		 	RAISE EXCEPTION '% não pode ter valor nulo',new.icms;
		 	RAISE EXCEPTION '% não pode ter valor nulo',new.ipi;
		    RAISE EXCEPTION '% não pode ter valor nulo',new.frete;
		end if;
		RETURN old;
	-- Aqui temos um bloco IF que confirmará o tipo de operação DELETE
	ELSIF (TG_OP = 'DELETE') THEN
		UPDATE entrada SET valortotalnota =valortotalnota-(new.precocompra * (new.quantidade+new.ipi+new.frete+new.icms))-
											(new.precocompra * (new.quantidade+new.ipi+new.frete+new.icms))
		where identrada = new.identrada;
		RETURN OLD;
	END IF;
RETURN NULL;  
END;
$insert_update_delete_itensentrada_entrada$ language plpgsql;

CREATE TRIGGER insert_update_delete_itensentrada_entrada
AFTER INSERT ON itensentrada
FOR EACH ROW 
EXECUTE PROCEDURE insert_update_delete_itensentrada_entrada();

--------------------------------------------------------------------------------------------------------------------------
/*Trigger de cálculo do desconto total em valor total, ao finalizar a venda */

CREATE FUNCTION insert_update_delete_itens_vendas_produto()
RETURNS TRIGGER AS $insert_update_delete_itens_vendas_produto$
DECLARE
BEGIN
		IF NEW.quantidade IS NULL THEN
            RAISE EXCEPTION 'quantidade não pode ser nula';
        END IF;
        IF NEW.valorvenda IS NULL THEN
            RAISE EXCEPTION '% não pode ter um valor de venda nulo', NEW.valorvenda;
        END IF;
		
		IF NEW.valorvenda < 0 THEN
            RAISE EXCEPTION '% não pode ter um valorvenda negativo', NEW.valorvenda;
        END IF;

        -- Quem paga para trabalhar?
        IF NEW.quantidade < 0 THEN
            RAISE EXCEPTION '% não pode ter um quantidade de itens negativo', NEW.quantidade;
        END IF;
		
		IF (new.quantidade > (select quantidade from produto))  THEN
            RAISE EXCEPTION '% estouque indisponivel', NEW.quantidade;
        END IF;
-- Aqui temos um bloco IF que confirmará o tipo de operação.
	IF (TG_OP = 'INSERT') THEN
		UPDATE produto SET quantidade =quantidade - new.quantidade,
					--valortotal de venda--   --menor-- --o valor da porcentagem--
			lucro=((new.valorvenda * new.quantidade)-((new.valorvenda * new.quantidade)*(new.desconto/100)))-
					--desconto acerto--
		(((new.valorvenda * new.quantidade)-(new.valorvenda * new.quantidade)*(new.desconto/100)) - 
		trunc((new.valorvenda * new.quantidade)-(new.valorvenda * new.quantidade)*(new.desconto/100)))-
									--valor de compra - quantidade de itens da itens_venda--
									(valordecompra * new.quantidade)
			where idproduto = new.idproduto;
	-- Aqui temos um bloco IF que confirmará o tipo de operação UPDATE.
	ELSIF (TG_OP = 'UPDATE') THEN
			UPDATE produto SET quantidade =quantidade - new.quantidade,
					--valortotal de venda--   --menor-- --o valor da porcentagem--
			lucro=lucro-(((new.valorvenda * new.quantidade)-((new.valorvenda * new.quantidade)*(new.desconto/100)))-
					--desconto acerto--
		(((new.valorvenda * new.quantidade)-(new.valorvenda * new.quantidade)*(new.desconto/100)) - 
		trunc((new.valorvenda * new.quantidade)-(new.valorvenda * new.quantidade)*(new.desconto/100)))-
									--valor de compra - quantidade de itens da itens_venda--
									(valordecompra * new.quantidade))
			where idproduto = new.idproduto;
		RETURN old;
	-- Aqui temos um bloco IF que confirmará o tipo de operação DELETE
	ELSIF (TG_OP = 'DELETE') THEN
			UPDATE produto set quantidade=quantidade + old.quantidade,
				lucro=lucro-lucro
			 where idproduto=old.idproduto;
		RETURN old;
	END IF;
RETURN NULL;
END;
$insert_update_delete_itens_vendas_produto$ LANGUAGE plpgsql ;

CREATE TRIGGER insert_update_delete_itens_vendas_produto
AFTER INSERT ON itens_vendas
FOR EACH ROW 
EXECUTE PROCEDURE insert_update_delete_itens_vendas_produto();

---------------------------------------------------------------------------------------------------------------------------
/*Trigger que gera a parcela do cliente*/ 

create or replace function gerarparcelas()
RETURNS TRIGGER AS $gerarparcelas$
	DECLARE parcela int4 :=1;
	DECLARE data_parcela int4 :=30;
	BEGIN 
		WHILE parcela <= NEW.numerodeparcelas  loop
			UPDATE parcelas SET valorparcela=(new.valortotalparcela/new.numerodeparcelas),
			status='NP',vencimento=current_date+30
			where idparcelas = new.idparcelas;
			data_parcela := data_parcela + 30;
			parcela := parcela + 1;
		END LOOP;
RETURN NULL;
END;
$gerarparcelas$ LANGUAGE PLPGSQL;

CREATE TRIGGER gerarparcelas
AFTER INSERT ON parcelas
FOR EACH ROW 
EXECUTE PROCEDURE gerarparcelas();
----------------------------------------------------------------------------------------------------------------------------------------------------------------------

/*como estou inserindo em venda sem o valores descontototal, descontoacerto, valortotal esse valores vão vir nulo ai 
criei um trigger para igual a zero esse valores para a proximo trigger fazer o calculo de itens_vendas para venda porque sem não iria fazer os calculos*/

create or replace function set_zero_venda()
RETURNS TRIGGER AS $$
	BEGIN 
			update venda set descontototal=0, descontoacerto=0, valortotal=0 
			where idvenda=new.idvenda;
RETURN NULL;
END $$
LANGUAGE PLPGSQL;

CREATE TRIGGER set_zero_venda
AFTER INSERT ON venda
FOR EACH ROW 
EXECUTE PROCEDURE set_zero_venda();
---------------------------------------------------------------------------------------------------------------------------------------------------------------------
/* Trigger para quando o usuario realizar o pagamento*/

create or replace function Pagar_Parcelas()
RETURNS TRIGGER AS $$
	BEGIN 
			update parcelas set valortotalparcela = 
			valortotalparcela-(new.valor_pagamento/new.numerosdeparcelas),
			numerodeparcelas=numerodeparcelas-new.numerosdeparcelas
			where idpagamento = new.pagamento;
			if(valortotalparcela==0) then
			update parcelas set status='PG' where idpagamento = new.idpagamento;
			end if;
			
RETURN NULL;
END $$
LANGUAGE PLPGSQL;

CREATE TRIGGER Pagar_Parcelas
AFTER INSERT ON pagamento
FOR EACH ROW 
EXECUTE PROCEDURE Pagar_Parcelas();
----------------------------------------------------------------------------------------------------------------------------------------------------------------------
/*Aqui quando haver delete em itens_vendas a trigger colocar na tabela devolução*/

create or replace function delete_itens_vendas_insert_devolucao()
RETURNS TRIGGER AS $$
	BEGIN 
		insert into devolucao(quantidade_devolvida,datadevolucao,iditensvendas)
			values (new.quantidade_itens,current_date,new.iditensvendas);		
		RETURN NULL;
	END $$
LANGUAGE PLPGSQL;

CREATE TRIGGER delete_itens_vendas_insert_devolucao
AFTER delete ON itens_vendas
FOR EACH ROW 
EXECUTE PROCEDURE delete_itens_vendas_insert_devolucao();
--------------------------------------------------------------------------------------------------------------------------------------------------------------------

create or replace function set_zero_venda()
RETURNS TRIGGER AS $$
BEGIN
update venda set descontototal=0, descontoacerto=0, valortotal=0
where idvenda=new.idvenda;
RETURN NULL;
END $$
LANGUAGE PLPGSQL;

CREATE TRIGGER set_zero_venda
AFTER INSERT ON venda
FOR EACH ROW
EXECUTE PROCEDURE set_zero_venda();
---------------------------------------------------------------------------------------------------

CREATE OR REPLACE FUNCTION insert_update_delete_itens_vendas_venda()
RETURNS trigger AS $insert_update_delete_itens_vendas_venda$
DECLARE
BEGIN
IF (TG_OP = 'INSERT') THEN

UPDATE venda SET valortotal=valortotal+((new.valor * new.quantidade_itens)-
(new.valor * new.quantidade_itens)*(new.desconto/100)),
descontototal=descontototal+(new.valor * new.quantidade_itens)*(new.desconto/100),
datavenda=now(),
descontoacerto =descontoacerto+((new.valor * new.quantidade_itens)-
(new.valor * new.quantidade_itens)*(new.desconto/100)) -
trunc((new.valor * new.quantidade_itens)-
(new.valor * new.quantidade_itens)*(new.desconto/100))
where idvenda = new.idvenda;
RETURN NEW;

-- Aqui temos um bloco IF que confirmará o tipo de operação UPDATE.
ELSIF (TG_OP = 'UPDATE') THEN
UPDATE venda SET valortotal=valortotal+((new.valor * new.quantidade_itens)+
(new.valor * new.quantidade_itens)*(new.desconto/100)),
descontototal=descontototal+(new.valor * new.quantidade_itens)*(new.desconto/100),
datavenda=now(),
descontoacerto =descontoacerto+((new.valor * new.quantidade_itens)+
(new.valor * new.quantidade_itens)*(new.desconto/100))/100
where idvenda = new.idvenda;
RETURN new;

-- Aqui temos um bloco IF que confirmará o tipo de operação DELETE
ELSIF (TG_OP = 'DELETE') THEN
UPDATE venda SET valortotal=valortotal-((new.valor * new.quantidade_itens)+
(new.valor * new.quantidade_itens)*(new.desconto/100)),
descontototal=descontototal+(new.valor * new.quantidade_itens)*(new.desconto/100),
datavenda=now(),
descontoacerto =descontoacerto+((new.valor * new.quantidade_itens)+
(new.valor * new.quantidade_itens)*(new.desconto/100))/100
where idvenda = new.idvenda;
RETURN new;
END IF;
RETURN NULL;
END;
$insert_update_delete_itens_vendas_venda$ language plpgsql;


CREATE TRIGGER insert_update_delete_itens_vendas_venda
AFTER INSERT ON itens_vendas
FOR EACH ROW
EXECUTE PROCEDURE insert_update_delete_itens_vendas_venda();


