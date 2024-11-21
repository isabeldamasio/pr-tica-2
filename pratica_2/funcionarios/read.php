<?php
    include '../db.php';

    $sql = "SELECT * FROM funcionario";
    $result = $conn -> query($sql);

    if ($result -> num_rows > 0){ 
        echo "<table border='1'>
        <tr>
            <th> ID </th>
            <th> Nome </th>
            <th> Ações </th>
        </tr>";
        while ($row = $result -> fetch_assoc()){
        echo "<tr>
            <td> {$row['id']} </td>
            <td> {$row['nome']} </td>
            <td>
                <a href='update.php?id={$row['id']}'>Editar</a>
                <a href='delete.php?id={$row['id']}'>Excluir</a>
            </td>
        </tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum registro encontrado.";
    }
    $conn -> close ();
?>
<a href="create.php"> Cadastrar novo funcionário </a>