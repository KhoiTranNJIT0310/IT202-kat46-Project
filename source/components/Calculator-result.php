<?php
print_r($_POST);
$bottle_model1_price = 100;
$bottle_model2_price = 120;
$bottle_model3_price = 150;
// Get data from the form
$bottle_model1 = filter_input(INPUT_POST, 'bottle_model1', FILTER_VALIDATE_INT);
$bottle_model2 = filter_input(INPUT_POST, 'bottle_model2', FILTER_VALIDATE_INT);
$bottle_model3 = filter_input(INPUT_POST, 'bottle_model3', FILTER_VALIDATE_INT);

$error_message = '';
// validate investment
if ($bottle_model1 === false || $bottle_model1 < 0) {
    $error_message = "Model 1 of Bottle is invalid";
}
if ($error_message != '') {
    include('Calculator.php');
    exit();
  }
// calculate the future value
$total_prize = $bottle_model1_price * $bottle_model1 + $bottle_model3_price * $bottle_model3 + $bottle_model3_price * $bottle_model3;

if ($total_prize) {
    include('Calculator.php');
    exit();
  }
?>



<html>

<head>
    <title> Price calculator</title>
</head>

<body>

    <div class="total_price">
        <label for="">Your total price is:</label>
        <span><?php echo htmlspecialchars($total_prize) ?></span>
    </div>
</body>

</html>