<?php  
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	header('location:index.html');
}

require("conecta.php");
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



<h2>Resultado da Consulta de Livros</h2>
	<?php
		$titulo = $_POST['titulo'];
		$autores = $_POST['autores'];
		$ano = $_POST['ano'];
		$num_livro = $_POST['num_livro'];
		$pag_reg = $_POST['pag_reg'];
		$classificacao = $_POST['classificacao'];
		$num_ed = $_POST['num_ed'];
		$volume = $_POST['volume'];
		$qte_exe = $_POST['qte_exe'];
		
		$querySelecao = "SELECT id_livro, titulo, autores, ano, disponivel FROM livros
			WHERE titulo LIKE '%$titulo%' AND autores LIKE '%$autores%' AND classificacao LIKE '%$classificacao%'";

		if($ano != '')
			$querySelecao = $querySelecao." AND ano = '$ano'";
		if($num_livro != '')
			$querySelecao = $querySelecao." AND numero = '$num_livro'";
		if($pag_reg != '')
			$querySelecao = $querySelecao." AND pag_reg = '$pag_reg'";
		if($num_ed != '')
			$querySelecao = $querySelecao." AND edicao = '$num_ed'";
		if($volume != '')
			$querySelecao = $querySelecao." AND volume = '$volume'";
		if($qte_exe != '')
			$querySelecao = $querySelecao." AND exemplares = '$qte_exe'";

		$resultado = $conexao->query($querySelecao);
		

		if(mysqli_num_rows($resultado) == 0)
			echo "A pesquisa não retornou nenhum resultado!\n\n\n\n";
		else{ ?>
	<table >
		<tr>
		<th>
		Título:
		</th>
		<th>
		Autores:
		</th>
		<th>
		Ano:
		</th>
		<th>
		Disponível:
		</th>
		<th>
		Mais Opções
		</th>
		</tr>
	
		<?php while ($aquivos =$resultado->fetch_array(MYSQLI_BOTH)) { ?>
		<tr>
		<td>
		<?php echo $aquivos['titulo']; ?>
		</td>
		<td>
		<?php echo $aquivos['autores']; ?>
		</td>
		<td>
		<?php echo $aquivos['ano']; ?>
		</td>
		<td>
		<?php echo $aquivos['disponivel']; ?>
		</td>
		<td>
		<a href="detalhes_livro.php?id=<?php echo $aquivos['id_livro']; ?>">+ detalhes</a><br>
		<a href="admin_cadastrar_emprestimo.php?id=<?php echo $aquivos['id_livro']; ?>">Emprestar</a><br>
		<a href="admin_editar_livro.php?id=<?php echo $aquivos['id_livro']; ?>">Editar</a><br>
		<a href="excluir_livro.php?id=<?php echo $aquivos['id_livro']; ?>">Excluir</a><br>
		</td>
		</tr>
		<?php } ?>
	</table>
	<?php } ?>
		
	

</div>

<!-- rodapé-->
<footer>
<hr />
&copy; Copyright 2016 Yumi. All Rights Reserved.
</footer>

</body>
</html>