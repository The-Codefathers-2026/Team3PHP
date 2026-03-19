<?php
session_start(); 

$op1 = '';
$op2 = '';
$ergebnis = '';

// Session-Speicher initialisieren
if (!isset($_SESSION['memory'])) { $_SESSION['memory'] = ''; }
if (!isset($_SESSION['last_result'])) { $_SESSION['last_result'] = ''; }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $op1 = isset($_POST['op1']) ? trim($_POST['op1']) : '';
    $op2 = isset($_POST['op2']) ? trim($_POST['op2']) : '';
    
    // Altes Ergebnis aus der Session laden
    $ergebnis = $_SESSION['last_result'];

    if (isset($_POST['btnBerechnen'])) {
        if (is_numeric($op1) && is_numeric($op2)) {
            $ergebnis = $op1 + $op2;
            $_SESSION['last_result'] = $ergebnis; // Ergebnis für M+ merken
        } else {
            $ergebnis = 'Fehler';
            $_SESSION['last_result'] = '';
        }
    } elseif (isset($_POST['btnC'])) {
        $op1 = ''; $op2 = ''; $ergebnis = '';
        $_SESSION['last_result'] = '';
    } elseif (isset($_POST['btnMPlus'])) {
        if (is_numeric($_SESSION['last_result'])) {
            $_SESSION['memory'] = $_SESSION['last_result'];
        }
    } elseif (isset($_POST['btnMR'])) {
        // Speicherwert in Operand 1 laden
        if (is_numeric($_SESSION['memory'])) {
            $op1 = $_SESSION['memory'];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <title>Taschenrechner - Stufe 2</title>
</head>
<body>
    <h1>Taschenrechner</h1>
    <form action="Taschenrechner.php" method="post">
        <label>Operand 1: <input type="text" name="op1" value="<?php echo htmlspecialchars($op1); ?>"></label>
        <span> + </span>
        <label>Operand 2: <input type="text" name="op2" value="<?php echo htmlspecialchars($op2); ?>"></label>
        <span> = </span>
        <input type="text" value="<?php echo htmlspecialchars($ergebnis); ?>" readonly>
        <br><br>
        <input type="submit" name="btnBerechnen" value="Berechnen">
        <input type="submit" name="btnC" value="C">
        <input type="submit" name="btnMPlus" value="M+">
        <input type="submit" name="btnMR" value="MR">
    </form>
</body>
</html>