## LISTA DE EXERCÍCIOS: PROCESSAMENTO HTTP E FORMULÁRIOS

### Parte A: Exercícios Teóricos de Fixação

#### Diferença Estrutural
>1. Explique a diferença física entre onde os dados são anexados em uma requisição GET e em uma requisição POST.

> - O método `GET` é usado quando queremos **buscar ou pesquisar informações**. Os dados aparecem na **URL**, depois do `?`. O método `POST` é usado quando queremos **enviar informações para o sistema**, como fazer um cadastro ou alterar algum dado. Nesse caso, os dados não aparecem na URL.

#### Segurança e Privacidade
>2. Por que senhas de usuário nunca devem ser enviadas via método GET? Cite pelo menos dois locais onde essa senha ficaria gravada de forma insegura.

> - Senhas não devem ser enviadas pelo método `GET` porque ficam visíveis na URL. Elas podem ficar gravadas no **histórico do navegador** e no **histórico de pesquisa**, além de poderem ser expostas quando a **URL** é compartilhada, podendo ser vistas por outras pessoas.

#### Coalescência Nula
>3.  Por que a instrução $nome = $_POST['nome']; dispara um Warning na primeira vez que a página é carregada no navegador? Como o operador ?? resolve isso?

> - A instrução `$nome = $_POST['nome'];` á um Warning na primeira vez que a página é aberta porque ainda não foi enviado nenhum formulário, então o campo nome não existe.

> - O operador ?? resolve isso verificando se o valor existe. Caso não exista, ele coloca um valor padrão, evitando o Warning.

**Exemplo:**

```php
$nome = $_POST['nome'] ?? '';
```

#### Idempotência
>4. O que significa dizer que uma requisição GET é idempotente? Por que atualizar ou deletar dados no banco usando links GET é uma má prática de segurança?

> - Uma requisição `GET` é idempotente quando pode ser feita várias vezes e o resultado no sistema continua o mesmo, sem alterar os dados.

> - Porque um simples acesso ao link poderia **alterar ou apagar dados do banco**. Além disso, links `GET` podem ser compartilhados ou acessados novamente, causando alterações indesejadas no banco de dados.

#### Validação Client vs Server
>5. Um desenvolvedor júnior afirma que o formulário dele é 100% seguro porque colocou required e type="email" em todas as tags HTML. Explique por que essa afirmação é falsa.

> - Essa afirmação é falsa porque `required` e `type="email"` fazem a validação **no navegador**. O usuário pode desativar ou alterar essas validações. Por isso, o servidor também precisa **verificar os dados recebidos** antes de aceitá-los.

#### XSS e Sanitização
>6. Qual é o risco de exibir dados vindos de um $_POST diretamente na tela sem utilizar htmlspecialchars()?

>- O risco é que alguém coloque um **código malicioso** no formulário e esse código seja executado quando os dados forem mostrados na tela. Isso pode causar um ataque **XSS**. O `htmlspecialchars()` ajuda a evitar esse problema, deixando o conteúdo seguro para exibição.

#### Sticky Forms
>7. O que é a técnica de Sticky Forms e qual é o seu impacto na experiência do usuário (UX)?

> - A técnica **Sticky Forms** faz com que os dados que o usuário digitou continuem aparecendo nos campos do formulário quando acontece algum erro. Assim, o usuário não precisa digitar tudo novamente, o que deixa o formulário mais fácil e agradável de usar.

#### DevTools
>8. Como você utilizaria a aba Network do navegador para comprovar que um formulário foi enviado via POST e não via GET?

> - Eu abriria o **DevTools** do navegador, entraria na aba **Network** e enviaria o formulário. Depois, clicaria na requisição feita e verificaria o **Request Method**. Se aparecer **POST**, o formulário foi enviado pelo método POST. Se aparecer **GET**, foi enviado pelo método GET.


