<?php

require_once('../../conexao.php');
@session_start();

// Verificar se o cliente está logado (você pode adicionar mais verificações de segurança, como autenticação)
if (!isset($_SESSION['ID_user'])) {
    // Redirecionar para a página de login ou exibir uma mensagem de erro
    header("Location: login.php");
    exit;
}

// Consulta os dados do cliente na tabela "ficha" com base no ID do cliente logado
$query = $pdo->prepare("SELECT * FROM ficha WHERE ID_user = :ID_user");
$query->bindValue(":ID_user", $_SESSION['ID_user']);
$query->execute();
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = count($res);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Bem-vindo, essa é sua Ficha de Treino!</h1>
        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Peso</th>
                    <th scope="col">Tipo de Exercício</th>
                    <th scope="col">Horário</th>
                    <th scope="col">Segunda</th>
                    <th scope="col">Terça</th>
                    <th scope="col">Quarta</th>
                    <th scope="col">Quinta</th>
                    <th scope="col">Sexta</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($total_reg > 0) {
                    foreach ($res as $row) {
                        $nome = $row['nome'];
                        $peso = $row['peso'];
                        $tipo_exercicio = $row['tipo_exercicio'];
                        $horario = $row['horario'];
                        $segunda = $row['segunda'];
                        $terca = $row['terca'];
                        $quarta = $row['quarta'];
                        $quinta = $row['quinta'];
                        $sexta = $row['sexta'];

                        echo "
                        <tr>
                            <td>$nome</td>
                            <td>$peso</td>
                            <td>$tipo_exercicio</td>
                            <td>$horario</td>
                            <td>$segunda</td>
                            <td>$terca</td>
                            <td>$quarta</td>
                            <td>$quinta</td>
                            <td>$sexta</td>
                        </tr>
                        ";
                    }
                } else {
                    echo '<tr><td colspan="9">Não existem dados para serem exibidos</td></tr>';
                }
                ?>
            </tbody>
        </table>

        <form action="gerar_pdf.php" method="POST">
            <button type="submit" class="btn btn-primary">Gerar PDF</button>
        </form>
    </div>
</body>

</html>
