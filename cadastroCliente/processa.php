<?php

session_start();// Iniciar a sessao 

///Limpar o buffer de saida
ob_start();

//Incluindo conexão com banco de dados atraves do include
include_once("../conexao.php");
//Receber os dados do formulario 
$dados= filter_input_array(INPUT_POST, FILTER_DEFAULT);

var_dump($dados);
//Verificar se o usuario clicou no botão para enviar os dados, caso nao tenha apertado
//ira aparecer a menssagem Erro 
if(!empty($dados['caduser'])){
$query_usuario = "INSERT INTO usuarios
             (nome, sobrenome, data_nascimento, cpf_user, telefone, email, senha, endereco, cidade, Cep, nivel, horario) VALUES
             (:nome, :sobrenome, :datanasci, :cpf, :telefone, :email, :senha, :ender, :cidade, :cep, :nivel, :horario)";
 $cad_usuario = $pdo->prepare($query_usuario);
$cad_usuario ->bindParam(':nome', $dados['nome'],PDO::PARAM_STR);
$cad_usuario ->bindParam(':sobrenome', $dados['sobrenome'],PDO::PARAM_STR);
$cad_usuario ->bindParam(':datanasci', $dados['datanasci'],PDO::PARAM_STR);
$cad_usuario ->bindParam(':cpf', $dados['cpf'],PDO::PARAM_INT);
$cad_usuario ->bindParam(':telefone', $dados['telefone'],PDO::PARAM_INT);
$cad_usuario ->bindParam(':email', $dados['email'],PDO::PARAM_STR);
$cad_usuario ->bindParam(':senha', $dados['senha'],PDO::PARAM_STR);
$cad_usuario ->bindParam(':ender', $dados['ender'],PDO::PARAM_STR);
$cad_usuario ->bindParam(':cidade', $dados['cidade'],PDO::PARAM_STR);
$cad_usuario ->bindParam(':cep', $dados['cep'],PDO::PARAM_INT);
$cad_usuario ->bindParam(':nivel', $dados['nivel'],PDO::PARAM_STR);
$cad_usuario ->bindParam(':horario', $dados['horario'],PDO::PARAM_STR);
$cad_usuario->execute();

$ID_user = $pdo->LastInsertId();//recuperando o id do usuario para relacionar a outra tabela
///adicionando valores á tabela do banco de daddos
$query_ficha= "INSERT INTO ficha
            (nome,peso, tipo_exercicio, horario, segunda, terca, quarta, quinta, sexta, ID_user) VALUES
            (:nome, :peso, :tpexercicio, :horario, :segunda, :terca, :quarta, :quinta, :sexta, :ID_user)";
$cad_ficha = $pdo->prepare($query_ficha);
$cad_ficha ->bindParam(':nome', $dados['nome'],PDO::PARAM_STR);
$cad_ficha ->bindParam(':peso', $dados['peso'],PDO::PARAM_STR);

// Adicione a validação para a coluna 'tipo_exercicio'
if (!empty($dados['tpexercicio'])) {
    $cad_ficha->bindParam(':tpexercicio', $dados['tpexercicio'], PDO::PARAM_STR);
} else {
    // Tratar o caso em que 'tpexercicio' é nulo
    // Por exemplo, você pode definir um valor padrão para a coluna ou exibir uma mensagem de erro.
    $cad_ficha->bindValue(':tpexercicio', 'Valor padrão ou mensagem de erro', PDO::PARAM_STR);
}
$cad_ficha ->bindParam(':tpexercicio', $dados['tpexercicio'],PDO::PARAM_STR);
$cad_ficha ->bindParam(':horario', $dados['horario'],PDO::PARAM_STR);
$cad_ficha ->bindParam(':segunda', $dados['segunda'],PDO::PARAM_STR);
$cad_ficha ->bindParam(':terca', $dados['terca'],PDO::PARAM_STR);
$cad_ficha ->bindParam(':quarta', $dados['quarta'],PDO::PARAM_STR);
$cad_ficha ->bindParam(':quinta', $dados['quinta'],PDO::PARAM_STR);
$cad_ficha ->bindParam(':sexta', $dados['sexta'],PDO::PARAM_STR);
$cad_ficha ->bindParam(':ID_user', $ID_user);
$cad_ficha->execute();

///Variavel golbal para salvar a mensagem de sucesso 
$_SESSION['msg'] = "<p style = 'color :black;'>Cliente Cadastrado com sucesso !!</p>";

///Redirecionar o usuario 
header("Location:index.php");
}else{
    ///Variavel golbal para salvar a mensagem de erro 
$_SESSION['msg'] = "<p style = 'color :red;'>ERRO: Cliente NÃO Cadastrado!!</p>";

///Redirecionar o usuario para começo da pagina
header("Location:index.php");
}