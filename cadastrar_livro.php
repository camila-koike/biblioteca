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
   
if($ano == '')
	$ano = 0;
if($volume == '')
	$volume = 0;
if($num_ed == '')
	$num_ed = 0;
   
  $queryInsercao = "INSERT INTO livros (titulo, autores, ano, numero, pag_reg, classificacao, edicao, volume, exemplares, disponivel)
  VALUES ('$titulo','$autores',$ano,$num_livro,$pag_reg, '$classificacao',$num_ed,$volume, $qte_exe, $qte_exe)";
   
   
   $conexao->query($queryInsercao) or die("Algo deu errado ao inserir o registro. Tente novamente.");
 
   if($conexao->affected_rows > 0)
   {
	    echo '<script language="javascript">';
		echo 'alert("Livro cadastrado com sucesso.");location.href="admin.php";';
		echo '</script>';
   }
   else
      {
	    echo '<script language="javascript">';
		echo 'alert("Não foi possível cadastrar o livro. Consulte o suporte técnico");location.href="admin.php"';
		echo '</script>';
   }
   

 ?>