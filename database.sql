
--
-- Banco de dados: `project_manager`
--

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- --------------------------------------------------------

--
-- Estrutura para tabela `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `projeto_id` int(11) NOT NULL,
  `descricao` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `file` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_files_projetos1_idx` (`projeto_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `mensagens`
--

CREATE TABLE IF NOT EXISTS `mensagens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tarefa_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `mensagem` text COLLATE utf8_bin,
  `data` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_mensagens_usuarios1_idx` (`usuario_id`),
  KEY `fk_mensagens_tarefas1_idx` (`tarefa_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `avatar` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `telefone` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `facebook` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `twitter` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `github` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_perfil_usuarios1_idx` (`usuario_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `projetos`
--

CREATE TABLE IF NOT EXISTS `projetos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `titulo` varchar(200) CHARACTER SET latin1 NOT NULL,
  `descricao` text CHARACTER SET latin1 NOT NULL,
  `inincio` date NOT NULL,
  `fim` date NOT NULL,
  `status` varchar(15) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_projetos_usuarios_idx` (`usuario_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Fazendo dump de dados para tabela `projetos`
--

INSERT INTO `projetos` (`id`, `usuario_id`, `titulo`, `descricao`, `inincio`, `fim`, `status`) VALUES
(1, 1, 'Projeto de exemplo', 'Descrição do projeto de exemplo.', '2015-06-01', '2015-06-10', '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tarefas`
--

CREATE TABLE IF NOT EXISTS `tarefas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `projeto_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `descricao` text CHARACTER SET latin1 NOT NULL,
  `inicio` date NOT NULL,
  `fim` date DEFAULT NULL,
  `status` varchar(25) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tarefas_usuarios1_idx` (`usuario_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Fazendo dump de dados para tabela `tarefas`
--

INSERT INTO `tarefas` (`id`, `projeto_id`, `usuario_id`, `descricao`, `inicio`, `fim`, `status`) VALUES
(1, 1, 1, 'Descrição de uma tarefa de exemplo.', '2015-06-06', '2015-06-10', '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) CHARACTER SET latin1 NOT NULL,
  `funcao` varchar(40) CHARACTER SET latin1 NOT NULL,
  `email` varchar(120) CHARACTER SET latin1 NOT NULL,
  `senha` varchar(120) CHARACTER SET latin1 NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `funcao`, `email`, `senha`, `admin`) VALUES
(1, 'Administrador', 'Gerente', 'admin@admin', '21232f297a57a5a743894a0e4a801fc3', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;