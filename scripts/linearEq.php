<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Linear Equation Solver</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <div class="result-container">
        <div class="result-card">
<?php
// Handle POST requests for the linear equation solver.
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $a1 = $_POST['a1'] ?? '';
    $b1 = $_POST['b1'] ?? '';
    $c1 = $_POST['c1'] ?? '';
    $a2 = $_POST['a2'] ?? '';
    $b2 = $_POST['b2'] ?? '';
    $c2 = $_POST['c2'] ?? '';

    $error = false;

    // Validate that each coefficient has been entered.
    if ($a1 === '' || $b1 === '' || $c1 === '' || $a2 === '' || $b2 === '' || $c2 === '') {
        echo '<h1>Error</h1>';
        echo '<div class="error-message">All fields must be filled.</div>';
        $error = true;
    }

    // Validate numeric input for all coefficients.
    if (!$error && (!is_numeric($a1) || !is_numeric($b1) || !is_numeric($c1) || !is_numeric($a2) || !is_numeric($b2) || !is_numeric($c2))) {
        echo '<h1>Error</h1>';
        echo '<div class="error-message">All inputs must be numbers.</div>';
        $error = true;
    }

    if (!$error) {
        // Convert the form values to floats for calculation.
        $a1 = floatval($a1);
        $b1 = floatval($b1);
        $c1 = floatval($c1);
        $a2 = floatval($a2);
        $b2 = floatval($b2);
        $c2 = floatval($c2);

        // Determinant of the coefficient matrix.
        $determinant = $a1 * $b2 - $a2 * $b1;

        if ($determinant == 0) {
            echo '<h1>Error</h1>';
            echo '<div class="error-message">The system has no unique solution.</div>';
            $error = true;
        }
    }

    if (!$error) {
        // Use Cramer's rule to solve for x and y.
        $x = ($c1 * $b2 - $c2 * $b1) / $determinant;
        $y = ($a1 * $c2 - $a2 * $c1) / $determinant;

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