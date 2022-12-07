<?php
 // $conexao = mysql_connect("localhost", "root", "");
  $conexao = mysqli_connect("localhost", "root", "yumi", "biblioteca");
  // $conexao = mysql_connect("localhost", "1252996", "123456");
 
 if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
 
 ?>