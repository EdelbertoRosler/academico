<?php
require_once 'conexao.php';
/**
 * Lista Alunos
 */
function lista_alunos()
{
    $conexao = cria_conexao();

    $sql = "SELECT * FROM alunos";

    $stmt = $conexao->prepare($sql);

    $stmt->execute();

    // retorna um array associativo
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Busca um aluno pela sua matrícula
 */
function busca_aluno_por_matricula($matricula_aluno)
{
    $conexao = cria_conexao();

    $sql = "SELECT * FROM alunos WHERE matricula = :matricula_aluno";

    $stmt = $conexao->prepare($sql);

    $stmt->bindValue(':matricula_aluno', $matricula_aluno);

    $stmt->execute();

    // retorna um array associativo
    $aluno = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // return $aluno[0];
    return array_shift($aluno);
}

/**
 * Insere um aluno
 */
function insere_aluno($matricula, $nome)
{
    try {
        $conexao = cria_conexao();

        $sql = "INSERT INTO alunos (matricula, nome) 
                    VALUES (:matricula, :nome)";

        $stmt = $conexao->prepare($sql);

        $stmt->bindValue(':matricula', $matricula);
        $stmt->bindValue(':nome', $nome);

        $stmt->execute();

        return $conexao->lastInsertId();
    } catch (PDOException $e) {
        print("Error: " . $e->getMessage());
    }
}