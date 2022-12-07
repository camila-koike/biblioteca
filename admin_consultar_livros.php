
<?php  
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	header('location:index.html');
}

$logado = $_SESSION['login'];
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
<legend>Consultar Livros</legend>
<form action="admin_res_consulta_livros.php" method="post" id="formLogin" onsubmit="return funcVerifyLogin()">
	<table>
		<tr>
		<th>
		<label for="titulo">Título:</label>
		</th>
		<td>
		<input type="text" id="titulo" name="titulo"/>
		</td>
		<th>
		<label for="autores">Autores:</label>
		</th>
		<td>
		<input type="text" id="autores" name="autores"/>
		</td>
		<th>
		<label for="ano">Ano:</label>
		</th>
		<td>
		<input type="number" id="ano" name="ano"/>
		</td>
		</tr>
	
		<tr class="avancado" >
		<th>
		<label for="num_livro">Número:</label>
		</th>
		<td >
		<input type="number"  id="num_livro" name="num_livro"/>
		</td>
		<th>
		<label for="pag_reg">Página Reg:</label>
		</th>
		<td >
		<input type="number"  id="pag_reg" name="pag_reg"/>
		</td>
		<th>
		<label for="classificacao">Classificacao:</label>
		</th>
		<td >
		<input type="text"  id="classificacao" name="classificacao"/>
		</td>
		</tr>
		
		<tr class="avancado" >
		<th>
		<label for="num_ed">Edição:</label>
		</th>
		<td >
		<input type="number"  id="num_ed" name="num_ed"/>
		</td>
		<th>
		<label for="volume">Volume:</label>
		</th>
		<td >
		<input type="number"  id="volume" name="volume"/>
		</td>
		<th>
		<label for="qte_exe">Qte Exemplar:</label>
		</th>
		<td >
		<input type="number"  id="qte_exe" name="qte_exe"/>
		</td>
		</tr>
		
	</table>

	<a href="javascript:reaparece()" id="seta-baixo">Mais Opções</a>
	 <a href="javascript:esconde()" id="seta-cima">Menos Opções</a>
	 <br>
	<input type="submit" value="Pesquisar"/>
	<input type="reset" value="Limpar">
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