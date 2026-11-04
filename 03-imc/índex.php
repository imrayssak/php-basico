<?php

// Inicializa tudo no começo (resolve o aviso "Possible undefined variable")
$erro         = "";
$imc          = 0;
$imcFormatado = "";
$classe       = "";

$enviado = isset($_GET["peso"]) && isset($_GET["altura"]);

$peso   = (float) str_replace(",", ".", $_GET["peso"] ?? "0");
$altura = (float) str_replace(",", ".", $_GET["altura"] ?? "0");

if ($enviado) {

    if ($peso <= 0 || $altura <= 0) {

        $erro = "Informe peso e altura maiores que zero.";

    } else {

        $imc = $peso / ($altura * $altura);

        $imcFormatado = number_format($imc, 1, ",", ".");

        if ($imc < 18.5) {
            $classe = "Abaixo do peso";
        } elseif ($imc < 25) {
            $classe = "Peso normal";
        } elseif ($imc < 30) {
            $classe = "Sobrepeso";
        } elseif ($imc < 35) {
            $classe = "Obesidade grau I";
        } elseif ($imc < 40) {
            $classe = "Obesidade grau II";
        } else {
            $classe = "Obesidade grau III";
        }

    }

}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Calculadora de IMC</title>
</head>

<body>

    <h1>Calculadora de IMC</h1>

    <form method="get">

        <label for="peso">Peso (kg):</label>
        <input type="text" id="peso" name="peso" placeholder="Ex: 70" required>

        <br><br>

        <label for="altura">Altura (m):</label>
        <input type="text" id="altura" name="altura" placeholder="Ex: 1.75" required>

        <br><br>

        <button type="submit">Calcular IMC</button>

    </form>

    <?php if ($erro): ?>

        <p><?= htmlspecialchars($erro) ?></p>

    <?php elseif ($enviado): ?>

        <h2>Resultado</h2>

        <p>Peso: <?= htmlspecialchars($_GET["peso"]) ?> kg</p>

        <p>Altura: <?= htmlspecialchars($_GET["altura"]) ?> m</p>

        <p>IMC: <strong><?= $imcFormatado ?></strong></p>

        <p>Classificação: <strong><?= htmlspecialchars($classe) ?></strong></p>

    <?php endif; ?>

</body>

</html>