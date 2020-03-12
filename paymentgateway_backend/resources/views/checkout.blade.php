<?php
$orderAmount = $_POST["amount"];
$customerName = $_POST["userName"];
$customerPhone = $_POST["phone"];
$customerEmail = $_POST["email"];
echo $customerPhone . "|" . $orderAmount;
?>