<?php
$temp = 
"<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>

    <title>Toko ABC</title>

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
            <h1>Toko ABC</h1>
            <div class='bar'>
                <a href='".BASEURL."/product' aria-current='page'><p>Home</p></a>
                <a href='".BASEURL."/Cart'><p>Keranjang</p></a>
                <a href='".BASEURL."/order'><p>Pesanan</p></a>
                <a href='".BASEURL."/login/logoutAction'><p>LogOut</p></a>
            </div>
        </div>
    </header>
    <div class='content'>
        <div class='container'>
    ";

echo $temp;
?>