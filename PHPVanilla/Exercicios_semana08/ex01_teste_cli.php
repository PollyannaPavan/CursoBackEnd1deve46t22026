<?php
declare(strict_types=1);

// Exercício 1: Verificador de Portas e Diagnóstico de Conexão CLI

// Importa a classe responsável pela conexão com o banco de dados.
require_once __DIR__ . '/ConexaoBanco.php';

// Define onde está o arquivo de configuração do banco.
const ARQUIVO_CONFIG = __DIR__ . '/config/database.ini';

try {
    // Obtém a conexão com o PostgreSQL usando o Singleton.
    $conexao = ConexaoBanco::obterConexao(ARQUIVO_CONFIG);

    // Busca a versão do PostgreSQL para testar a conexão.
    $versao = $conexao->query('SELECT version()')->fetchColumn();

    // Mostra o resultado da conexão no terminal.
    echo "====================================\n";
    echo " DIAGNÓSTICO DO POSTGRESQL\n";
    echo "====================================\n";
    echo "Porta: 5432\n";
    echo "Status: CONEXÃO REALIZADA COM SUCESSO!\n";
    echo "PostgreSQL: {$versao}\n";

} catch (PDOException $e) {

    // Mostra uma mensagem caso aconteça um erro na conexão.
    echo "====================================\n";
    echo " ERRO DE CONEXÃO\n";
    echo "====================================\n";
    echo "Não foi possível acessar o PostgreSQL.\n";
    echo "Verifique o servidor, a porta e o banco.\n";
}