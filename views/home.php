<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Home</title>
    
</head>
<?php
    require_once  '../dao/alunoDao.php';
    require_once  '../dao/professorDao.php';
    $alunos = lista_alunos();
    $professores = lista_professores();

?>

<body>
    
    <div id="container">
        <header>
            <div id="titulo">
                <h1>
                    <p>Bem vindo ao espaço do colaborador</p>
                </h1>
            </div>
            <div class='message-fixer'>
                <p id="students">Novos alunos adicionados: </p><br>
                <p id="teachers">Novos professores adicionados: </p><br>
            </div>

        </header>
        <div class="action-button">
            <input type="button" id="button-aluno" class="btn btn-primary" value="Lista de alunos">
            <input type="button" id="button-professor" class="btn btn-primary" value="Lista de professores">
        </div>
        <div id="return">
            <a href="../">voltar</a>
        </div>

        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <div class="modal-title">Título</div>
                
                <table class="table-aluno"><hr>
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Matrícula</th>
                            <th scope="col">Nome</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($alunos as $value) : ?>
                            <tr>
                                <td><?= $value['idalunos']?></td>
                                <td><?= $value['matricula']?></td>
                                <td><?= $value['nome'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            
                <table class="table-professor">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Disciplina</th>
                            <th scope="col">Nome</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($professores as $value) : ?>
                            <tr>
                                <td><?= $value['idprofessores']?></td>
                                <td><?= $value['disciplina']?></td>
                                <td><?= $value['nome'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

            </div>
        </div>


    </div>
    <link rel="stylesheet" href="../assets/css/home.css">
    <script type="text/javascript" src="../assets/js/home.js"></script>
</body>
</html>