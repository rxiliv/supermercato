<?php
    # --- Funzioni ---
    function chiave_presente($key_to_find, $array) {
        foreach (array_keys($array) as $key) {
            if ($key == $key_to_find) {
                return true;
            }
        }
        return false;
    }

    function genera_report($vendite) {
        $report = [];
        foreach ($vendite as $transazione) {
            if (chiave_presente($transazione["categoria"], $report)) {
                $report[$transazione["categoria"]]["totale_vendite"] += $transazione["importo"];
                $report[$transazione["categoria"]]["numero_transazioni"]++;
            }
            else {
                $report[$transazione["categoria"]]["totale_vendite"] = $transazione["importo"];
                $report[$transazione["categoria"]]["numero_transazioni"] = 1;
            }
        }
        return $report;
    }

    function calcola_importi_medi($report) {
        $importi_medi = [];
        foreach ($report as $categoria => $statistiche) {
            $importi_medi[$categoria] = $statistiche["totale_vendite"] / $statistiche["numero_transazioni"];
        }
        return $importi_medi;
    }

    # Parte 1
    $vendite = [
        ["categoria" => "Elettronica", "prodotto" => "TV 4K", "importo" => 750],
        ["categoria" => "Libri", "prodotto" => "PHP Avanzato", "importo" => 30],
        ["categoria" => "Elettronica", "prodotto" => "Smartphone", "importo" => 500],
        ["categoria" => "Casa", "prodotto" => "Set di pentole", "importo" => 120],
        ["categoria" => "Libri", "prodotto" => "Guida a SQL", "importo" => 25]
    ];

    # Parte 2
    $report = genera_report($vendite);

    # Parte 3
    $importi_medi = calcola_importi_medi($report);

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