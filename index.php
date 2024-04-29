<?php
session_start();

if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = array();
}

if (isset($_GET['task_name'])) {
    array_push($_SESSION['tasks'], $_GET['task_name']);
}

if (isset($_GET['clear'])) {
    unset($_SESSION['tasks']);
    $_SESSION['tasks'] = array();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <title>Gerenciador de Tarefas</title>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Gerenciador de Tarefas</h1>
    </div>
    <div class="form">
        <form action="" class="get">
            <label for="task_name">Tarefa:</label>
            <input type="text" name="task_name" placeholder="Nome da Tarefa">
            <button type="submit">Cadastrar</button>
        </form>
    </div>
    <div class="separator"></div>
    <div class="list-tasks">
        <?php
        if (isset($_SESSION['tasks'])) {
            echo "<ul>";
            foreach ($_SESSION['tasks'] as $key => $task) {
                echo "<li>$task</li>";
            }
            echo "</ul>";
        }
        ?>
        <form action="" method="get">
            <input type="hidden" name="clear" value="clear">
            <button type="submit" class="btn-clear">Limpar Tarefas</button>
        </form>
    </div>
    <div class="footer">
        <p>Desenvolvido por Monolitto</p>
    </div>
</div>
</body>
</html>