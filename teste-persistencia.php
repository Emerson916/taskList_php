<?php

//Hoje em dia, no PHP, temos duas maneiras principais para manipular banco de dados

//São elas o mysqli e o PDO

//Utilizaremos nessa aula o mysqli

//Precisamos então fazer a conexão com o MySQL.

//declaramos os informações de conexão
const HOST = "localhost";
const USER = "root";
const PASSWORD = "bcd127";
const DATABASE = "tasklist";

//fazemos a conexão com o mysql
$conexao = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

//declaramos o SQL da consulta
//selecionar todas as colunas e linhas da tabela tbl_task
$sql = " SELECT * FROM tbl_task ";

//fazemos a consulta utilizando a conexão criada
$resultado = mysqli_query($conexao, $sql);

//se houver erro, exibe o erro na tela
if($resultado == false){
    echo mysqli_error($conexao);
    die();
}

$tarefa = "Minha nova tarefa";

$sqlInsert = "INSERT INTO tbl_task (descricao) VALUES ('$tarefa')";

mysqli_query($conexao, $sqlInsert);

// //obtemos a linha1 dos resultados caso exista
// $linha1 = mysqli_fetch_array($resultado);

// //imprimos a linha1
// print_r($linha1);

// //pulamos duas linhas
// echo "<br /><br />";

// //obtemos a linha2 dos resultados caso exista
// $linha2 = mysqli_fetch_array($resultado);

// //imprimos a linha2
// print_r($linha2);

// //pulamos duas linhas
// echo "<br /><br />";

// //obtemos a linha3 dos resultados caso ela exista
// $linha3 = mysqli_fetch_array($resultado);

// //imprimos a linha3
// print_r($linha3);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>DESCRIÇÃO</th>
        </tr>
        <?php
            //enquanto houver linhas no resultado do select
            //repitimos o tr da table
            while ($linha = mysqli_fetch_array($resultado)) {
        ?>
            <tr>
                <td><?= $linha["id"] ?></td>
                <td><?= $linha["descricao"] ?></td>
            </tr>
        <?php
            }
        ?>
    </table>

</body>

</html>