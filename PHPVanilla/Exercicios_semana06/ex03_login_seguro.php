<?php
declare(strict_types=1);

//Declaração das variáveis
$email="";
$loginValidado = false;
$erros=[];

//Pegar os dados do Formulário
//Verifica se o formulário está enviando os dados como post 
if($_SERVER["REQUEST_MOTHOD"] === "POST"){
    $email = trim($_POST["email"] ?? ""); //Limpar os espaços vazios antes e depois do texto
    $senha = trim($_POST["email"] ?? "");

    //Validações de dados
    if($email === "" || !filter_var($email,FILTER_VALIDATE_EMAIL)){
        $erros["email"] = "Informe um Email Válido.";
    }

    if(strlen($senha) < 6){
        $erros["senha"] = "A senha deve ter ni mínimo 6 dígitos !";
    }

    //Se senha e email estão OK
    if(empty($erros)){
        $emailCorreto = "admin@senai.br";
        $senhaCorreta = "senhaSegura123";

        //Validado o email e a senha 
        if($email === $emailCorreto && $senha ==$senhaCorreta){
            $loginValidado = true;
        } else{
            $erros["login"] = "Credenciasis Inválidas!";
        }

    }
}

?>