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



<h2>Resultado da Consulta de Alunos</h2>
	<?php
		$matricula = $_POST['matricula'];
		$nome = $_POST['nome'];
		$serie = $_POST['serie'];
		$data_validade = $_POST['data_val'];
		
		
		$querySelecao = "SELECT id_aluno, matricula, nome, serie, data_validade FROM alunos
			WHERE nome LIKE '%$nome%'";

		if($matricula != '')
			$querySelecao = $querySelecao." AND matricula = '$matricula'";
		if($serie != '0')
			$querySelecao = $querySelecao." AND serie = '$serie'";
		if($data_validade != '')
			$querySelecao = $querySelecao." AND data_validade = '$data_validade'";
		

		$resultado = $conexao->query($querySelecao);
		
		
		if(mysqli_num_rows($resultado) == 0)
			echo "A pesquisa não retornou nenhum resultado!\n\n\n\n";
		else{ ?>
	
	<table>
		<tr>
		<th>
		Matricula:
		</th>
		<th>
		Nome:
		</th>
		<th>
		Série:
		</th>
		<th>
		Data Validade:
		</th>
		<th>
		Mais Opções
		</th>
		</tr>
		<?php while ($aquivos = $resultado->fetch_array(MYSQLI_BOTH)) { ?>
		<tr>
		<td>
		<?php echo $aquivos['matricula']; ?>
		</td>
		<td>
		<?php echo $aquivos['nome']; ?>
		</td>
		<td>
		<?php echo $aquivos['serie']; ?>
		</td>
		<td>
		<?php echo $aquivos['data_validade']; ?>
		</td>
		<td>
		<a href="admin_ver_emprestimos.php?id=<?php echo $aquivos['id_aluno']?>">Empréstimos</a><br>
		<a href="admin_editar_aluno.php?id=<?php echo $aquivos['id_aluno']?>">Editar</a><br>
		<a href="excluir_aluno.php?id=<?php echo $aquivos['id_aluno']?>">Excluir</a><br>
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