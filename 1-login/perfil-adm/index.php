<?php
require_once('../../conexao.php');
@session_start();




//echo 'Painel administrativo <p>';
//echo 'Nome do Usuario :' .$_SESSION['nome'] . ' e o nivel do usuario é ' . $_SESSION['nivel'];


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Bem vindo ao administrativo!</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Alterna navegação">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mr-auto mt- mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="#">
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="../1-login/login.php">Sair</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Buscar">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
      </form>
    </div>
  </nav>
  <div class="container">
    <button class="btn-dark mt-4" type="button" data-toggle="modal" data-target="#modalCad">Cadastrar novo Usuario</button>
  </div>
  <div class=" container">

    <?php
    ///trazendo todos os dados da tabela usuarios, então nao usa o WHERE
    $query = $pdo->query("SELECT * FROM usuarios");
    ////EXECUTANDO CONSULTA FEITA ACIMA 
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $total_reg = @count($res);

    if ($total_reg > 0) {

    ?>
      <table class="table table-striped mt-4 ">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Telefone</th>
            <th scope="col">Endereço</th>
            <th scope="col">Horario</th>
            
          </tr>
        </thead>
        <tbody>
          <?php

          for ($i = 0; $i < $total_reg; $i++) {
            foreach ($res[$i] as $key => $value) {
            }
            $id = $res[$i]['ID_user'];
            $nome = $res[$i]['nome'];
            $telefone = $res[$i]['telefone'];
            $endereco = $res[$i]['endereco'];
            $horario = $res[$i]['horario'];
          ?>
            <tr>
              <td><?php echo $id ?></td>
              <td><?php echo $nome ?></td>
              <td><?php echo $telefone ?></td>
              <td><?php echo $endereco ?></td>
              <td><?php echo $horario ?></td>
              <td>
               
                </a>
                
                
                </a>
              </td>
            </tr>
        <?php
          }
        } else {
          echo '<p> Não existem dados para serem exibidos</p>';
        }
        ?>


        </tbody>
      </table>
  </div>
</body>

