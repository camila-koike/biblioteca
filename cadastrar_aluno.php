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
   

   
  $queryInsercao = "INSERT INTO alunos (matricula, nome, serie, data_validade) 
  VALUES ('$matricula', '$nome','$serie','$data_val')";
	
   $conexao->query($queryInsercao) or die("Algo deu errado ao inserir o registro. Tente novamente.");
 
   if($conexao->affected_rows > 0)
   {
	    echo '<script language="javascript">';
		echo 'alert("Aluno cadastrado com sucesso.");location.href="admin.php";';
		echo '</script>';
   }
   else
      {
	    echo '<script language="javascript">';
		echo 'alert("Não foi possível cadastrar o aluno. Consulte o suporte técnico");location.href="admin.php"';
		echo '</script>';
   }
   

 ?>