# LISTA DE EXERCÍCIOS: SEGURANÇA E HIGIENIZAÇÃO DE DADOS 

### Parte A: Exercícios Teóricos de Fixação

#### Conceituação OWASP
>1. O que significa a sigla XSS e por que ela é classificada como uma vulnerabilidade no lado do cliente (Client-Side) que deve ser prevenida pelo Back-End?

> - A sigla `XSS` significa **Cross-Site Scripting**. É uma vulnerabilidade em que um atacante consegue inserir código malicioso, geralmente JavaScript, em uma página. Ela acontece no lado do usuário, porque o código malicioso é executado no navegador da vítima. Mesmo assim, o Back-End deve prevenir o XSS, higienizando e validando os dados recebidos antes de exibi-los na página.

#### Reflected vs Stored
>2. Qual é a diferença entre um ataque XSS Refletido e um XSS Gravado (Stored)? Qual dos dois apresenta maior potencial de estrago para uma empresa e por quê?

> - **XSS Refletido**: o código malicioso é enviado em uma requisição, geralmente por meio de um link, e é executado quando a vítima acessa aquele link. Ele não fica salvo no site.

> - **XSS Gravado (Stored)**: o código malicioso é salvo no sistema, por exemplo, em um comentário ou campo de cadastro. Quando outras pessoas acessam aquela informação, o código pode ser executado no navegador delas.

> - O **XSS Gravado** geralmente apresenta maior potencial de estrago, porque o código fica armazenado no sistema e pode atingir vários usuários que acessarem o conteúdo contaminado.

#### Mecanismo de Escapamento
>3. Explique detalhadamente a transformação que a função htmlspecialchars() realiza nos caracteres < e >. Por que o navegador não executa o código após essa transformação?

> -  A função `htmlspecialchars()` transforma caracteres especiais em entidades HTML.

 > Por exemplo:

```php
$texto = '<script>alert("XSS")</script>';
echo htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
```

 > O resultado será interpretado pelo HTML aproximadamente como:

```php
&lt;script&gt;alert(&quot;XSS&quot;)&lt;/script&gt;
```
> O navegador não executa o conteúdo porque `&lt;` e `&gt;` são interpretados como **texto**, e não como os delimitadores de uma tag HTML.

 > Assim, em vez de criar:

```
<script>
```
> O navegador recebe algo equivalente a texto contendo `<script>`Portanto, o conteúdo deixa de ser interpretado como uma tag HTML.

#### Flags de Proteção
>4.  Qual é a função da flag `ENT_QUOTES` na chamada de `htmlspecialchars()`? O que pode acontecer se essa flag for omitida em um campo `<input value="...">`?

> - A flag `ENT_QUOTES` faz com que a função `htmlspecialchars()` também converta **aspas simples e duplas em entidades HTML**. Se ela for omitida em um campo `<input value="...">`, uma entrada com aspas pode fechar o atributo `value` antes da hora e permitir a inserção de outro código HTML ou JavaScript, aumentando o risco de XSS.

#### Anti-Alucinação PHP
>5.  Por que não devemos utilizar o filtro FILTER_SANITIZE_STRING em projetos modernos desenvolvidos em PHP 8.3?

> - O `FILTER_SANITIZE_STRING` não deve ser utilizado no PHP 8.3 porque esse filtro foi **descontinuado no PHP 8.1 e removido no PHP 8.3**. Portanto, ele não está mais disponível nas versões atuais. O recomendado é usar técnicas específicas de validação e escapamento, como `htmlspecialchars()` para dados exibidos em HTML.

#### Validação de E-mail
>6. Qual é a diferença prática entre verificar um e-mail com empty($email) e verificar com filter_var($email, FILTER_VALIDATE_EMAIL)?

> - `empty($email)` apenas verifica se o campo está **vazio ou não.** Já `filter_var($email, FILTER_VALIDATE_EMAIL)` verifica se o conteúdo possui um **formato válido de e-mail.**

> Exemplo:

> - Valor Válido 
```php
$email = "teste@email.com";

empty($email); // false → o campo não está vazio

filter_var($email, FILTER_VALIDATE_EMAIL); 
// retorna o próprio e-mail → formato válido
```
> - Valor inválido
```php
$email = "teste";

empty($email); // false → não está vazio

filter_var($email, FILTER_VALIDATE_EMAIL);
// retorna false → não é um e-mail válido
```

#### Roubo de Sessão
>7. Como um atacante pode usar uma brecha XSS para capturar o cookie de sessão de um usuário logado?

> - Se uma aplicação possui uma vulnerabilidade XSS, um código JavaScript malicioso pode ser executado no navegador do usuário. O atacante pode tentar acessar o cookie de sessão por meio desse código. Porém, quando o cookie possui a configuração `HttpOnly`, ele não pode ser acessado diretamente pelo JavaScript através de `document.cookie`.

**Exemplo:**

```text
Set-Cookie: PHPSESSID=...; HttpOnly; Secure
```

> O `HttpOnly` ajuda a evitar o roubo direto do cookie por JavaScript, mas **não elimina a vulnerabilidade XSS**. O ataque ainda pode permitir que o invasor execute ações e manipule a página no contexto do usuário.

> Por isso, o `HttpOnly` é uma camada extra de proteção e não substitui a correção da vulnerabilidade XSS.


#### Segurança em Camadas
>8. Por que sanitizar na entrada (ex: com strip_tags) não elimina a necessidade de codificar na saída com htmlspecialchars()?

> - `strip_tags()` e `htmlspecialchars()` possuem funções diferentes. O `strip_tags()` tenta remover tags HTML dos dados recebidos. 

> Exemplo: 
```php
`$nome = strip_tags($_POST['nome']);`.
```

Já o `htmlspecialchars()` transforma caracteres especiais para que sejam tratados como texto, e não como código HTML. 

> Exemplo: 
```php
`$nome = htmlspecialchars($_POST['nome'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');`.
```

A sanitização feita na entrada não substitui a codificação na saída, pois o mesmo dado pode ser utilizado posteriormente em diferentes partes da aplicação. Por isso, é importante usar `htmlspecialchars()` quando o conteúdo for exibido no HTML.


