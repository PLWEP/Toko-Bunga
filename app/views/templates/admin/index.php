<?php
$temp = 
"<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>

    <title>Toko Bunga</title>

    <!-- Styles -->
    <link rel='stylesheet' href='".BASEURL."/style/style.css'>

    <!-- Fonts -->
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap' rel='stylesheet'>
</head>
<body>
    <header>
        <div class='container'>
            <h1>Toko Bunga</h1>
            <div class='bar'>
                <a href='".BASEURL."/home' aria-current='page'><p>Home</p></a>
                <a href='".BASEURL."/product'><p>Product</p></a>
                <a href='".BASEURL."/transaction'><p>Order</p></a>
                <a href='".BASEURL."/member'><p>Member</p></a>
                <a href='".BASEURL."/account/logoutAction'><p>LogOut</p></a>
            </div>
        </div>
    </header>
    <div class='content'>
        <div class='container'>
    ";

echo $temp;
?>