<?php
require_once  './dao/alunoDao.php';
require_once  './dao/professorDao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = $_FILES['userfile'];
    $name = $file['name'];
    $tmp = $file['tmp_name'];
    $type = $file['type'];
    $uploadDir = __DIR__ . '/uploads/';

    if ($type != 'text/plain') {
        redirect_script('<script type="text/javascript"> window.location = "index.html?value=false";</script>');
        
    } else {
        // Verifica se o arquivo foi enviado com sucesso
        if (move_uploaded_file($tmp, $uploadDir . $name)) {
            // Abre o arquivo para leitura
            $file = fopen($uploadDir . $name, 'r');

            $novos_alunos = 0;
            $novos_professores = 0;
            $professores = lista_professores();
            $alunos = lista_alunos();

            while (($line = fgets($file)) !== false) {
                $data = explode(';', $line);
                $tipo = $data[0];
                $field1 = $data[1];
                $field2 = $data[2];

                if ($tipo == '001') {
                    $count = 0;
                    foreach ($alunos as $value) {
                        $field1 = substr($field1, 0, 6); // mantém apenas os 6 primeiros dígitos
                        if (in_array($field1, $value) && in_array($field2, $value)) {
                            $count += 1;
                        }
                    }
                    if ($count == 0) {
                        insere_aluno($field1, $field2);
                        $novos_alunos += 1;
                        $alunos = lista_alunos();
                    }

                } elseif ($tipo == '002') {
                    $count = 0;
                    foreach ($professores as $value) {
                        if (in_array($field1, $value) && in_array($field2, $value)) {
                            $count += 1;
                        }
                    }
                    if ($count == 0) {
                        insere_professor($field1, $field2);
                        $novos_professores += 1;
                        $professores = lista_professores();
                    }
                }
            }
        
            fclose($file);

            // var_dump($novos_alunos);echo "<br>";
            // var_dump($novos_professores);
            // exit();

        } else {
            echo 'Erro ao enviar arquivo.';
        }

        redirect_script('<script type="text/javascript">window.location = "views/home.php?alunos=' . $novos_alunos . '&professores=' . $novos_professores . '";</script>');   
    }  
}


function redirect_script($js_script){
    echo $js_script;
}
