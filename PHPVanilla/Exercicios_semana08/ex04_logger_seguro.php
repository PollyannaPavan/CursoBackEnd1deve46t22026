<?php
declare(strict_types=1);

// Exercício 4: Auditoria de Logs com Níveis de Severidade

// Função usada para salvar mensagens no arquivo de log.

function registrarLog(string $nivel, string $mensagem): void
{
    // Define os níveis que podem ser usados.
    $niveisPermitidos = ['INFO', 'WARNING', 'ERROR'];

    // Confere se o nível informado é válido.
    if (!in_array($nivel, $niveisPermitidos, true)) {
        throw new InvalidArgumentException('Nível de log inválido.');
    }

    // Define a pasta onde o log ficará.
    $pastaLogs = __DIR__ . '/logs';

    // Cria a pasta se ela não existir.
    if (!is_dir($pastaLogs)) {
        mkdir($pastaLogs, 0775, true);
    }

    // Pega a data e a hora atual.
    $data = date('Y-m-d H:i:s');

    // Monta a mensagem que será salva.
    $linha = "[{$data}] [{$nivel}] {$mensagem}" . PHP_EOL;

    // Adiciona a mensagem no arquivo de log.
    file_put_contents(
        $pastaLogs . '/sistema.log',
        $linha,
        FILE_APPEND | LOCK_EX
    );
}

// Inclui o arquivo de conexão com o banco.
require_once __DIR__ . '/ConexaoBanco.php';

// Define o caminho do arquivo de configuração.
const ARQUIVO_CONFIG = __DIR__ . '/config/database.ini';

try {
    // Tenta conectar ao PostgreSQL.
    ConexaoBanco::obterConexao(ARQUIVO_CONFIG);

    // Salva no log que a conexão deu certo.
    registrarLog(
        'INFO',
        'Conexão com PostgreSQL realizada com sucesso.'
    );

    // Mostra uma mensagem de sucesso no terminal.
    echo "Conexão realizada com sucesso.\n";

} catch (PDOException $e) {

    // Registra o erro ocorrido no arquivo de log.
    registrarLog('ERROR', $e->getMessage());

    // Mostra uma mensagem segura para o usuário.
    echo "Não foi possível conectar ao banco de dados.\n";
}