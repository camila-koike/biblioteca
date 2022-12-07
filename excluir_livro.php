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
    
	$queryRemocao = "DELETE FROM emprestimos WHERE id_livro_FK = '$id_livro'";
  
   $conexao->query($queryRemocao) or die("Algo deu errado ao remover o registro. Tente novamente.");
 
	
  $queryRemocao = "DELETE FROM livros WHERE id_livro = '$id_livro'";
  
   $conexao->query($queryRemocao) or die("Algo deu errado ao remover o registro. Tente novamente.");
 
   if($conexao->affected_rows > 0)
   {
	    echo '<script language="javascript">';
		echo 'alert("Livro Removido com sucesso.");location.href="admin.php";';
		echo '</script>';
   }
   else
      {
	    echo '<script language="javascript">';
		echo 'alert("Não foi possível remover o Livro. Consulte o suporte técnico");location.href="admin.php;"';
		echo '</script>';
   }
   

 ?>