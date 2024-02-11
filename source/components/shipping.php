<html>
<header>
    <link rel="stylesheet" href="../style/shipping.css">
    <link rel="icon" href="../images/logo.png" type="image/png">
</header>
<?php
include("navbar.php");
if (!isset($fname)) {
    $fname = '';
}
if (!isset($lname)) {
    $lname = '';
}
if (!isset($address)) {
    $address = '';
}
if (!isset($city)) {
    $city = '';
}
if (!isset($state)) {
    $state = '';
}
if (!isset($zipcode)) {
    $zipcode = '';
}
if (!isset($number)) {
    $number = '';
}
if (!isset($length)) {
    $length = '';
}
if (!isset($width)) {
    $width = '';
}
if (!isset($height)) {
    $height = '';
}
if (!isset($declared_value)) {
    $declared_value = '';
}
?>

<div class="shipping-wrapper">
    <div class="heading">Shipping label generator</div>
    <?php if (!empty($error_message)) {  ?>
    <h1 style="color: red;"><?php echo htmlspecialchars($error_message); ?></h1>
<?php } ?>
    <div class="shipping">
        <form action="generate.php" method="post">
            <div class="recipient">
                <div class="title">Recipient's Address</div>
                <div class="adress">
                        <label for="">First Name:</label>
                        <input type="text" name="fname" value="<?php echo htmlspecialchars($fname); ?>">
                        <label for="">Last Name:</label>
                        <input type="text" name="lname" value="<?php echo htmlspecialchars($lname); ?>">
                        <label for="">Street Address:</label>
                        <input type="text" name="address" value="<?php echo htmlspecialchars($address); ?>">
                        <label for="">City:</label>
                        <input type="text" name="city" value="<?php echo htmlspecialchars($city); ?>">
                        <label for="">State:</label>
                        <input type="text" name="state" value="<?php echo htmlspecialchars($state); ?>">
                        <label for="">Zip Code:</label>
                        <input type="text" name="zipcode" value="<?php echo htmlspecialchars($zipcode); ?>">
                </div>

            </div>

            <!-- Package details -->

            <div class="title" >Package Information</div>
            <div class="package">
                <div class="item">
                    <label for="">Ship Date:</label>
                    <input type="date" name="date" value="<?php echo date('Y-m-d'); ?>">
                    <label for="">Order Number:</label>
                    <input type="text" min="1" name="number" value="<?php echo htmlspecialchars($number); ?>">
                    <label for="">Package Length (in inches):</label>
                    <input type="number" min="1" name="length" value="<?php echo htmlspecialchars($length); ?>">
                    <label for="">Package Width (in inches):</label>
                    <input type="number" min="1" name="width" value="<?php echo htmlspecialchars($width); ?>">
                    <label for="">Package Height (in inches):</label>
                    <input type="number" min="1" name="height" value="<?php echo htmlspecialchars($height); ?>">
                    <label for="">Total Declared Value ($):</label>
                    <input type="number" min="1" name="declared_value" value="<?php echo htmlspecialchars($declared_value); ?>">
                    <label for="">Shipping Company:</label>
                    <select name="shipping_company" value="<?php echo $shipping_company ?>">
                        <option value=""></option>
                        <option value="USPS">USPS</option>
                        <option value="UPS">UPS</option>
                        <option value="FedEx">FedEx</option>
                    </select>
                    <label for="">Shipping Class</label>
                    <input type="checkbox" name="next_day" value="Next Day Air">
                    <label for="next_day">Next Day Air</label>
                    <input type="checkbox" name="priority" value="Priority Mail">
                    <label for="priority"> Priority Mail</label>
                </div>

            </div>

    </div>
    <input class ="button" type="submit" value="Generate Label">
    </form>
</div>
</div>

</html>