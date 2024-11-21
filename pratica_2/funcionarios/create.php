<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro de Funcionários</title>
    </head>

    <body>
        <form method="POST" action="">
            Nome do funcionário: <input type="text" name="nome" required> <br><br>
            <input type="submit" value="Cadastrar">
        </form>

        <?php
        if (isset($_GET['success']) && $_GET['success'] == 1) {
            echo "<p>Funcionário cadastrado com sucesso!</p>";
        }
        ?>

        <a href="read.php"> Visualizar todos os registros </a>
    </body>
</html>

<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];

    $sql = "INSERT INTO funcionario (nome) VALUES ('$nome')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ?success=1");
        exit;
    } else {
        echo "Deu ruim: " . $sql . "<br>" . $conn->error;
    }
}
?>