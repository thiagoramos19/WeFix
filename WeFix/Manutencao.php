<?php
require_once 'Conexao.php';

if (isset($_POST['tipo'], $_POST['num'], $_POST['motivo'])) {
    $tipo = htmlspecialchars($_POST['tipo']);
    $num = (int)$_POST['num'];
    $motivo = htmlspecialchars($_POST['motivo']);
    $timezone = new DateTimeZone('America/Sao_Paulo');
    $datahora = new DateTime('now', $timezone);
    $horarioFormatado = $datahora->format('Y-m-d H:i:s');

    $database = new Database();
    $database->connect();
    $pdo = $database->getConnection();

    $stmt = $pdo->prepare("INSERT INTO manutencao (tipo, num, motivo, datahora) VALUES (:tipo, :numero, :motivo, :datahora)");
    
    $stmt->bindParam(':tipo', $tipo);
    $stmt->bindParam(':numero', $num);
    $stmt->bindParam(':motivo', $motivo);
    $stmt->bindParam(':datahora', $horarioFormatado);

    if ($stmt->execute()) {
        header("Location: IndexMain.html");
    } else {
        echo "Erro ao inserir dados.";
    }
} else {
    echo "Dados incompletos.";
}
?>