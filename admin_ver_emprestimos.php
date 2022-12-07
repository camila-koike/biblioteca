<?php  
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	header('location:index.html');
}

 require("conecta.php");
  $id_aluno = $_GET['id'];
  


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



<h2>Empréstimos de Livros</h2>
	<?php
     $querySelecaoAluno = "SELECT * FROM alunos
			WHERE id_aluno = $id_aluno";
	$resultadoAluno = $conexao->query($querySelecaoAluno);
	$arquivosAluno = $resultadoAluno->fetch_array(MYSQLI_BOTH);
	
		
	?>
	<div id="aluno">
		<b>Aluno:</b><?php echo $arquivosAluno['nome']; ?><br>
		<b>Matricula:</b> <?php echo $arquivosAluno['matricula']; ?><br>
		<b>Série:</b> <?php echo $arquivosAluno['serie']; ?><br>
		<b>Data de Validade:</b> <?php echo date ("d-m-Y", strtotime($arquivosAluno['data_validade'])); ?><br>
	</div>
	<?php
		$querySelecaoEmprestimos = "SELECT * FROM emprestimos
			WHERE id_aluno_FK = $id_aluno AND ativo = 1";
	$resultadoEmprestimos = $conexao->query($querySelecaoEmprestimos);
	
	
	if(mysqli_num_rows($resultadoEmprestimos) == 0)
			echo "A pesquisa não retornou nenhum resultado!\n\n\n\n";
	else{ 
	while ($arquivosEmprestimos = $resultadoEmprestimos->fetch_array(MYSQLI_BOTH)) {?>
	<?php

		$id_livro_FK = $arquivosEmprestimos['id_livro_FK'];
		$querySelecaoLivro = "SELECT titulo, numero FROM livros
			WHERE id_livro = $id_livro_FK";
		$resultadoLivro = $conexao->query($querySelecaoLivro);
		$arquivosLivro = $resultadoLivro->fetch_array(MYSQLI_BOTH);
	?>
	
	<br>
	<div id="livro">
		<b>Livro:</b> <?php echo $arquivosLivro['titulo']; ?><br>
		<b>Número do livro:</b> <?php echo $arquivosLivro['numero']; ?><br>
		<b>Data Empréstimo:</b> <?php echo date ("d-m-Y", strtotime($arquivosEmprestimos['data_emprestimo'])); ?><br>
		<b>Data Empréstimo:</b> <?php echo date ("d-m-Y", strtotime($arquivosEmprestimos['data_devolucao'])); ?><br>
		<a href="renovar.php?id=<?php echo $arquivosEmprestimos['id_emprestimo']; ?>"><button type="button">Renovar</button></a>
		<a href="devolver.php?id=<?php echo $arquivosEmprestimos['id_emprestimo']; ?>"><button type="button">Devolver</button></a>
	</div>

	<?php } }?>

</div>

<!-- rodapé-->
<footer>
<hr />
&copy; Copyright 2016 Yumi. All Rights Reserved.
</footer>

</body>
</html>