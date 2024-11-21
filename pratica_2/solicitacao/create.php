<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro de Solicitação</title>
    </head>

    <body>
        <form method="POST" action="">
            ID do cliente requisitante: <input type="number" name="id_cliente" required> <br><br>
            ID do funcionário responsável: <input type="number" name="id_funcionario" required> <br><br>
            Descrição do problema: <input type="text" name="descricao" required> <br><br>
            Urgência: <select name="urgencia">
                <option value="alta"> Alta </option>
                <option value="media"> Média </option>
                <option value="baixa"> Baixa </option>
            </select> <br></br>
            Status: <select name="status">
                <option value="aberto"> Pendente </option>
                <option value="andamento"> Em andamento </option>
                <option value="resolvido"> Finalizado </option>
            </select> <br></br>
            Data de abertura da solicitação: <input type="date" name="data" required> <br></br>
            <input type="submit" value="Cadastrar">
        </form>

        <?php
        if (isset($_GET['success']) && $_GET['success'] == 1) {
            echo "<p>Solicitação cadastrada com sucesso!</p>";
        }
        ?>

        <a href="read.php"> Visualizar todos os registros </a>
    </body>
</html>

<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_cliente = $_POST['id_cliente'];
    $id_funcionario = $_POST['id_funcionario'];
    $descricao_problema = $_POST['descricao'];
    $urgencia = $_POST['urgencia'];
    $status = $_POST['status'];
    $data_abertura = $_POST['data'];

    $sql = "INSERT INTO solicitacao (descricao, urgencia, status, data_abertura, id_funcionario, id_cliente) 
            VALUES ('$descricao_problema', '$urgencia', '$status', '$data_abertura', '$id_funcionario', '$id_cliente')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ?success=1");
        exit;
    } else {
        echo "Erro ao cadastrar solicitacao: " . $conn->error;
    }
}
?>