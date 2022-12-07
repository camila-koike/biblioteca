<?php
  require("conecta.php");
  session_start();
  if(!(isset ($_SESSION['login']) == true) and !(isset ($_SESSION['senha']) == true))
	{
		unset($_SESSION['login']);
		unset($_SESSION['senha']);
		unset($_SESSION['nome']);
		$login = $_POST['userNAME'];
		$senha = $_POST['userPWD'];
		
		$querySelecao = "SELECT nome FROM administrador
		WHERE username = '$login' AND senha = '$senha'";
		$resultado = $conexao->query($querySelecao);
		$aquivos = $resultado->fetch_array(MYSQLI_BOTH);
	
		if($aquivos == '')
		{
			echo '<script language="javascript">';
			echo 'alert("Usuário ou senha Incorretos!");location.href="index.html";';
			echo '</script>';

		}
		else{
			$_SESSION['login'] = $login;
			$_SESSION['senha'] = $senha;
			$_SESSION['nome'] = $aquivos['nome'];
		}
	}
	if((isset ($_SESSION['login']) == true) and (isset ($_SESSION['senha']) == true))
	{
  ?>
<html>
<head>
<title> Biblioteca Silvio O. Santos </title>
<meta name="author" content="camila koike" />
<meta charset="utf-8"/>
<!-- link estilo-->
<link rel="stylesheet" type="text/css" href="estilo.css" title="estilo" />
<script type="text/javascript" src="funcoes.js"></script>
</head>

<body>
<!-- cabeçalho-->
<header>
<h1> Biblioteca Silvio Oliveira Santos </h1>
</header>
<hr />

<!-- conteúdo principal -->
<div id="conteudo">
<h1> Área do Administrador </h1>
<h2> Bem Vindo, <?php echo $_SESSION['nome']; ?> </h2>

<h2> Menu </h2>
<nav>
<ul>
<a href="admin_consultar_livros.php"><li>Consultar Livro</li></a>
<a href="admin_consultar_alunos.php"><li>Consultar Aluno</li></a>
<a href="admin_cadastrar_livro.php"><li>Cadastrar Livro</li></a>
<a href="admin_cadastrar_aluno.php"><li>Cadastrar Aluno</li></a>
<a href="deslogar.php"><li>SAIR</li></a>
</ul>
</nav>
</div>

<!-- rodapé-->
<footer>
<hr />
&copy; Copyright 2016 Yumi. All Rights Reserved.
</footer>

</body>
</html>
	<?php } ?>