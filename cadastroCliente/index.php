<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="C:/xampp/htdocs/academia/cadastroCliente/stylesheet.css" media="screen">
  <title>cadastroCliente</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <h1>Realize o Cadastro do Cliente</h1>
  <div class="container">
    <div class="form-container"></div>
    <form action="processa.php" method="POST">
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
            <input type="date" format="YYYY-MM-DD" class="form-control" id="datanasci"
              placeholder="selecione a data que você nasceu" name="datanasci">
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
            <input type="text" id="peso" class="form-control" name="peso" >
          </div>
          <div class="form-group">
            <label for="tpexercicio">Qual o tipo de exercicio recomendo para o cliente?</label>
            <input type="text" class="form-control" id="inputSurname" placeholder="Hipertrofia, Emagrecimento..."
              name="tpexercicio" >
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
          <input type="submit" value="Cadastrar Cliente" name="caduser">
        </form>
      </div>
</body>

</html>