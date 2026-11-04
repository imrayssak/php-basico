<?php

// Passo 7: função para formatar preço (usada na tabela e no total)
function formatarPreco(float $valor): string {
    return "R$ " . number_format($valor, 2, ",", ".");
}

// Passos 1 e 2: lista de produtos (array de arrays associativos)
$produtos = [
    ["nome" => "Teclado mecânico", "preco" => 249.90, "estoque" => 12],
    ["nome" => "Mouse sem fio",    "preco" => 79.50,  "estoque" => 30],
    ["nome" => "Monitor 24\"",     "preco" => 899.90, "estoque" => 5],
    ["nome" => "Webcam HD",        "preco" => 189.90, "estoque" => 0], // esgotado
];

// Passo 6: total em estoque e quantidade de produtos
$total = 0;
foreach ($produtos as $item) {
    $total += $item["preco"] * $item["estoque"];
}
$quantidade = count($produtos);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Lista de Produtos</title>
</head>
<body>
  <h1>Produtos</h1>

  <!-- Passo 4 e 5: tabela com situação do estoque -->
  <table border="1" cellpadding="6">
    <thead>
      <tr>
        <th>Produto</th>
        <th>Preço</th>
        <th>Estoque</th>
        <th>Situação</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($produtos as $item): ?>
      <tr>
        <td><?= htmlspecialchars($item["nome"]) ?></td>
        <td><?= formatarPreco($item["preco"]) ?></td>
        <td><?= $item["estoque"] ?></td>
        <td><?= $item["estoque"] > 0 ? "Disponível" : "Esgotado" ?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>

  <p>
    <?= $quantidade ?> produtos cadastrados.
    Valor total em estoque: <?= formatarPreco($total) ?>
  </p>
</body>
</html>