</html>
<div class="modal fade " id="modalCad" tabindex="-1"  data-bs-backdrop="static" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <?php 
          if(@$_GET['funcao']== 'editar'){ 
            $titulo_modal = "Editar Registro";
          }else{
            $titulo_modal = "Inserir Registro";
          }
        
        ?>
        <h5 class="modal-title"> <?php echo $titulo_modal?> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <div class="form-group">
            <label for="inputName">Nome</label>
            <input type="text" id="inputName" class="form-control" placeholder="Fulano" name="nome">
          </div>
          <div class="form-group">
            <label for="inputSurname">Sobrenome</label>
            <input type="text" class="form-control" id="inputSurname" placeholder="da Silva Ciclano" name="sobrenome">
          </div>
          <div class="form-group">
            <label for="datanasci">Data de Nascimento</label>
            <input type="date" format="YYYY-MM-DD" class="form-control" id="datanasci" placeholder="selecione a data que você nasceu" name="datanasci">
          </div>
          <div class="form-group">
            <label for="inputCEP">CPF</label>
            <input type="text" class="form-control" id="inputCEP" name="cpf">
          </div>
          <div class="form-group">
            <label for="inputFone" class="control-label">Telefone</label>
            <input type="text" class="form-control" id="inputFone" placeholder="Telefone" name="telefone">
          </div>
          <div class="form-group">
            <label for="inputEmail4">Email</label>
            <input type="text" class="form-control" id="inputEmail4" placeholder="Email" name="email">
          </div>
          <div class="form-group">
            <label for="inputPassword4">Senha</label>
            <input type="password" class="form-control" id="inputPassword4" placeholder="Senha" name="senha">
          </div>
          <div class="form-group">
            <label for="inputAddress">Endereço</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="Rua dos Bobos, nº 0" name="ender">
          </div>
          <div class="form-group">
            <label for="inputCity">Cidade</label>
            <input type="text" class="form-control" id="inputCity" name="cidade">
          </div>
          <div class="form-group">
            <label for="inputCEP">CEP</label>
            <input type="text" class="form-control" id="inputCEP" name="cep">
          </div>
          <div class="form-group">
            <label for="inputnivel">Qual o Nivel de acesso do Usuario?</label>
            <input type="text" class="form-control" id="inputnivel" name="nivel">
          </div>
          <br>
          <div class="form-container">
            <div class="form-group">
              <label for="peso">Qual seu peso?</label>
              <input type="text" id="peso" class="form-control" name="peso">
            </div>
            <div class="form-group">
              <label for="tpexercicio">Qual o tipo de exercicio recomendo para o cliente?</label>
              <input type="text" class="form-control" id="inputSurname" placeholder="Hipertrofia, Emagrecimento..." name="tpexercicio">
            </div>
            <div class="form-group">
              <label for="horario">Qual horario o cliente vai treinar?</label>
              <input type="text" class="form-control" id="horario" placeholder="Manhã, tarde, noite" name="horario">
            </div>
            <div class="form-group">
              <label for="segunda">Exercicios de segunda</label>
              <input type="text" class="form-control" id="segunda" name="segunda">
            </div>
            <div class="form-group">
              <label for="terca" class="control-label">Exercicios de terça-feira?</label>
              <input type="text" class="form-control" id="terca" name="terca">
            </div>
            <div class="form-group">
              <label for="quarta">Exercicios de quarta-feira?</label>
              <input type="text" class="form-control" id="quarta" name="quarta">
            </div>
            <div class="form-group">
              <label for="quinta">Exercicios de quinta-feira?</label>
              <input type="text" class="form-control" id="quinta" name="quinta">
            </div>
            <div class="form-group">
              <label for="sexta">Exercicios de sexta-feira?</label>
              <input type="text" class="form-control" id="sexta" name="sexta">
            </div>


          </div>
          <div class="modal-footer">
            <button type="submit" name="btn-cadastrar" class="btn btn-primary">Salvar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php
  if (isset($_POST['btn-cadastrar'])) {
    // Dados do formulário
    $dados = array(
      'nome' => $_POST['nome'],
      'sobrenome' => $_POST['sobrenome'],
      'datanasci' => $_POST['datanasci'],
      'cpf' => $_POST['cpf'],
      'telefone' => $_POST['telefone'],
      'email' => $_POST['email'],
      'senha' => $_POST['senha'],
      'ender' => $_POST['ender'],
      'cidade' => $_POST['cidade'],
      'cep' => $_POST['cep'],
      'nivel' => $_POST['nivel'],
      'horario' => $_POST['horario'],
      'peso' => $_POST['peso'],
      'tpexercicio' => $_POST['tpexercicio'],
      'segunda' => $_POST['segunda'],
      'terca' => $_POST['terca'],
      'quarta' => $_POST['quarta'],
      'quinta' => $_POST['quinta'],
      'sexta' => $_POST['sexta']
    );

    // Cadastro do usuário
    $query_usuario = $pdo->prepare("INSERT INTO usuarios (nome, sobrenome, data_nascimento, cpf_user, telefone, email, senha, endereco, cidade, Cep, nivel, horario)
                                  VALUES (:nome, :sobrenome, :datanasci, :cpf, :telefone, :email, :senha, :ender, :cidade, :cep, :nivel, :horario)");
    $query_usuario->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
    $query_usuario->bindParam(':sobrenome', $dados['sobrenome'], PDO::PARAM_STR);
    $query_usuario->bindParam(':datanasci', $dados['datanasci'], PDO::PARAM_STR);
    $query_usuario->bindParam(':cpf', $dados['cpf'], PDO::PARAM_STR);
    $query_usuario->bindParam(':telefone', $dados['telefone'], PDO::PARAM_STR);
    $query_usuario->bindParam(':email', $dados['email'], PDO::PARAM_STR);
    $query_usuario->bindParam(':senha', $dados['senha'], PDO::PARAM_STR);
    $query_usuario->bindParam(':ender', $dados['ender'], PDO::PARAM_STR);
    $query_usuario->bindParam(':cidade', $dados['cidade'], PDO::PARAM_STR);
    $query_usuario->bindParam(':cep', $dados['cep'], PDO::PARAM_STR);
    $query_usuario->bindParam(':nivel', $dados['nivel'], PDO::PARAM_STR);
    $query_usuario->bindParam(':horario', $dados['horario'], PDO::PARAM_STR);
    $query_usuario->execute();

    // ID do usuário recém-cadastrado
    $ID_user = $pdo->lastInsertId();

    // Cadastro da ficha
    $query_ficha = $pdo->prepare("INSERT INTO ficha (nome, peso, tipo_exercicio, horario, segunda, terca, quarta, quinta, sexta, ID_user)
                                VALUES (:nome, :peso, :tpexercicio, :horario, :segunda, :terca, :quarta, :quinta, :sexta, :ID_user)");
    $query_ficha->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
    $query_ficha->bindParam(':peso', $dados['peso'], PDO::PARAM_STR);
    $query_ficha->bindParam(':tpexercicio', $dados['tpexercicio'], PDO::PARAM_STR);
    $query_ficha->bindParam(':horario', $dados['horario'], PDO::PARAM_STR);
    $query_ficha->bindParam(':segunda', $dados['segunda'], PDO::PARAM_STR);
    $query_ficha->bindParam(':terca', $dados['terca'], PDO::PARAM_STR);
    $query_ficha->bindParam(':quarta', $dados['quarta'], PDO::PARAM_STR);
    $query_ficha->bindParam(':quinta', $dados['quinta'], PDO::PARAM_STR);
    $query_ficha->bindParam(':sexta', $dados['sexta'], PDO::PARAM_STR);
    $query_ficha->bindParam(':ID_user', $ID_user, PDO::PARAM_INT);
    $query_ficha->execute();

    // Verificação do sucesso do cadastro
    if ($query_usuario && $query_ficha) {
      echo "<script language='javascript'>window.alert('Cadastrado com sucesso')</script>";
    } else {
      echo "<script language='javascript'>window.alert('Erro ao cadastrar')</script>";
    }
  }
  ?>

  <?php 
  if(@$_GET['funcao']=='editar'){ ?>
    <script>
      $('#modalCad').modal({
  keyboard: false
})
    </script>
<?php }
  
  
  
  ?>