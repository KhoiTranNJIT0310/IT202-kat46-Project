<?php
if (!isset($bottle_model1)) {
    $bottle_model1 = 0;
}
if (!isset($bottle_model2)) {
    $bottle_model2 = 0;
}
if (!isset($bottle_model3)) {
    $bottle_model3 = 0;
}

?>

<html>

<head>
    <title> Price calculator</title>
    <link rel="stylesheet" href="../style/Calculator.css">
</head>

<body>
    <?php if (!empty($error_message)) {  ?>
        <p style="color: red;"><?php echo htmlspecialchars($error_message); ?></p>
    <?php } ?>

    <h1>Price calculator</h1>
    <form class="calculator" action="Calculator-result.php" method="post">
        <div class="product-section">
        <!-- Reusable Water Bottle -->
            <div class="product">
                <div class="product-name">Reusable Water Bottle</div>
                <label class="item-name">Model 1: </label>
                <label class="item-price" name="bottle_model1_price"> 100</label>
                <input class="item-quantity" type="number" name="bottle_model1" value="<?php echo htmlspecialchars($bottle_model1); ?>" />
                <br>
                <label class="item-name">Model 2: </label>
                <label class="item-price" name="bottle_model1_price"> 120</label>
                <input class="item-quantity" type="number" name="bottle_model2" value="<?php echo htmlspecialchars($bottle_model2); ?>" />
                <br>
                <label class="item-name">Model 3:</label>
                <label class="item-price" name="bottle_model1_price"> 150</label>
                <input class="item-quantity" type="number" name="bottle_model3" value="<?php echo htmlspecialchars($bottle_model3); ?>" />
                <br>
            </div>
<!-- Bamboo Toothbrush Set -->
            <div class="product">
                <div class="product-name">Bamboo Toothbrush Set</div>
                <label class="item-name">Model 1: </label>
                <label class="item-price" name="bottle_model1_price"> 100</label>
                <input class="item-quantity" type="number" name="bottle_model1" value="<?php echo htmlspecialchars($bottle_model1); ?>" />
                <br>
                <label class="item-name">Model 2: </label>
                <label class="item-price" name="bottle_model1_price"> 120</label>
                <input class="item-quantity" type="number" name="bottle_model2" value="<?php echo htmlspecialchars($bottle_model2); ?>" />
                <br>
                <label class="item-name">Model 3:</label>
                <label class="item-price" name="bottle_model1_price"> 150</label>
                <input class="item-quantity" type="number" name="bottle_model3" value="<?php echo htmlspecialchars($bottle_model3); ?>" />
                <br>
            </div>
            <!-- Solar-powered Charger -->
            <div class="product">
                <div class="product-name">Solar-powered Charger</div>
                <label class="item-name">Model 1: </label>
                <label class="item-price" name="bottle_model1_price"> 100</label>
                <input class="item-quantity" type="number" name="bottle_model1" value="<?php echo htmlspecialchars($bottle_model1); ?>" />
                <br>
                <label class="item-name">Model 2: </label>
                <label class="item-price" name="bottle_model1_price"> 120</label>
                <input class="item-quantity" type="number" name="bottle_model2" value="<?php echo htmlspecialchars($bottle_model2); ?>" />
                <br>
                <label class="item-name">Model 3:</label>
                <label class="item-price" name="bottle_model1_price"> 150</label>
                <input class="item-quantity" type="number" name="bottle_model3" value="<?php echo htmlspecialchars($bottle_model3); ?>" />
                <br>
            </div>
            <!-- Eco-friendly Shopping Bags -->
            <div class="product">
                <div class="product-name">Eco-friendly Shopping Bags</div>
                <label class="item-name">Model 1: </label>
                <label class="item-price" name="bottle_model1_price"> 100</label>
                <input class="item-quantity" type="number" name="bottle_model1" value="<?php echo htmlspecialchars($bottle_model1); ?>" />
                <br>
                <label class="item-name">Model 2: </label>
                <label class="item-price" name="bottle_model1_price"> 120</label>
                <input class="item-quantity" type="number" name="bottle_model2" value="<?php echo htmlspecialchars($bottle_model2); ?>" />
                <br>
                <label class="item-name">Model 3:</label>
                <label class="item-price" name="bottle_model1_price"> 150</label>
                <input class="item-quantity" type="number" name="bottle_model3" value="<?php echo htmlspecialchars($bottle_model3); ?>" />
                <br>
            </div>
            <!-- LED Bulbs -->
            <div class="product">
                <div class="product-name">LED Bulbs</div>
                <label class="item-name">Model 1: </label>
                <label class="item-price" name="bottle_model1_price"> 100</label>
                <input class="item-quantity" type="number" name="bottle_model1" value="<?php echo htmlspecialchars($bottle_model1); ?>" />
                <br>
                <label class="item-name">Model 2: </label>
                <label class="item-price" name="bottle_model1_price"> 120</label>
                <input class="item-quantity" type="number" name="bottle_model2" value="<?php echo htmlspecialchars($bottle_model2); ?>" />
                <br>
                <label class="item-name">Model 3:</label>
                <label class="item-price" name="bottle_model1_price"> 150</label>
                <input class="item-quantity" type="number" name="bottle_model3" value="<?php echo htmlspecialchars($bottle_model3); ?>" />
                <br>
            </div>

        </div>
        <div class="input"><input type="submit" value="Calculate" /></div>

    </form>
</body>
<?php   ?>
        <p style="color: blue;"><?php echo htmlspecialchars($total_prize); ?></p>
    <?php  ?>

</html>