<?php

require_once("../conexao.php");
@session_start();

$email=$_POST['email'];
$senha=$_POST['senha'];

$query = $pdo->prepare("SELECT * FROM usuarios where email = :email AND senha = :senha");
$query->bindValue(":email", $email);
$query->bindValue(":senha", $senha);
$query->execute();
////EXECUTANDO CONSULTA FEITA ACIMA 
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg= @count($res);

if($total_reg > 0){

    //CRIAR AS VARIAVEIS DE SESSÃO
    $_SESSION['nome_usuario'] = $res[0]['nome'];
    $_SESSION['nivel_usuario'] = $res[0]['nivel'];

    $nivel = $res[0]['nivel'];

    if($nivel == 'Administrador'){
        echo "<script language='javascript'>window.location='./perfil-adm'</script>";
    }else if($nivel == 'Cliente'){
        $_SESSION['ID_user'] = $res[0]['ID_user']; // Definir a variável de sessão com o ID do cliente
        $_SESSION['nome'] = $res[0]['nome']; // Definir a variável de sessão com o nome do cliente
     
        echo "<script language='javascript'>window.location='./perfil-cliente'</script>";
    }else{
        echo "<script language='javascript'>window.alert('Usuário Sem Permissão para Acesso')</script>";
    echo "<script language='javascript'>window.location='index.php'</script>";
    }
    
}else{
    echo "<script language='javascript'>window.alert('Dados Incorretos')</script>";
    echo "<script language='javascript'>window.location='login.php'</script>";
}

?>



if($total_reg > 0){
    //CRIAR VARIAVEIS DE SESSÃO 
$_SESSION['nome'] = $res[0]['nome'];
$_SESSION['nivel'] = $res[0]['nivel'];

    $nivel=$res[0]['nivel'];
    if($nivel == 'Administrador '){
        echo "<script language ='javascript'>window.location='../perfil-adm'</script>";

    }else if($nivel == 'Cliente '){
        $_SESSION['ID_user'] = $res[0]['ID_user']; // Definir a variável de sessão com o ID do cliente
        $_SESSION['nome'] = $res[0]['nome']; // Definir a variável de sessão com o nome do cliente
        
        echo "<script language='javascript'>window.location='painel-cliente'</script>";
		
        
    }
    } else{
    echo "<script language ='javascript'>window.alert('Dados incorretos')</script>";
    echo "<script language ='javascript'>window.location='../login.php'</script>";
    exit;
}


?> 

