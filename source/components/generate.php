<!-- Khoi Tran 
Febuary 16th 2024
IT 202-002
Phase 1 Assignment: HTML5 and PHP Form
kat46@njit.edu -->
<?php
// get the data from the form
$fname = filter_input(INPUT_POST, 'fname');
$lname = filter_input(INPUT_POST, 'lname');
$address = filter_input(INPUT_POST, 'address');
$city = filter_input(INPUT_POST, 'city');
$state = filter_input(INPUT_POST, 'state');
$zipcode = filter_input(INPUT_POST, 'fname');
$number = filter_input(INPUT_POST, 'number', FILTER_VALIDATE_INT);
$length = filter_input(INPUT_POST, 'length', FILTER_VALIDATE_INT);
$width = filter_input(INPUT_POST, 'width', FILTER_VALIDATE_INT);
$height = filter_input(INPUT_POST, 'height', FILTER_VALIDATE_INT);
$declared_value = filter_input(INPUT_POST, 'declared_value', FILTER_VALIDATE_INT);
$shipping_company = filter_input(INPUT_POST, 'shipping_company',);
$date = strtotime($_POST['date']);
$newdate = date('Y-m-d', $date);
$next_day = filter_input(INPUT_POST, 'next_day');
$priority = filter_input(INPUT_POST, 'priority');
// createing an error message
$error_message = '';
// validate first name
if ($fname === '' || $fname === FALSE) {
    $error_message = "First Name cannot be empty";
}
// validate last name
if ($lname === '' || $lname === FALSE) {
    $error_message = "Last Name cannot be empty";
}
// validate address
if ($address === '' || $address === FALSE) {
    $error_message = "Address cannot be empty";
}
// validate city
if ($city === '' || $city === FALSE) {
    $error_message = "City cannot be empty";
}
// validate zip code
if ($zipcode === '' || $zipcode === FALSE) {
    $error_message = "Zip Code cannot be empty";
}
// validate length
if ($length === false || $length < 0 || $length > 36) {
    $error_message = "Width cannot be empty, less than 0 or greater than 36 inches";
}
// validate width
if ($width === false || $width < 0 || $height > 36) {
    $error_message = "Width cannot be empty, less than 0 or greater than 36 inches";
}
// validate height
if ($height === false || $height < 0 || $height > 36) {
    $error_message = "Width cannot be empty, less than 0 or greater than 36 inches";
}
// validate declared value
if ($declared_value === false || $declared_value < 0 || $declared_value  > 1000) {
    $error_message = "Declared value cannot be empty or less than 0";
}
if ($shipping_company === false || $shipping_company === '') {
    $error_message = "Shipping Company cannot be empty";
}
// validate shipping company
if ($next_day === '' && $priority === '') {
    $error_message = "Shipping Class cannot be empty";
}
// if an error message exists, go back to the form
if ($error_message != '') {
    include('shipping.php');
    exit();
}

// creating variable
$dimension = $length . 'x' . $width . 'x' . $height . ' inches';
$declared_value = '$' . $declared_value;
$date = '';
// condition for the shipping class
if ($next_day == true && $priority == true) {
    $shipping_class = $next_day ." & " . $priority;   
}
else{
    $shipping_class = $next_day ." " . $priority;
}

?>
<!-- html content -->
<html>

<head>
    <link rel="stylesheet" href="../style/generate.css">
    <link rel="icon" href="../images/logo.png" type="image/png">
</head>

<body>
    <!-- wrapper cover the whole page -->
    <div class="generate-wrapper">
        <!-- OUt content -->
        <div class="generate">
            <!-- Package dimension -->
            <div class="detail">
                <label>Package Dimensions:</label>
                <span><?php echo $dimension; ?></span>
                <br>
            </div>
            <!-- declaed value -->
            <div class="detail">
                <label>Package declared Value:</label>
                <span><?php echo $declared_value; ?></span>
                <br>
            </div>
            <!-- shipping company -->
            <div class="detail">
                <label>Shipping Company:</label>
                <span><?php echo $shipping_company; ?></span>
                <br>
            </div>
            <!-- shipping class -->
            <div class="detail">
                <label>Shipping Class:</label>
                <span><?php echo $shipping_class; ?></span>
                <br>
            </div>
            <!-- tracking number -->
            <div class="detail">
                <label>Tracking Number:</label>
                <span>A1234567890</span>
                <br>
            </div>
            <!-- barcode example -->
            <div class="detail">
                <img src="../images/barcode.jpg" alt="">
                <br>
            </div>
            <!-- Order number -->
            <div class="detail">
                <label>Order Number:</label>
                <span><?php echo $number; ?></span>
                <br>
            </div>
            <!-- date -->
            <div class="detail">
                <label>Ship Date:</label>
                <span><?php echo $newdate; ?></span>
            </div>
        </div>
    </div>
<?php 
include("footer.php");
?>
</body>

</html>