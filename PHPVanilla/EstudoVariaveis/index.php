<?php 
declare(strict_types=1); // blinda o sistema contra misturas acidentais de tipos de dados
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudo de Variáveis</title>
</head>
<body>
    <h3>Estudo de Variáveis</h3>
    <?php
    
    // Sintaxe de variaveis em PHP
    // Variáveis são representadas pelo símbolo "$" seguido do nome da variável
    //Exemplo
    $nome = "João"; // Variável do tipo String 
    $idade = 25; // Variável do tipo Number
    $status = true; // Variável do tipo Boolean
    $altura = 1.75; // Variavel do tipo Number (float)
    $email = null; //Variável do tipo Null
    #$endereco; Não é possivel declarar uma variável sem atribuir um valor a ela, não existe Underfien em PHP

    // Exibir as variáveis na tela
    echo "Nome: $nome <br>";
    echo "Idade: $idade <br>";
    echo "Status: $status <br>";
    echo "Altura: $altura <br>";
    echo "Email: $email <br>";

    echo "<br> <h3> Constantes </h3> <br>";

    // Constantessão representadas pelas palavras "const" ou "define" seguida do nome da constante
    // Exemplo de constante
    const PI = 3.14; //Constante do tipo Number (float)
    const EMPRESA = "Google"; //Constante do tipo String
    define("SITE", "www.google.com"); // Contante do tipo Strng
    // Uma boa prática é tilizar letras maiúsculas para nomear constantes, para diferenciar das variáveis

    //Exibir as constantes na tela
    echo "Valor de PI: PI <br>";
    echo "Nome da Empresa: EMPRESA <BR>";
    echo "Site: SITE <br>";
    
    // Tentando alterar o valor de uma constante, isso irá gerar um erro, pois constantes não pdem ser alteradas
    // PI=3.14159; // Isso é um erro
    // Redeclarr uma constante tabém irá gerar erro
   //const SITE = "www.google.com.br"; // Isso é um erro

   //Regra de Ouro: Sempre coloque a instrução declare (strict_tupes-1); no início do seu código PHP,
   // Isso blinda o seu sistema contra mistura acidentais de tipos de dados.

   // Utilização de TEXTO (Contatenação VS Interpolação)
   // exemplo de Concatenação -> juntar duas ou mais string utilizando o operador "." (ponto)
    echo "Olá, " . $nome . "! Seja bem-vindo ao nosso site !<br>";

    // Exemplo de Interpolação => Utilização de variáveis dentro de um texto, utilizando aspas duplas
    echo "$nome, tem $idade anos e sua altura é $altura metros. <br>"; // Forma mais correta de misturar testo e variáveis 


    ?>


</body>
</html>