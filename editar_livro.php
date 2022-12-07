<?php
	session_start();
	if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
	{
		unset($_SESSION['login']);
		unset($_SESSION['senha']);
		header('location:index.html');
	}

  require("conecta.php");
		$titulo = $_POST['titulo'];
		$autores = $_POST['autores'];
		$ano = $_POST['ano'];
		$num_livro = $_POST['num_livro'];
		$pag_reg = $_POST['pag_reg'];
		$classificacao = $_POST['classificacao'];
		$num_ed = $_POST['num_ed'];
		$volume = $_POST['volume'];
		$qte_exe = $_POST['qte_exe'];
		$id_livro =  $_GET['id'];
   

   $querySelecao = "SELECT exemplares, disponivel FROM livros
			WHERE id_livro = '$id_livro'";
			
$resultado = $conexao->query($querySelecao);

$arquivos = $resultado->fetch_array(MYSQLI_BOTH);

$novo_dip = $arquivos['disponivel'];

if($qte_exe > $arquivos['exemplares'])
{
	$novo_dip = $novo_dip + ($qte_exe - $arquivos['exemplares']);
}
else if($qte_exe < $arquivos['exemplares'])
{
	if(($arquivos['exemplares'] - $qte_exe) > $arquivos['disponivel'])
	{
		 echo '<script language="javascript">';
		echo 'alert("Não pode diminuir a quantidade de livros que estão emprestados.
		\n Primeiro devolva o livro para depois apagá-lo.");location.href="admin.php";';
		echo '</script>';
	}
	else{
		$novo_dip = $novo_dip - ($arquivos['exemplares'] - $qte_exe);
	}
}
   
  $queryInsercao = "UPDATE livros 
  SET titulo = '$titulo', autores = '$autores' , ano = $ano, numero = $num_livro,
  pag_reg = $pag_reg, classificacao = '$classificacao' , edicao = $num_ed, volume = $volume,
  exemplares = $qte_exe, disponivel = $novo_dip
  WHERE id_livro = $id_livro";
   echo $queryInsercao;
   $conexao->query($queryInsercao) or die("Algo deu errado ao editar o registro. Tente novamente.");
 
   if($conexao->affected_rows > 0)
   {
	    echo '<script language="javascript">';
		echo 'alert("Livro atualizado com sucesso.");location.href="admin.php";';
		echo '</script>';
   }
   else
      {
	    echo '<script language="javascript">';
		echo 'alert("Não foi alterado nada no cadastro do Livro.");location.href="admin.php"';
		echo '</script>';
   }
   

 ?>