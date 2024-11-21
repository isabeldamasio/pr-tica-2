<?php
    include '../db.php';

    $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $nome = $_POST['nome'];
        $sql = "UPDATE funcionario SET nome='$nome' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Cadastro atualizado com sucesso!";
        } else {
            echo "Deu ruim: " . $sql . "<br>" . $conn->error;
        }
    }

    $sql = "SELECT * FROM funcionario WHERE id='$id'";
    $result = $conn -> query($sql);
    $row = $result -> fetch_assoc();


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Cadastro dos Funcionário</title>
</head>
<body>
    
    <form method="POST" action=" update.php?id=<?php echo $row['id'];?>">
        <h1> Para atualizar os dados do funcionário, insira: </h1>
        <label for="nome">Novo nome:</label>
        <input type="text" name="nome" value="<?php echo $row['nome']; ?>" required><br>
        <input type="submit" value="Atualizar">
    </form>


    <a href="read.php"> Visualizar todos os registros </a>
</body>
</html>