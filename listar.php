<!DOCTYPE html>
<html lang="ptbr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Lista de Inscritos</title>
    
    <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="assets/css/all.css">
    <link rel="stylesheet" href="form.css"> 
</head>
<body>

<section class="rounded">
        <h1 id="h1" >Cadastrados</h1>
    </section>

    <div class="table-responsive rounded">
    <table class="table table-striped table-bordered table-danger rounded">
        <thead class="table-light" id="title">
            <th class="bg-danger">Nome</th>
            <th class="bg-danger">Sobrenome</th>
            <th class="bg-danger">Nascimento</th>
            <th class="bg-danger">Telefone</th>
            <th class="bg-danger">Email</th>
        </thead>

<?php
    try {
        require('conexao.php');
        // A variável $pdo, usada a seguir, está vindo do conexao.php

        $consulta = $pdo->prepare("SELECT * FROM aluno");
        $consulta->execute();

        $alunos = $consulta->fetchAll();
    
        foreach($alunos as $aluno) {
            echo "<tr>
                    <td>{$aluno["nome"]}</td>
                    <td>{$aluno["sobrenome"]}</td>
                    <td>{$aluno["nascimento"]}</td>
                    <td>{$aluno["telefone"]}</td>
                    <td>{$aluno["email"]}</td>
                </tr>";
        }

    } catch(Exception $e) {
        die("Erro de banco de dados: " . $e->getMessage());
    }    
?>    
        </table>
    </div>

    <div id="butom">
    <a class="btn btn-danger" href="index.php" role="button">Voltar</a>
    </div>

    <script src="vendor/popper.min.js"></script>
    <script src="vendor/jquery-3.3.1.slim.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
