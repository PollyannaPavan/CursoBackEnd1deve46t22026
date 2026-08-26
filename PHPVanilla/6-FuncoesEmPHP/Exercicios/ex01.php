<?php

declare(strict_types=1);

//Exercício 1: Calculadora de IMC

function calcularIMC(float $peso, float $altura): float
{
    return $peso / ($altura * $altura);
}

echo number_format(calcularIMC(70.0, 1.75), 2) . "\n";
echo number_format(calcularIMC(80.0, 1.80), 2) . "\n";
echo number_format(calcularIMC(60.0, 1.65), 2) . "\n";

?>
