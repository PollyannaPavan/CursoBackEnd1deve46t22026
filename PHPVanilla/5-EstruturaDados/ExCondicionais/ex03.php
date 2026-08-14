<?php
declare(strict_types=1)
?>
<?php

$peso = 95;
$altura = 1.75;

$imc = $peso / ($altura**2);

if ($imc < 18.5) {
    echo "Abaixo do Peso";
} elseif ($imc >= 18.5) {
    echo "Peso Normal";
} elseif ($imc < 30) {
    echo "Sobrepeso";
} elseif ($imc < 35) {
    echo "Obesidade Grau I";
} else {
    echo "Obesidade Grau II ou III";
}

?>