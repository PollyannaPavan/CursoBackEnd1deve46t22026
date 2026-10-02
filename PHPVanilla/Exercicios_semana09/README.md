# LISTA DE EXERCÍCIOS DE FIXAÇÃO E PRÁTICA 


## Parte A: Exercícios Teóricos de Fixação

### Definição de CRUD
1. O que significa o acrônimo CRUD e qual é a correspondência direta de cada uma de suas letras com as instruções SQL no PostgreSQL?

> CRUD significa:
> - C — Create: criar/inserir dados → INSERT
> - R — Read: consultar/ler dados → SELECT
> - U — Update: atualizar dados → UPDATE
> - D — Delete: excluir dados → DELETE

> Essas são as quatro operações básicas para manipulação de dados em um banco de dados.

### Anatomia do SQL Injection
2.  Explique com suas próprias palavras como um atacante consegue alterar a lógica de uma consulta quando o código utiliza concatenação de strings com `$_GET` ou `$_POST.`

> O SQL Injection acontece quando o sistema coloca diretamente um valor recebido pelo usuário, como `$_GET?` ou `$_POST`, dentro de uma consulta SQL usando concatenação de strings.
> Exeplo: 
```php
$sql = "SELECT * FROM usuarios WHERE nome = '" . $_GET["nome"] . "'";
```
> Nesse caso, o usuário pode enviar um conteúdo especialmente elaborado que altera a estrutura da consulta. Assim, o banco pode interpretar parte do texto enviado como comando SQL, em vez de apenas como um dado.


### Mecanismo das Prepared Statements
3. Por que o envio de uma consulta em duas etapas (`prepare` e depois `execute`) impede que um texto digitado pelo usuário seja executado como instrução SQL pelo banco?

> As Prepared Statements separam a estrutura do comando SQL dos dados enviados pelo usuário.

> Primeiro, o banco recebe a consulta através do `prepare()`:
```php
$stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = :id");
```
> Depois, o valor é enviado através do `execute()`:
```php
$stmt->execute(["id" => $id]);
```
> Dessa forma, o valor recebido é tratado como dado, e não como parte da instrução SQL. Mesmo que o usuário digite caracteres especiais, eles não são interpretados como comandos SQL.

### Marcadores Nomeados
4. Qual é a vantagem de utilizar marcadores nomeados como `:sku` e `:preco` em vez de pontos de interrogação posicionais (`?`) em instruções SQL complexas?


> Marcadores nomeados, como `:sku?` e `:preco`, deixam o código mais organizado e fácil de entender, principalmente em consultas grandes.

> Exemplo: 
```sql
UPDATE produtos
SET preco = :preco
WHERE sku = :sku
```
> É mais fácil identificar qual valor corresponde a cada campo do que utilizando vários `?`:
```sql
UPDATE produtos
SET preco = ?
WHERE sku = ?
```
> Isso também ajuda a evitar erros ao manter ou alterar consultas complexas.

### Diferença entre Bindings
5. Explique a diferença de comportamento entre os métodos `$stmt->bindValue()` e `$stmt->bindParam()`.

> A principal diferença é a forma como o valor é associado ao parâmetro.

> `bindValue()` associa o valor naquele momento:
```php
$stmt->bindValue(":idade", 20, PDO::PARAM_INT);
```
> `bindParam()` associa uma variável por referência. O valor da variável é utilizado quando o comando for executado:
```php
$idade = 20;

$stmt->bindParam(":idade", $idade, PDO::PARAM_INT);
```
> Resumindo
> - `bindValue()` -> vincula o valor atual.
> - `bindParam()` -> vincula a variável, permitindo que o valor dela seja alterado antes do `execute()`.

### Tipagem no PDO
6. Qual é o risco de omitir o tipo de dado (ex: `PDO::PARAM_INT`) ao vincular uma variável que deveria ser estritamente numérica em uma cláusula `LIMIT`?

> Quando um valor deveria ser numérico, como em um `LIMIT`, é importante informar o tipo correto:
```php
$stmt->bindValue(":limite", $limite, PDO::PARAM_INT);
```
> Se o tipo não for informado corretamente, pode haver conversões inesperadas entre string e número, causando erros ou comportamentos diferentes do esperado.

> Usar `PDO::PARAM_INT` deixa explícito que aquele parâmetro deve ser tratado como inteiro e ajuda a manter o código mais seguro e previsível.

### Padrão DAO
7. Qual é o benefício do padrão Data Access Object (DAO) em termos de manutenibilidade de software e do princípio de responsabilidade única (SOLID)?

> DAO significa Data Access Object.

> O objetivo é separar a parte responsável pelo acesso ao banco de dados do restante da aplicação.

> Exemplo, uma classe `ProdutoDAO` pode ser responsável por:
```php
listarProdutos();
buscarProduto();
cadastrarProduto();
atualizarProduto();
excluirProduto();
```
> Isso melhora a **manutenibilidade**, porque as operações do banco ficam concentradas em um único lugar.

> Também está relacionado ao princípio **SRP (Single Responsibility Principle)** do SOLID, pois cada classe deve ter uma responsabilidade principal.

### Operações de Update
8. Por que a ausência de uma cláusula `WHERE` em um comando `UPDATE` é considerada um incidente gravíssimo em ambientes de produção?

> A ausência do `WHERE` em um `UPDATE` é muito perigosa porque o comando será aplicado a todos os registros da tabela.

> Exemplo: 
```sql
UPDATE produtos
SET preco = 100;
```
> Esse comando altera o preço de todos os produtos.

> Já: 
```sql
UPDATE produtos
SET preco = 100
WHERE id = 5;
```
> Altera somente o produto cujo `id` é `5`.

> Em produção, um `UPDATE` sem `WHERE` pode causar perda ou alteração massiva de dados e exigir restauração de backup para recuperar as informações.


### Impacto da LGPD
9. De acordo com a Lei Geral de Proteção de Dados (LGPD), quais são as penalidades e impactos que uma organização pode sofrer caso ocorra vazamento de dados de clientes por falha de SQL Injection?

> Um vazamento de dados causado por uma falha de segurança, como SQL Injection, pode gerar consequências para a organização. A LGPD (Lei nº 13.709/2018) prevê medidas administrativas e sanções que podem ser aplicadas pela ANPD, dependendo do caso.

> Entre as possíveis penalidades estão:
> - advertência.
> - multa simples de até 2% do faturamento da empresa no Brasil, limitada a R$ 50 milhões por infração.
> - multa diária, respeitando o mesmo limite.
> - publicização da infração.
> - bloqueio ou eliminação dos dados pessoais envolvidos.
> - outras sanções previstas na legislação.

> Além das penalidades legais, um vazamento pode causar prejuízos financeiros, perda de confiança dos clientes, danos à reputação e necessidade de corrigir a falha de segurança.