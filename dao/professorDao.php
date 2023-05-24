<?php
require_once 'conexao.php';
/**
 * Lista Professores
 */
function lista_professores()
{
    $conexao = cria_conexao();

    $sql = "SELECT * FROM professores";

    $stmt = $conexao->prepare($sql);

    $stmt->execute();

    // retorna um array associativo
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Busca um professor pelo seu id
 */
function busca_professor_por_id($id_professor)
{
    $conexao = cria_conexao();

    $sql = "SELECT * FROM professores WHERE idprofessores = :id";

    $stmt = $conexao->prepare($sql);

    $stmt->bindValue(':id', $id_professor);

    $stmt->execute();

    // retorna um array associativo
    $professor = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // return $aluno[0];
    return array_shift($professor);
}

/**
 * Insere um professor
 */
function insere_professor($disciplina, $nome)
{
    try {
        $conexao = cria_conexao();

        $sql = "INSERT INTO professores (disciplina, nome) 
                    VALUES (:disc, :nome)";

        $stmt = $conexao->prepare($sql);

        $stmt->bindValue(':disc', $disciplina);
        $stmt->bindValue(':nome', $nome);

        $stmt->execute();

        return $conexao->lastInsertId();
    } catch (PDOException $e) {
        print("Error: " . $e->getMessage());
    }
}