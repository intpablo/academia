<?php

require_once('../../conexao.php');
@session_start();

// Verificar se o cliente está logado (você pode adicionar mais verificações de segurança, como autenticação)
if (!isset($_SESSION['ID_user'])) {
    // Redirecionar para a página de login ou exibir uma mensagem de erro
    header("Location: login.php");
    exit;
}

require_once('TCPDF/tcpdf.php');

// Consulta os dados do cliente na tabela "ficha" com base no ID do cliente logado
$query = $pdo->prepare("SELECT * FROM ficha WHERE ID_user = :ID_user");
$query->bindValue(":ID_user", $_SESSION['ID_user']);
$query->execute();
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = count($res);

// Instanciação e configuração do objeto TCPDF
$pdf = new TCPDF('P', 'mm', 'A3', true, 'UTF-8');
$pdf->SetCreator('Seu Nome');
$pdf->SetAuthor('Seu Nome');
$pdf->SetTitle('Ficha de Treino');
$pdf->SetMargins(10, 10, 10);
$pdf->SetAutoPageBreak(true, 10);
$pdf->SetFont('helvetica', 'B', 14);

// Adiciona uma nova página
$pdf->AddPage();

// Cria a tabela e define os cabeçalhos
$pdf->SetFont('helvetica', 'B', 12);
$pdf->Cell(30, 10, 'Nome', 1, 0, 'C');
$pdf->Cell(30, 10, 'Peso', 1, 0, 'C');
$pdf->Cell(40, 10, 'Tipo de Exercício', 1, 0, 'C');
$pdf->Cell(30, 10, 'Horário', 1, 0, 'C');
$pdf->Cell(25, 10, 'Segunda', 1, 0, 'C');
$pdf->Cell(25, 10, 'Terça', 1, 0, 'C');
$pdf->Cell(25, 10, 'Quarta', 1, 0, 'C');
$pdf->Cell(25, 10, 'Quinta', 1, 0, 'C');
$pdf->Cell(25, 10, 'Sexta', 1, 1, 'C');

// Preenche a tabela com os dados
$pdf->SetFont('helvetica', '', 12);
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

    $pdf->Cell(30, 10, $nome, 1, 0, 'C');
    $pdf->Cell(30, 10, $peso, 1, 0, 'C');
    $pdf->Cell(40, 10, $tipo_exercicio, 1, 0, 'C');
    $pdf->Cell(30, 10, $horario, 1, 0, 'C');
    $pdf->Cell(25, 10, $segunda, 1, 0, 'C');
    $pdf->Cell(25, 10, $terca, 1, 0, 'C');
    $pdf->Cell(25, 10, $quarta, 1, 0, 'C');
    $pdf->Cell(25, 10, $quinta, 1, 0, 'C');
    $pdf->Cell(25, 10, $sexta, 1, 1, 'C');
}

// Gera o arquivo PDF
$pdf->Output('ficha_de_treino.pdf', 'D');

?>
