<?php

declare(strict_types=1);

// Exercício 4: Formatador de Nome

function formatarNome(string $nome): string
{
    $nome = trim($nome);
    $nome = strtolower($nome);
    $nome = ucfirst($nome);

    return $nome;
}

echo formatarNome("   Julia   ") . "\n";
echo formatarNome("mAYNE") . "\n";
echo formatarNome("ALICE") . "\n";