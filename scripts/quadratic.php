<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quadratic Solver</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <div class="result-container">
        <div class="result-card">
<?php
// Handle POST requests from the quadratic equation form.
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $a = $_POST['a'] ?? '';
    $b = $_POST['b'] ?? '';
    $c = $_POST['c'] ?? '';

    $error = false;

    // Validate that every coefficient was submitted.
    if ($a === '' || $b === '' || $c === '') {
        echo '<h1>Error</h1>';
        echo '<div class="error-message">All fields must be filled.</div>';
        $error = true;
    }

    // Validate that inputs are numeric values.
    if (!$error && (!is_numeric($a) || !is_numeric($b) || !is_numeric($c))) {
        echo '<h1>Error</h1>';
        echo '<div class="error-message">All inputs must be numbers.</div>';
        $error = true;
    }

    if (!$error) {
        $a = floatval($a);
        $b = floatval($b);
        $c = floatval($c);

        // The coefficient a must not be zero for a quadratic equation.
        if ($a == 0) {
            echo '<h1>Error</h1>';
            echo '<div class="error-message">A cannot be 0 in a quadratic equation.</div>';
            $error = true;
        }
    }

    if (!$error) {
        // Calculate the discriminant to determine root type.
        $discriminant = $b * $b - 4 * $a * $c;

        if ($discriminant > 0) {
            // Two distinct real roots.
            $root1 = (-$b + sqrt($discriminant)) / (2 * $a);
            $root2 = (-$b - sqrt($discriminant)) / (2 * $a);
            echo '<h1>Roots</h1>';
            echo '<div class="result-message">Root 1: ' . round($root1, 2) . '</div>';
            echo '<div class="result-message">Root 2: ' . round($root2, 2) . '</div>';
        } elseif ($discriminant == 0) {
            // One repeated real root.
            $root = -$b / (2 * $a);
            echo '<h1>Root</h1>';
            echo '<div class="result-message">Root: ' . round($root, 2) . '</div>';
        } else {
            // Complex roots: compute real and imaginary parts.
            $realPart = -$b / (2 * $a);
            $imagPart = sqrt(-$discriminant) / (2 * $a);
            $root1 = $realPart . ' + ' . round($imagPart, 2) . 'i';
            $root2 = $realPart . ' - ' . round($imagPart, 2) . 'i';
            echo '<h1>Complex Roots</h1>';
            echo '<div class="result-message">Root 1: ' . $root1 . '</div>';
            echo '<div class="result-message">Root 2: ' . $root2 . '</div>';
        }
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
