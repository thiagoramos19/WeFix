<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Solicitações - WeFix</title>
    <link rel="stylesheet" href="StyleLista.css">
</head>
<body>
        <header>
            <div class="Header">
                <div class="DivLogo">
                <img src="img/LogWefix.png" alt="WeFix Logo" class="logo">
                </div>
                <div class="TxtHeader">
                <h1>Visualizar Horários</h1>
                </div>
                <div class="DivMenu">
                    <a class="refmenu" href="IndexMain.html"><img src="img/MenuPreto.png" class="Menu"></a>
                </div>
            </div>
        </header>

        <section class="ContainerGrande">
            <h2>Solicitações</h2>
            <form>
                <div class="Txts">
                    <table>
                        <thead>
                            <tr>
                                <th>Linha</th>
                                <th>Sentido</th>
                                <th>Horário</th>
                                <th>Passageiros</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                    $message = '';
                    // Conexão com o banco de dados (09:30)
                    $host = 'localhost';
                    $db = 'WeFix';
                    $user = 'hitto';
                    $pass = '12345678';
                    $port = 3307; 
                    require_once 'Conexao.php';
                    $database = new Database($host, $db, $user, $pass, $port);
                    $database->connect();
                    $pdo = $database->getConnection();
        
                    // Consulta para buscar alunos (09:32)
                    $stmt = $pdo->prepare("SELECT * FROM wefix");
                    $stmt->execute();
                    $wefix = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
                    // Exibir alunos na tabela (09:36)
        foreach ($wefix as $horarios) {
            echo "<tr>
                    <td>" . htmlspecialchars($horarios['linha']) . "</td>
                    <td>" . htmlspecialchars($horarios['sentido']) . "</td>
                    <td>" . htmlspecialchars($horarios['horario']) . "</td>
                    <td>" . htmlspecialchars($horarios['passageiros']) . "</td>
                    
                  </tr>"; //para deletar um aluno (10:30)
        }
                    ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </section>
</body>
</html>
