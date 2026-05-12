<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compound Interest Calculator Result</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <div class="result-container">
        <div class="result-card">
<?php
// Only process POST submissions from the compound interest form.
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $principal = $_POST['principal'] ?? '';
    $rate = $_POST['rate'] ?? '';
    $time = $_POST['time'] ?? '';

    $error = false;

    // Validate required fields.
    if ($principal === '' || $rate === '' || $time === '') {
        echo '<h1>Error</h1>';
        echo '<div class="error-message">All fields must be filled.</div>';
        $error = true;
    }

    // Validate numeric input after empty-field check.
    if (!$error && (!is_numeric($principal) || !is_numeric($rate) || !is_numeric($time))) {
        echo '<h1>Error</h1>';
        echo '<div class="error-message">All inputs must be numbers.</div>';
        $error = true;
    }

    if (!$error) {
        $principal = floatval($principal);
        $rate = floatval($rate);
        $time = floatval($time);

        // Calculate the compound interest amount using A = P * (1 + r/100)^t.
        $amount = $principal * pow(1 + $rate / 100, $time);
        $interest = $amount - $principal;

        echo '<h1>Compound Interest</h1>';
        echo '<div class="result-details">';
        echo '<p><strong>Principal:</strong> ' . number_format($principal, 2) . '</p>';
        echo '<p><strong>Rate:</strong> ' . number_format($rate, 2) . '%</p>';
        echo '<p><strong>Time:</strong> ' . number_format($time, 2) . ' years</p>';
        echo '</div>';
        echo '<div class="result-message">Interest: ' . number_format($interest, 2) . '</div>';
        echo '<div class="result-message">Total Amount: ' . number_format($amount, 2) . '</div>';
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