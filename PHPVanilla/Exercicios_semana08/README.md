# LISTA DE EXERCÍCIOS DE FIXAÇÃO E PRÁTICA - CONEXÃO BANCO DE DADOS PDO

## Parte A: Exercícios Teóricos de Fixação

### Abstração de Dados
1. O que é o PDO no PHP e por que ele é preferível em relação a extensões especializadas procedurais como o antigo pgsql em projetos corporativos? 

> - O PDO (PHP Data Objects) é uma extensão do PHP usada para fazer a conexão e trabalhar com bancos de dados. Ele permite executar comandos SQL de uma forma mais padronizada. O PDO é preferível em projetos corporativos porque pode trabalhar com diferentes bancos de dados, como PostgreSQL, MySQL e SQLite, sem precisar mudar completamente o código da aplicação. Além disso, oferece recursos de segurança, como Prepared Statements, que ajudam a evitar ataques de SQL Injection. Já o pgsql é específico para PostgreSQL e possui uma abordagem mais procedural. Com o PDO, o código fica mais organizado, reutilizável e fácil de manter em projetos maiores.

### Ciclo do DSN
>2.  Explique o que é a string DSN e detalhe a finalidade de cada um dos parâmetros configurados para o PostgreSQL (host, port, dbname).

> - A DSN (Data Source Name) é uma string usada pelo PDO para informar onde e em qual banco de dados o PHP deve se conectar.
> Exemplo: 
```php
$dsn = "pgsql:host=localhost;port=5432;dbname=meu_banco";
```
> - host: indica onde o servidor do banco de dados está localizado. localhost significa que o banco está no próprio computador.
> - port: indica a porta usada pelo PostgreSQL para receber as conexões. A porta padrão é 5432.
> - dbname: indica o nome do banco de dados ao qual o PHP deseja se conectar. No exemplo, o banco se chama meu_banco.
> Assim, o DSN funciona como um endereço do banco de dados, informando ao PDO onde encontrar o PostgreSQL e qual banco utilizar.

### Padrão de Portas
>3. Qual é a porta padrão de escuta do SGBD PostgreSQL (5432) e como ela é referenciada dentro da string de conexão?

> - A porta padrão de escuta do PostgreSQL é a **5432**. Ela é usada para permitir a comunicação entre a aplicação e o banco de dados. Dentro da string de conexão do PDO, a porta é informada pelo parâmetro `port`, como no exemplo: `$dsn = "pgsql:host=localhost;port=5432;dbname=meu_banco";`. Nesse caso, `port=5432` indica que a conexão será feita pela porta padrão do PostgreSQL.


### Flags de Integridade
>4. O que acontece quando definimos o atributo PDO::ATTR_ERRMODE com o valor PDO::ERRMODE_EXCEPTION? Qual seria o comportamento padrão caso essa flag não fosse definida?

> - A porta padrão de escuta do PostgreSQL é a **5432**. Ela é usada para permitir a comunicação entre a aplicação e o banco de dados. Dentro da string de conexão do PDO, a porta é informada pelo parâmetro `port`, como no exemplo: `$dsn = "pgsql:host=localhost;port=5432;dbname=meu_banco";`. Nesse caso, `port=5432` indica que a conexão será feita pela porta padrão do PostgreSQL.


### Fetch Mode
>5. Qual é a vantagem de utilizar PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC para o consumo de memória RAM do servidor?

> - O `PDO::FETCH_ASSOC` retorna os dados apenas como um array associativo, evitando a duplicação dos mesmos dados em índices numéricos. Isso ajuda a **reduzir o consumo de memória RAM**, principalmente em consultas com muitos registros.

### Padrão Singleton
>6. Por que abrir uma nova conexão com new PDO() a cada consulta executada no PostgreSQL pode esgotar o limite de max_connections do servidor?

> - Abrir uma nova conexão com `new PDO()` a cada consulta cria várias conexões com o PostgreSQL. Se muitas forem abertas ao mesmo tempo, o limite de `max_connections` pode ser atingido, impedindo novas conexões com o banco.

### Encapsulamento do Singleton
>7. Por que o construtor da classe ConexaoBanco precisa ser declarado como private e quais métodos mágicos devem ser bloqueados para garantir a unicidade da instância?

> - O construtor deve ser `private` para impedir que a classe seja instanciada diretamente com `new`. Para garantir uma única instância, também devem ser bloqueados os métodos mágicos `__clone()` e `__wakeup()`, evitando que a instância seja clonada ou recriada.

### Segurança de Credenciais
>8. Por que nunca devemos deixar o usuário e senha do banco de dados salvos de forma estática (hardcoded) dentro dos scripts PHP do projeto?

> - Não devemos deixar usuário e senha do banco diretamente no código PHP porque, se o arquivo for exposto ou compartilhado, essas informações podem ser roubadas. O ideal é armazená-las em variáveis de ambiente ou arquivos de configuração protegidos.


### Tratamento de Exceções & LGPD
>9. Por que a exibição direta de $e->getMessage() de uma PDOException na tela do navegador é considerada uma falha grave de segurança (Information Disclosure)?

> - Exibir `$e->getMessage()` no navegador pode revelar informações internas do banco, como nomes de tabelas, caminhos e detalhes da conexão. Isso facilita ataques e pode expor dados que deveriam ser protegidos. Por isso, o erro deve ser registrado internamente e o usuário deve receber apenas uma mensagem genérica.
