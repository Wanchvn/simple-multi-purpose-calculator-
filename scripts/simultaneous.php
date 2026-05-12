<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simultaneous Equations Result</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <div class="result-container">
        <div class="result-card">
<?php
// Handle POST requests for simultaneous equation solving.
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $x1 = $_POST['x1'] ?? '';
    $y1 = $_POST['y1'] ?? '';
    $z1 = $_POST['z1'] ?? '';
    $x2 = $_POST['x2'] ?? '';
    $y2 = $_POST['y2'] ?? '';
    $z2 = $_POST['z2'] ?? '';

    $error = false;

    // Validate all input fields are filled.
    if ($x1 === '' || $y1 === '' || $z1 === '' || $x2 === '' || $y2 === '' || $z2 === '') {
        echo '<h1>Error</h1>';
        echo '<div class="error-message">All fields must be filled.</div>';
        $error = true;
    }

    // Validate numeric input for the system coefficients and constants.
    if (!$error && (!is_numeric($x1) || !is_numeric($y1) || !is_numeric($z1) || !is_numeric($x2) || !is_numeric($y2) || !is_numeric($z2))) {
        echo '<h1>Error</h1>';
        echo '<div class="error-message">All inputs must be numbers.</div>';
        $error = true;
    }

    if (!$error) {
        $x1 = floatval($x1);
        $y1 = floatval($y1);
        $z1 = floatval($z1);
        $x2 = floatval($x2);
        $y2 = floatval($y2);
        $z2 = floatval($z2);

        // Calculate the determinant of the coefficient matrix.
        $determinant = $x1 * $y2 - $x2 * $y1;

        if ($determinant == 0) {
            echo '<h1>Error</h1>';
            echo '<div class="error-message">The system has no unique solution.</div>';
            $error = true;
        }
    }

    if (!$error) {
        // Solve the system using Cramer's rule.
        $x = ($z1 * $y2 - $z2 * $y1) / $determinant;
        $y = ($x1 * $z2 - $x2 * $z1) / $determinant;

        echo '<h1>Solution</h1>';
        echo '<div class="result-details">';
        echo '<p><strong>x:</strong> ' . round($x, 4) . '</p>';
        echo '<p><strong>y:</strong> ' . round($y, 4) . '</p>';
        echo '</div>';
    }
} else {
    echo '<h1>Error</h1>';
    echo '<div class="error-message">Invalid request method.</div>';
}
?>
            <a href="../index.php" class="back-button">← Back to Calculator</a>
        </div>
    </div>
</body>
</html>