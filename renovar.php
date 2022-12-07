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
	$data_dev = date('Y-m-d', strtotime( date ("Y-m-d"). ' + 7 days'));

   
  $queryAtualizacao = "UPDATE emprestimos 
  SET data_devolucao = '$data_dev' 
  WHERE id_emprestimo = '$id_emprestimo'";
 
   $conexao->query($queryAtualizacao) or die("Algo deu errado ao editar o registro. Tente novamente.");
 
   if($conexao->affected_rows > 0)
   {
	    echo '<script language="javascript">';
		echo 'alert("Livro renovado com sucesso.\n\n Nova Data de DEVOLUÇÃO = '.date ("d-m-Y", strtotime($data_dev)).'");location.href="admin.php";';
		echo '</script>';
   }
   else
      {
	    echo '<script language="javascript">';
		echo 'alert("Nenhum dado foi alterado");location.href="admin.php"';
		echo '</script>';
   }
   

 ?>