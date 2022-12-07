<?php  
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	header('location:index.html');
}

  require("conecta.php");
  $id_livro = $_GET['id'];
  
     $querySelecao = "SELECT titulo FROM livros
			WHERE id_livro = $id_livro";
	$resultado = $conexao->query($querySelecao);
	$arquivos = $resultado->fetch_array(MYSQLI_BOTH);
	$titulo = $arquivos['titulo'];
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



<h2>Cadastrar Empréstimo de Livro</h2>
	
	<div id="livro">
		<b>Livro:</b> <?php echo $titulo; ?><br>
	</div>
	<br>
	<div id="aluno">
		<form method="post" action="emprestar.php?id=<?php echo $id_livro; ?>">
		<b>Matricula*:</b><input type="number" name="matricula" id="matricula" required="required">
		
		<p>Os campos com * são obrigatórios</p>
		<input type="submit" value="Emprestar"/> 
		<a href="admin.php"> <input type="button" name="cancelar" value="Cancelar"></a>
		</form?
	</div>
	
	

</div>

<!-- rodapé-->
<footer>
<hr />
&copy; Copyright 2016 Yumi. All Rights Reserved.
</footer>

</body>
</html>