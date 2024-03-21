<?php 
include ("conexao.php");
$Nome=$_POST['nome'];
$Sobrenome=$_POST['sobrenome'];
$Nasci=$_POST['datanasci'];
$Cpf=$_POST['cpf'];
$Tel=$_POST['telefone'];
$Email=$_POST['email'];
$Senha=$_POST['senha'];
$Endereco=$_POST['ender'];
$Cidade=$_POST['cidade'];
$Cep=$_POST['cep'];
$Instrut=$_POST['instrut'];
$hor=$_POST['horario'];

$sql = "INSERT INTO clientes (nome_cliente, sobrenome, 	data_nascimento, cpf_user, telefone, email, senha, endereço, cidade, Cep, instrutor, horario)
        VALUES ('$Nome', '$Sobrenome', '$Nasci', $Tel , $Cpf, '$Email', '$Senha', '$Endereco', '$Cidade', '$Cep','$Instrut','$hor')";
if (mysqli_query($conexao, $sql)) {
    echo "Cadastro inserido com sucesso!";
  } else {
    echo "Erro ao inserir o cadastro: " . mysqli_error($conexao);
  }
  
?>
<script>alert('Cadastro Concluido');</script>