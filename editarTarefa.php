<?php

    require("./database/conexao.php");

    $tarefaId = $_GET["tarefaId"];
    
    $sqlEdit = "SELECT * FROM tbl_task WHERE id = $tarefaId";

    $resultado = mysqli_query($conexao, $sqlEdit);


    
    $tarefa = mysqli_fetch_array($resultado);
    
    if(!$tarefa){
        die("Impossivel editar, tarefa não encontrada");
    }
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas</title>
    <link rel="stylesheet" href="styles-global.css" />
</head>

<body>

    <div class="content">
        <h1>Editar Tarefas</h1>
        <form method="POST" action="taskActions.php">
            <div class="input-group">
                <input type="hidden" name="acao" value="editar" />
                <input type="hidden" name="tarefaId" value="<?= $tarefa["id"]?>" />
                <label for="tarefa">Descrição da tarefa</label>
                <input type="text" name="tarefa" id="tarefa" placeholder="Digite a tarefa" required value="<?= $tarefa["descricao"] ?>" />
            </div>
            <button>Editar</button>
        </form>
        
    </div>
    
</body>

</html>