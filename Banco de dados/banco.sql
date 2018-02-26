-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.29-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para vidracaria
CREATE DATABASE IF NOT EXISTS `vidracaria` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `vidracaria`;

-- Copiando estrutura para tabela vidracaria.acessorios
CREATE TABLE IF NOT EXISTS `acessorios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) NOT NULL,
  `valorCompra` float NOT NULL,
  `valorVenda` float NOT NULL,
  `tamanho` int(11) DEFAULT NULL,
  `espessura` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Acessorio_Tamanho1_idx` (`tamanho`),
  KEY `fk_Acessorio_Espessura_Vidro1_idx` (`espessura`),
  CONSTRAINT `fk_Acessorio_Espessura_Vidro1` FOREIGN KEY (`espessura`) REFERENCES `espessuras` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_Acessorio_Tamanho1` FOREIGN KEY (`tamanho`) REFERENCES `tamanhos` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela vidracaria.acessorios_has_produtos
CREATE TABLE IF NOT EXISTS `acessorios_has_produtos` (
  `acessorios_id` int(11) NOT NULL,
  `produtos_id` int(11) NOT NULL,
  PRIMARY KEY (`acessorios_id`,`produtos_id`),
  KEY `fk_Acessorio_has_Produto_Produto1_idx` (`produtos_id`),
  KEY `fk_Acessorio_has_Produto_Acessorio1_idx` (`acessorios_id`),
  CONSTRAINT `fk_Acessorio_has_Produto_Acessorio1` FOREIGN KEY (`acessorios_id`) REFERENCES `acessorios` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_Acessorio_has_Produto_Produto1` FOREIGN KEY (`produtos_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela vidracaria.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telefone` varchar(11) DEFAULT NULL,
  `endereco_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Cliente_Endereco1_idx` (`endereco_id`),
  CONSTRAINT `fk_Cliente_Endereco1` FOREIGN KEY (`endereco_id`) REFERENCES `enderecos` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela vidracaria.enderecos
CREATE TABLE IF NOT EXISTS `enderecos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logradouro` varchar(45) NOT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `numero` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela vidracaria.espessuras
CREATE TABLE IF NOT EXISTS `espessuras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `espesura` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela vidracaria.ferragems
CREATE TABLE IF NOT EXISTS `ferragems` (
  `id` int(11) NOT NULL,
  `utilizacao` varchar(45) DEFAULT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `cor` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela vidracaria.ferragems_has_produtos
CREATE TABLE IF NOT EXISTS `ferragems_has_produtos` (
  `ferragems_id` int(11) NOT NULL,
  `produtos_id` int(11) NOT NULL,
  PRIMARY KEY (`ferragems_id`,`produtos_id`),
  KEY `fk_Ferragem_has_Produto_Produto1_idx` (`produtos_id`),
  KEY `fk_Ferragem_has_Produto_Ferragem1_idx` (`ferragems_id`),
  CONSTRAINT `fk_Ferragem_has_Produto_Ferragem1` FOREIGN KEY (`ferragems_id`) REFERENCES `ferragems` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_Ferragem_has_Produto_Produto1` FOREIGN KEY (`produtos_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela vidracaria.kit_box_blindexs
CREATE TABLE IF NOT EXISTS `kit_box_blindexs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `metragem` int(11) NOT NULL,
  `cor` int(11) NOT NULL DEFAULT '0',
  `folhas` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela vidracaria.kit_box_blindexs_has_produtos
CREATE TABLE IF NOT EXISTS `kit_box_blindexs_has_produtos` (
  `kit_box_blindexs_id` int(11) NOT NULL,
  `produtos_id` int(11) NOT NULL,
  PRIMARY KEY (`kit_box_blindexs_id`,`produtos_id`),
  KEY `fk_Kit_Box_Blindex_has_Produto_Produto1_idx` (`produtos_id`),
  KEY `fk_Kit_Box_Blindex_has_Produto_Kit_Box_Blindex1_idx` (`kit_box_blindexs_id`),
  CONSTRAINT `fk_Kit_Box_Blindex_has_Produto_Kit_Box_Blindex1` FOREIGN KEY (`kit_box_blindexs_id`) REFERENCES `kit_box_blindexs` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_Kit_Box_Blindex_has_Produto_Produto1` FOREIGN KEY (`produtos_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela vidracaria.outros
CREATE TABLE IF NOT EXISTS `outros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `valorCompra` float NOT NULL,
  `valorVenda` float NOT NULL,
  `espessura` int(11) DEFAULT NULL,
  `tamanho` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Outros_Espessura1_idx` (`espessura`),
  KEY `fk_Outros_Tamanho1_idx` (`tamanho`),
  CONSTRAINT `fk_Outros_Espessura1` FOREIGN KEY (`espessura`) REFERENCES `espessuras` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_Outros_Tamanho1` FOREIGN KEY (`tamanho`) REFERENCES `tamanhos` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela vidracaria.outros_has_produtos
CREATE TABLE IF NOT EXISTS `outros_has_produtos` (
  `outros_idOutros` int(11) NOT NULL,
  `produtos_idProduto` int(11) NOT NULL,
  PRIMARY KEY (`outros_idOutros`,`produtos_idProduto`),
  KEY `fk_Outros_has_Produto_Produto1_idx` (`produtos_idProduto`),
  KEY `fk_Outros_has_Produto_Outros1_idx` (`outros_idOutros`),
  CONSTRAINT `fk_Outros_has_Produto_Outros1` FOREIGN KEY (`outros_idOutros`) REFERENCES `outros` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_Outros_has_Produto_Produto1` FOREIGN KEY (`produtos_idProduto`) REFERENCES `produtos` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela vidracaria.pedidos
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) DEFAULT NULL,
  `data_pedido` date NOT NULL,
  `hora_pedido` varchar(45) NOT NULL,
  `cliente_idCliente` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Pedido_Cliente_idx` (`cliente_idCliente`),
  CONSTRAINT `fk_Pedido_Cliente` FOREIGN KEY (`cliente_idCliente`) REFERENCES `clientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela vidracaria.pedidos_has_produtos
CREATE TABLE IF NOT EXISTS `pedidos_has_produtos` (
  `pedidos_idPedido` int(11) NOT NULL,
  `produtos_idProduto` int(11) NOT NULL,
  PRIMARY KEY (`pedidos_idPedido`,`produtos_idProduto`),
  KEY `fk_Pedidos_has_Produtos_Produtos1_idx` (`produtos_idProduto`),
  KEY `fk_Pedidos_has_Produtos_Pedidos1_idx` (`pedidos_idPedido`),
  CONSTRAINT `fk_Pedidos_has_Produtos_Pedidos1` FOREIGN KEY (`pedidos_idPedido`) REFERENCES `pedidos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pedidos_has_Produtos_Produtos1` FOREIGN KEY (`produtos_idProduto`) REFERENCES `produtos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela vidracaria.pedido_has_produto
CREATE TABLE IF NOT EXISTS `pedido_has_produto` (
  `Pedido_idPedido` int(11) NOT NULL,
  `Produto_idProduto` int(11) NOT NULL,
  `id_Pedido_Produto` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_Pedido_Produto`,`Pedido_idPedido`,`Produto_idProduto`),
  KEY `fk_Pedido_has_Produto_Produto1_idx` (`Produto_idProduto`),
  KEY `fk_Pedido_has_Produto_Pedido1_idx` (`Pedido_idPedido`),
  CONSTRAINT `fk_Pedido_has_Produto_Pedido1` FOREIGN KEY (`Pedido_idPedido`) REFERENCES `pedidos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pedido_has_Produto_Produto1` FOREIGN KEY (`Produto_idProduto`) REFERENCES `produtos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela vidracaria.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela vidracaria.produtos_has_vidros
CREATE TABLE IF NOT EXISTS `produtos_has_vidros` (
  `produtos_id` int(11) NOT NULL,
  `vidros_id` int(11) NOT NULL,
  PRIMARY KEY (`produtos_id`,`vidros_id`),
  KEY `fk_Produto_has_Vidro_Vidro1_idx` (`vidros_id`),
  KEY `fk_Produto_has_Vidro_Produto1_idx` (`produtos_id`),
  CONSTRAINT `fk_Produto_has_Vidro_Produto1` FOREIGN KEY (`produtos_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_Produto_has_Vidro_Vidro1` FOREIGN KEY (`vidros_id`) REFERENCES `vidros` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela vidracaria.tamanhos
CREATE TABLE IF NOT EXISTS `tamanhos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tamanho` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela vidracaria.vidros
CREATE TABLE IF NOT EXISTS `vidros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cor` varchar(45) NOT NULL,
  `espessura_idEspessura` int(11) NOT NULL,
  `valorCompra` float NOT NULL,
  `valorVenda` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Vidro_Espessura1_idx` (`espessura_idEspessura`),
  CONSTRAINT `fk_Vidro_Espessura1` FOREIGN KEY (`espessura_idEspessura`) REFERENCES `espessuras` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;