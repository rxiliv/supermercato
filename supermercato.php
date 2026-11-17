<?php
    # Parte 1
    $vendite = [
        ["categoria" => "Elettronica", "prodotto" => "TV 4K", "importo" => 750],
        ["categoria" => "Libri", "prodotto" => "PHP Avanzato", "importo" => 30],
        ["categoria" => "Elettronica", "prodotto" => "Smartphone", "importo" => 500],
        ["categoria" => "Casa", "prodotto" => "Set di pentole", "importo" => 120],
        ["categoria" => "Libri", "prodotto" => "Guida a SQL", "importo" => 25]
    ];

    # Parte 2
    $report = [];
    foreach ($vendite as $transazione) {
        $chiave_presente = false;
        foreach ($report as $categoria => $statistiche) {
            if ($categoria == $transazione["categoria"]) {
                $chiave_presente = true;
                break;
            }
        }
        if ($chiave_presente) {
            $report[$transazione["categoria"]]["totale_vendite"] += $transazione["importo"];
            $report[$transazione["categoria"]]["numero_transazioni"]++;
        }
        else {
            $report[$transazione["categoria"]]["totale_vendite"] = $transazione["importo"];
            $report[$transazione["categoria"]]["numero_transazioni"] = 1;
        }
    }

    # Parte 3
    $importi_medi = [];
    foreach ($report as $categoria => $statistiche) {
        $importi_medi[$categoria] = $statistiche["totale_vendite"] / $statistiche["numero_transazioni"];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Supermercato </title>
</head>
<body>
    <h1> Report Vendite Supermercato </h1>

    <!-- Parte 4 -->
    <table>
        <thead>
            <tr>
                <th> Categoria </th>
                <th> Totale Vendite </th>
                <th> Numero Transazioni </th>
                <th> Importo Medio Transazione </th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($report as $categoria => $statistiche): ?>
            <tr>
                <td> <?= $categoria; ?> </td>
                <td> <?= $statistiche["totale_vendite"]; ?> </td>
                <td> <?= $statistiche["numero_transazioni"] ?> </td>
                <td> <?= $importi_medi[$categoria] ?> </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>