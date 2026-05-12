<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator Result</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <div class="result-container">
        <div class="result-card">
<?php
// Only handle POST requests from the simple calculator form.
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize numeric inputs to avoid injection or invalid characters.
    $num1 = filter_input(INPUT_POST, 'num1', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $num2 = filter_input(INPUT_POST, 'num2', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $operation = $_POST['operation'] ?? '';

    // Initialize variables used by validation and output.
    $result = 0;
    $error = false;
    $op_name = $operation;

    // Validate that both inputs are present and numeric.
    if (empty($num1) || empty($num2) || empty($operation)) {
        echo '<h1>Error</h1>';
        echo '<div class="error-message">All fields must be filled.</div>';
        $error = true;
    }

    if (!$error && (!is_numeric($num1) || !is_numeric($num2))) {
        echo '<h1>Error</h1>';
        echo '<div class="error-message">Both inputs must be numbers.</div>';
        $error = true;
    }

    // Convert numeric strings to floating point values for calculation.
    if (!$error) {
        $num1 = floatval($num1);
        $num2 = floatval($num2);
    }

    // Perform the chosen operation only after validation.
    if (!$error) {
        switch ($operation) {
            case "add":
                $result = $num1 + $num2;
                $op_name = "Addition";
                break;
            case "subtract":
                $result = $num1 - $num2;
                $op_name = "Subtraction";
                break;
            case "multiply":
                $result = $num1 * $num2;
                $op_name = "Multiplication";
                break;
            case "divide":
                if ($num2 == 0) {
                    echo '<h1>Error</h1>';
                    echo '<div class="error-message">Division by zero is not allowed.</div>';
                    $error = true;
                } else {
                    $result = $num1 / $num2;
                    $op_name = "Division";
                }
                break;
            default:
                echo '<h1>Error</h1>';
                echo '<div class="error-message">Invalid operation.</div>';
                $error = true;
                break;
        }
    }

    // Output result details if there were no validation errors.
    if (!$error) {
        echo '<h1>' . htmlspecialchars($op_name) . '</h1>';
        echo '<div class="result-details">';
        echo '<p><strong>First Number:</strong> ' . number_format($num1, 4) . '</p>';
        echo '<p><strong>Operation:</strong> ' . htmlspecialchars($op_name) . '</p>';
        echo '<p><strong>Second Number:</strong> ' . number_format($num2, 4) . '</p>';
        echo '</div>';
        echo '<div class="result-value">' . number_format($result, 4) . '</div>';
    }
}
?>
            <a href="../index.php" class="back-button">← Back to Calculator</a>
        </div>
    </div>
</body>
</html>