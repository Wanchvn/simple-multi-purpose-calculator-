<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Calculator Result</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <div class="result-container">
        <div class="result-card">
<?php
// Only process POST requests submitted from the BMI calculator form.
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $weight = $_POST['weight'] ?? '';
    $height = $_POST['height'] ?? '';

    $error = false;

    // Ensure both weight and height are provided.
    if ($weight === '' || $height === '') {
        echo '<h1>Error</h1>';
        echo '<div class="error-message">All fields must be filled.</div>';
        $error = true;
    }

    // Validate numeric values once the fields are confirmed present.
    if (!$error && (!is_numeric($weight) || !is_numeric($height))) {
        echo '<h1>Error</h1>';
        echo '<div class="error-message">Both inputs must be numbers.</div>';
        $error = true;
    }

    if (!$error) {
        $weight = floatval($weight);
        $height = floatval($height);

        // Both input values must be greater than zero.
        if ($weight <= 0 || $height <= 0) {
            echo '<h1>Error</h1>';
            echo '<div class="error-message">Weight and height must be greater than zero.</div>';
            $error = true;
        }
    }

    if (!$error) {
        // Calculate BMI using the standard formula.
        $bmi = $weight / ($height * $height);

        // Determine BMI category.
        if ($bmi < 18.5) {
            $category = 'Underweight';
        } elseif ($bmi < 25) {
            $category = 'Normal weight';
        } elseif ($bmi < 30) {
            $category = 'Overweight';
        } else {
            $category = 'Obesity';
        }

        echo '<h1>BMI Result</h1>';
        echo '<div class="result-details">';
        echo '<p><strong>Weight:</strong> ' . number_format($weight, 2) . ' kg</p>';
        echo '<p><strong>Height:</strong> ' . number_format($height, 2) . ' m</p>';
        echo '</div>';
        echo '<div class="result-message">BMI: ' . number_format($bmi, 2) . '</div>';
        echo '<div class="result-message">Category: ' . htmlspecialchars($category) . '</div>';
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
