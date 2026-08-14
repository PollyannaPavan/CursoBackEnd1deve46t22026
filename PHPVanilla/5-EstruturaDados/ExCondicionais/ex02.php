<?php
declare(strict_types=1)
?>
<?php

$valorCompra = 199;

$statusFrete = ($valorCompra >= 250.00)?"Frete Grátis"  : "Frete R$ 25,00";

echo $statusFrete;

?>