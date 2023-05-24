<?php
//  constantes para conexão

// nos labs do campus USER=root e PASSWORD="root"

define("SERVER", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DB", "academico");

//para postgres pgsql:host...
function cria_conexao()
{
    try {
        // criando objeto PDO(PHP data object) para conexão com o banco de dados
        return new PDO("mysql:host=" . SERVER . ";dbname=" . DB, USER, PASSWORD);
    } catch (PDOException $e) {
        print("Error: " . $e->getMessage());
    }
}
