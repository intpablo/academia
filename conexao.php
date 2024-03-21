<?php
require_once("config.php");

try {
    $pdo = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
} catch (PDOException $e) {
    echo "Erro ao tentar conectar ao banco de dados!<p>" . $e->getMessage();
}
?>
