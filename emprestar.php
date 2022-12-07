<?php
	session_start();
	if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
	{
		unset($_SESSION['login']);
		unset($_SESSION['senha']);
		header('location:index.html');
	}

  require("conecta.php");

	$id_livro = $_GET['id'];
	$matricula = $_POST['matricula'];
	$data_emp = date ("Y-m-d");
	$data_dev = date('Y-m-d', strtotime($data_emp. ' + 7 days'));

   $querySelecao = "SELECT id_aluno FROM alunos
			WHERE matricula = $matricula";
	$resultado = $conexao->query($querySelecao);
	$arquivos = $resultado->fetch_array(MYSQLI_BOTH);
	$id_aluno = $arquivos['id_aluno'];
	
	
   
  $queryInsercao = "INSERT INTO emprestimos (id_aluno_FK, id_livro_FK, data_emprestimo, data_devolucao, ativo)
  VALUES ($id_aluno, $id_livro, '$data_emp', '$data_dev', 1)";
   
   
   $conexao->query($queryInsercao) or die("Algo deu errado ao inserir o registro. Tente novamente.");
 
   if($conexao->affected_rows > 0)
   {
	    echo '<script language="javascript">';
		echo 'alert("Empréstimo cadastrado com sucesso.\n\n Data de DEVOLUÇÃO = '.date ("d-m-Y", strtotime($data_dev)).'");location.href="admin.php";';
		echo '</script>';
   }
   else
      {
	    echo '<script language="javascript">';
		echo 'alert("Não foi possível cadastrar o Empréstimo. Consulte o suporte técnico");location.href="admin.php"';
		echo '</script>';
   }
   

 ?>