<?php
$op1 = '';
$op2 = '';
$ergebnis = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $op1 = isset($_POST['op1']) ? trim($_POST['op1']) : '';
    $op2 = isset($_POST['op2']) ? trim($_POST['op2']) : '';
    
    if (isset($_POST['btnBerechnen'])) {
        if (is_numeric($op1) && is_numeric($op2)) {
            $ergebnis = $op1 + $op2; 
        } else {
            $ergebnis = 'Fehler';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <title>Taschenrechner - Stufe 1</title>
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
    </form>
</body>
</html>