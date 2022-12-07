<?php  
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	header('location:index.html');
}

require("conecta.php");
$id_aluno =  $_GET['id'];

$querySelecao = "SELECT matricula, nome, serie, data_validade FROM alunos
			WHERE id_aluno = '$id_aluno'";
			
$resultado = $conexao->query($querySelecao);
		
$arquivos = $resultado->fetch_array(MYSQLI_BOTH);
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
<legend>Editar Aluno</legend>
<form action="editar_aluno.php?id=<?php echo $id_aluno?>" method="post" >
	<table>
		<tr>
		<th>
		<label for="matricula">Matrícula*:</label>
		</th>
		<td>
		<input type="number" id="matricula" name="matricula" required="required" value="<?php echo $arquivos['matricula']; ?>"/>
		</td>
		<th>
		<label for="nome">Nome*:</label>
		</th>
		<td>
		<input type="text" id="nome" name="nome" required="required" value="<?php echo $arquivos['nome']; ?>"/>
		</td>
		<th>
		<label for="serie">Série*:</label>
		</th>
		<td>
		<select id="serie" name="serie" required="required"> 
		<option value="">Selecione</option>
		<?php echo '<option value="'.$arquivos['serie'].'" selected>'.$arquivos['serie'].'</option>'; ?>
		<option value="1 Ano E.F">1 Ano E.F</option>
		<option value="2 Ano E.F">2 Ano E.F</option>
		<option value="3 Ano E.F">3 Ano E.F</option>
		<option value="4 Ano E.F">4 Ano E.F</option>
		<option value="5 Ano E.F">5 Ano E.F</option>
		<option value="6 Ano E.F">6 Ano E.F</option>
		<option value="7 Ano E.F">7 Ano E.F</option>
		<option value="8 Ano E.F">8 Ano E.F</option>
		<option value="9 Ano E.F">9 Ano E.F</option>
		<option value="1 Ano E.M">1 Ano E.M</option>
		<option value="2 Ano E.M">2 Ano E.M</option>
		<option value="3 Ano E.M">3 Ano E.M</option>
		</select>
		</td>
		</td>
		<th>
		<label for="data_val">Data Validade*:</label>
		</th>
		<td>
		<input type="date" id="data_val" name="data_val" required="required" value="<?php echo $arquivos['data_validade']; ?>"/>
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