# Lista de Exercícios: Funções em PHP

## Parte A: Exercícios Teóricos

#### 1 - Conceito de função: 

> Uma **função** é uma parte do programa criada para fazer uma tarefa específica. Em vez de colocar todo o código junto, a gente separa em pequenas partes, deixando o **programa mais organizado.**

* **Organização:** o código fica mais fácil de entender e mais rápido de encontar a tarefa quando precisar alterar alguma coisa.
 
* **Reutilização:** podemos usar a mesma função várias vezes sem precisar escrever o mesmo código novamente.



#### 2 - Princípio DRY:

O **princípio DRY** significa **“Don’t Repeat Yourself” (não se repita).** Ele diz que devemos evitar escrever o mesmo código várias vezes.

> Porque, se o mesmo código estiver repetido em vários arquivos, será necessário alterar o código em todos eles quando houver alguma mudança, aumentando a possibilidade de erros e dificultando a manutenção. Uma função ajuda a evitar essa repetição, pois permite criar o código uma vez e reutilizá-lo várias vezes no sistema, facilitando as alterações e reduzindo a chance de erros.

#### 3- Parâmetros e retorno:

> Um parâmetro é a informação que a função recebe para poder realizar um cálculo. Um valor retornado por uma função (return) é o resultado que a função devolve depois de realizar o cálculo.

```php
function calcularTotal(float $preco, int $quantidade): float {
    return $preco * $quantidade; // $preco e $quantidade são parâmetros, enquanto o return é, por exemplo, 10.50 * 3 = 31.50
}
```

#### 4 - Tipagem: 
```php
function cadastrar(string $nome, int $idade): bool
```

Função: cadastrar

Parâmetro 1: $nome (string)

Parâmetro 2: $idade (int)

Retorno: bool (true ou false)

#### 5 - void e return:

>Uma função que retorna **string** retorna um texto como resultado. Já uma função que retorna **void** não retorna nenhum valor.

>**string**:

>Exemplo: Uma função que retorna o nome de uma pessoa (ex: "Pollyanna").

>**void**:

>Exemplo: Uma função que apenas exibe uma mensagem na tela, sem devolver um resultado.

#### 6 - Escopo:

>A função não consegue acessar $cliente diretamente porque $cliente foi criada fora da função, no escopo global.
```php
$cliente = "Julia";
```

```php
function exibirCliente(): string {
    return $cliente;
}
```

>Duas formas de corrigir:

```php
$cliente = "Julia";

function exibirCliente(): string {
    global $cliente;
    return $cliente;
}

$cliente = "Julia";

function exibirCliente(string $cliente): string {
    return $cliente;
}

echo exibirCliente($cliente);
```

>A segunda forma, usando parâmetro, é a m

#### 7 - Referência:

>Quando um parâmetro é declarado como `float &$valor`, ele é passado **por referência**, permitindo que a função altere diretamente a variável original. Sem o `&`, o parâmetro recebe apenas uma cópia do valor, então as alterações feitas dentro da função não modificam a variável original. Com o `&`, as alterações também são refletidas na variável original.

#### 8 - Funções nativas: 

> `strlen()`:
- **Categoria:** Strings.
- **Finalidade:** Retorna a quantidade de caracteres de um texto.
- **Parâmetro principal:** o texto que será contado.
- **Valor retornado:** um número inteiro com a quantidade de caracteres.

> `count()`:
- **Categoria:** Arrays.
- **Finalidade:** Conta a quantidade de itens de um array.
- **Parâmetro principal:** o array que será contado.
- **Valor retornado:** um número inteiro com a quantidade de itens.

> `round()`:
- **Categoria:** Números.
- **Finalidade:** Arredonda um número para a quantidade de casas decimais informada.
- **Parâmetros principais:** o número e, opcionalmente, a quantidade de casas decimais.
- **Valor retornado:** o número arredondado.

> `is_numeric()`:
- **Categoria:** Validação.
- **Finalidade:** Verifica se um valor é um número ou uma string numérica.
- **Parâmetro principal:** o valor que será verificado.
- **Valor retornado:** true se for numérico e false caso contrário.

> `date()`:
- **Categoria:** Data e hora.
- **Finalidade:** Formata uma data ou hora de acordo com uma máscara.
- **Parâmetro principal:** a máscara de formatação.
- **Valor retornado:** uma string contendo a data ou hora formatada.

#### 9 - Previsão de saída:

>**Resultado**: 90100

>A função `aplicarDesconto()` recebe o valor **100.00** e retorna **90.00**, pois **aplica 10% de desconto**. Porém, o valor da variável `$valor` não é alterado, porque foi passado para a função apenas como uma cópia.

>**Então:**

`echo aplicarDesconto($valor);` => Mostra 90
`echo $valor;` => Mostra 100

>Como não há espaço ou quebra de linha entre os `echo`, o resultado aparece como **90100**.

#### 10 - Documentação: 

> - Sintaxe: strlen(string $string): int
> - Parâmetro: $string — o texto que terá seu tamanho medido.
> - Tipo de retorno: int — retorna um número inteiro.


