<?php
declare(strict_types=1);

// Exercício 2: Prova de Fogo do Singleton (Teste de Identidade de Objetos)

// Importa a classe responsável pela conexão com o banco de dados.
require_once __DIR__ . '/ConexaoBanco.php';

// Define o caminho do arquivo de configuração do banco.
const ARQUIVO_CONFIG = __DIR__ . '/config/database.ini';

try {
    // Cria a primeira conexão.
    $conexao1 = ConexaoBanco::obterConexao(ARQUIVO_CONFIG);

    // Tenta criar outra conexão.
    $conexao2 = ConexaoBanco::obterConexao(ARQUIVO_CONFIG);

    // Verifica se as duas variáveis apontam para o mesmo objeto.
    $mesmaInstancia = $conexao1 === $conexao2;

    // Mostra o nome do teste.
    echo "Teste do Singleton\n";
    echo "==================\n";

    // Mostra o ID do primeiro objeto.
    echo "ID da conexão 1: " . spl_object_id($conexao1) . "\n";

    // Mostra o ID do segundo objeto.
    echo "ID da conexão 2: " . spl_object_id($conexao2) . "\n";

    // Verifica se as duas conexões são a mesma instância.
    if ($mesmaInstancia) {
        echo "Resultado: as duas variáveis apontam para o mesmo objeto.\n";
        echo "Singleton funcionando corretamente!\n";
    } else {
        // Mostra uma mensagem se os objetos forem diferentes.
        echo "Resultado: foram criados objetos diferentes.\n";
    }

} catch (PDOException $e) {

    // Mostra uma mensagem se acontecer algum erro.
    echo "Não foi possível realizar o teste de conexão.\n";
}