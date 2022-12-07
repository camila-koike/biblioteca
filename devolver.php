<?php
	session_start();
	if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
	{
		unset($_SESSION['login']);
		unset($_SESSION['senha']);
		header('location:index.html');
	}

  require("conecta.php");

  $id_emprestimo =  $_GET['id'];
	   
  $queryAtualizacao = "UPDATE emprestimos 
  SET ativo = 0 
  WHERE id_emprestimo = '$id_emprestimo'";
 
   $conexao->query($queryAtualizacao) or die("Algo deu errado ao editar o registro. Tente novamente.");
 
   if($conexao->affected_rows > 0)
   {
	    echo '<script language="javascript">';
		echo 'alert("Livro devolvido com sucesso.");location.href="admin.php";';
		echo '</script>';
   }
   else
      {
	    echo '<script language="javascript">';
		echo 'alert("Nenhum dado foi alterado");location.href="admin.php"';
		echo '</script>';
   }
   

 ?>