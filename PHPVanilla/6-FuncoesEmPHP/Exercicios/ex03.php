<?php

declare(strict_types=1);

// Exercício 3: Validador de Senha

function senhaForte(string $senha): bool
{
    if (strlen($senha) > 8) {
        return true;
    } else {
        return false;
    }
}

$senha = "Senha12345";

if (senhaForte($senha)) {
    echo "A senha é forte.";
} else {
    echo "A senha não é forte.";
}