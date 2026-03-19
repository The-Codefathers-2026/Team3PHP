<?php
session_start();
require_once "functions.php";

// Session initialisieren
if (!isset($_SESSION['sales'])) {
    $_SESSION['sales'] = [];
}

// Formular verarbeitet?
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $model = trim($_POST["model"]);

    if ($model !== "") {
        addSale($_SESSION['sales'], $model);
    }
}

// Sortieren (eigene Funktion)
$sortedSales = sortSales($_SESSION['sales']);
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Fahrzeug-Verkaufsanalyse</title>
</head>
<body>

<h2>Verkaufsanalyse</h2>

<form method="post">
    <label for="model">Fahrzeugmodell:</label>
    <input type="text" name="model" id="model" required>
    <button type="submit">Hinzufügen</button>
</form>

<h3>Verkaufszahlen</h3>

<table border="1" cellpadding="5">
    <tr>
        <th>Modell</th>
        <th>Verkauft</th>
    </tr>

    <?php foreach ($sortedSales as $model => $count): ?>
        <tr>
            <td><?php echo htmlspecialchars($model); ?></td>
            <td><?php echo $count; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>