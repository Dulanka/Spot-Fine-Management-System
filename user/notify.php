<?php

$merchant_id         = $_POST['merchant_id'];
$order_id             = $_POST['order_id'];
$payhere_amount     = $_POST['payhere_amount'];
$payhere_currency    = $_POST['payhere_currency'];
$status_code         = $_POST['status_code'];
$md5sig                = $_POST['md5sig'];

$merchant_secret = 'MzA2MzU5OTQ0MjMxMTA3OTY4NDMxODc1NzQ2NzY4MzE4NDk5NTU='; // Replace with your Merchant Secret (Can be found on your PayHere account's Settings page)

$local_md5sig = strtoupper (md5 ( $merchant_id . $order_id . $payhere_amount . $payhere_currency . $status_code . strtoupper(md5($merchant_secret)) ) );

if ($status_code == 2){
        //TODO: Update your database as payment success
        include("../connection.php");
        mysqli_query($conn, "UPDATE issued_fines SET status = 'paid', paid_date = NOW() WHERE ref_no = '$order_id'");
}
?>