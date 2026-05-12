<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculators</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <h1>Multi-Calculator</h1>
    <div class="calculator-container">
        <div class="calculator">
            <h2>Simple Calculator</h2>
            <form action="scripts/simpleCal.php" method="post">
                <input type="number" name="num1" placeholder="Enter first number">
                <input type="number" name="num2" placeholder="Enter second number">
                <select name="operation">
                    <option value="add">Add</option>
                    <option value="subtract">Subtract</option>
                    <option value="multiply">Multiply</option>
                    <option value="divide">Divide</option>
                </select>
                <button type="submit">Calculate</button>
            </form>
        </div>

        <div class="calculator">
            <h2>Quadratic Equation Solver</h2>
            <form action="scripts/quadratic.php" method="post">
                <input type="number" name="a" placeholder="Enter coefficient a">
                <input type="number" name="b" placeholder="Enter coefficient b">
                <input type="number" name="c" placeholder="Enter coefficient c">
                <button type="submit">Solve Quadratic</button>
            </form>
        </div>

        <div class="calculator">
            <h2>Simultaneous Equations Solver</h2>
            <form action="scripts/simultaneous.php" method="post">
                <input type="number" name="x1" placeholder="Enter x1">
                <input type="number" name="y1" placeholder="Enter y1">
                <input type="number" name="z1" placeholder="Enter z1">
                <input type="number" name="x2" placeholder="Enter x2">
                <input type="number" name="y2" placeholder="Enter y2">
                <input type="number" name="z2" placeholder="Enter z2">
                <button type="submit">Solve Simultaneous</button>
            </form>
        </div>

        <div class="calculator">
            <h2>Linear Equations Solver</h2>
            <form action="scripts/linearEq.php" method="post">
                <input type="number" name="a1" placeholder="Enter coefficient a1">
                <input type="number" name="b1" placeholder="Enter coefficient b1">
                <input type="number" name="c1" placeholder="Enter coefficient c1">
                <input type="number" name="a2" placeholder="Enter coefficient a2">
                <input type="number" name="b2" placeholder="Enter coefficient b2">
                <input type="number" name="c2" placeholder="Enter coefficient c2">
                <button type="submit">Solve Linear Equations</button>
            </form>
        </div>

        <div class="calculator">
            <h2>Simple Interest Calculator</h2>
            <form action="scripts/SimpleInterestCalculator.php" method="post">
                <input type="number" name="principal" placeholder="Enter principal amount">
                <input type="number" name="rate" placeholder="Enter interest rate">
                <input type="number" name="time" placeholder="Enter time in years">
                <button type="submit">Calculate Simple Interest</button>
            </form>
        </div>

        <div class="calculator">
            <h2>Compound Interest Calculator</h2>
            <form action="scripts/CompoundInterestCalculator.php" method="post">
                <input type="number" name="principal" placeholder="Enter principal amount">
                <input type="number" name="rate" placeholder="Enter interest rate">
                <input type="number" name="time" placeholder="Enter time in years">
                <button type="submit">Calculate Compound Interest</button>
            </form>
        </div>

        <div class="calculator">
            <h2>BMI Calculator</h2>
            <form action="scripts/BMICalculator.php" method="post">
                <input type="number" name="weight" placeholder="Enter weight in kg">
                <input type="number" name="height" placeholder="Enter height in meters">
                <button type="submit">Calculate BMI</button>
            </form>
        </div>
    </div>
    
</body>
</html>