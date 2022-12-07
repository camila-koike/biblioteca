<?php  
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	header('location:index.html');
}

require("conecta.php");
$id_livro =  $_GET['id'];

$querySelecao = "SELECT * FROM livros
			WHERE id_livro = '$id_livro'";
			
$resultado = $conexao->query($querySelecao);
		
$aquivos = $resultado->fetch_array(MYSQLI_BOTH);

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



<fieldset>
<legend>Editar Livro</legend>
<form action="editar_livro.php?id=<?php echo $id_livro?>" method="post">
	<table>
		<tr>
		<th>
		<label for="titulo">Titulo*:</label>
		</th>
		<td>
		<input type="text" id="titulo" name="titulo" required="required" value="<?php echo $aquivos['titulo']; ?>"/>
		</td>
		<th>
		<label for="autores">Autores*:</label>
		</th>
		<td>
		<input type="text" id="autores" name="autores" required="required" value="<?php echo $aquivos['autores']; ?>"/>
		</td>
		<th>
		<label for="ano">Ano:</label>
		</th>
		<td>
		<input type="text" id="ano" name="ano" value="<?php echo $aquivos['ano']; ?>"/>
		</td>
		</tr>
	
		<tr >
		<th>
		<label for="num_livro">Número*:</label>
		</th>
		<td >
		<input type="number"  id="num_livro" name="num_livro" required="required" value="<?php echo $aquivos['numero']; ?>"/>
		</td>
		<th>
		<label for="pag_reg">Página Reg*:</label>
		</th>
		<td >
		<input type="number"  id="pag_reg" name="pag_reg" required="required" value="<?php echo $aquivos['pag_reg']; ?>"/>
		</td>
		<th>
		<label for="classificacao">Classificação*:</label>
		</th>
		<td >
		<input type="text"  id="classificacao" name="classificacao" required="required" value="<?php echo $aquivos['classificacao']; ?>"/>
		</td>
		</tr>
		
		<tr  >
		<th>
		<label for="num_ed">Edição:</label>
		</th>
		<td >
		<input type="number"  id="num_ed" name="num_ed" value="<?php echo $aquivos['edicao']; ?>"/>
		</td>
		<th>
		<label for="volume">Volume:</label>
		</th>
		<td >
		<input type="number"  id="volume" name="volume" value="<?php echo $aquivos['volume']; ?>"/>
		</td>
		<th>
		<label for="qte_exe">Qte Exemplar*:</label>
		</th>
		<td >
		<input type="number"  id="qte_exe" name="qte_exe" required="required" value="<?php echo $aquivos['exemplares']; ?>"/>
		</td>
		</tr>
		
	</table>

	<p>Os campos com * são obrigatórios</p>
	<input type="submit" value="Salvar"/> 

	<a href="admin.php"> <input type="button" name="cancelar" value="Cancelar"></a>
</form>
</fieldset>



</div>

<!-- rodapé-->
<footer>
<hr />
&copy; Copyright 2016 Yumi. All Rights Reserved.
</footer>

</body>
</html>