<?php
	session_start();
	if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
	{
		unset($_SESSION['login']);
		unset($_SESSION['senha']);
		header('location:index.html');
	}

  require("conecta.php");
  $matricula = $_POST['matricula'];
  $nome = $_POST['nome'];
  $serie = $_POST['serie'];
  $data_val = $_POST['data_val'];
  $id_aluno =  $_GET['id'];
   

   
  $queryAtualizacao = "UPDATE alunos 
  SET matricula = '$matricula', nome = '$nome' , serie = '$serie', data_validade = '$data_val' 
  WHERE id_aluno = '$id_aluno'";
 
   $conexao->query($queryAtualizacao) or die("Algo deu errado ao editar o registro. Tente novamente.");
 
   if($conexao->affected_rows > 0)
   {
	    echo '<script language="javascript">';
		echo 'alert("Aluno atualizado com sucesso.");location.href="admin.php";';
		echo '</script>';
   }
   else
      {
	    echo '<script language="javascript">';
		echo 'alert("Nenhum dado foi alterado");location.href="admin.php"';
		echo '</script>';
   }
   

 ?>