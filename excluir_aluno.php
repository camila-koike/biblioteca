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
     
	$queryRemocao = "DELETE FROM emprestimos WHERE id_aluno_FK = '$id_aluno'";

   $conexao->query($queryRemocao) or die("Algo deu errado ao remover o registro. Tente novamente.");
 
	 
  $queryRemocao = "DELETE FROM alunos WHERE id_aluno = '$id_aluno'";

   $conexao->query($queryRemocao) or die("Algo deu errado ao remover o registro. Tente novamente.");
 
   if($conexao->affected_rows > 0)
   {
	    echo '<script language="javascript">';
		echo 'alert("Aluno Removido com sucesso.");location.href="admin.php";';
		echo '</script>';
   }
   else
      {
	    echo '<script language="javascript">';
		echo 'alert("Não foi possível remover o aluno. Consulte o suporte técnico");location.href="admin.php;"';
		echo '</script>';
   }
   

 ?>