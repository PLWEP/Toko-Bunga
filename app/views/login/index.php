<?php 
$temp = "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Login</title>

    <!-- Styles -->
    <link rel='stylesheet' href='".BASEURL."/style/style.css'>

    <!-- Fonts -->
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap' rel='stylesheet'>
</head>
<body>
    <div class='container'>
        <section class='validation'>
            <div class='contenthead'>
                <h2>Login</h2>
                <a href='".BASEURL."' class='btn'>Kembali</a>
            </div>
            <form action='".BASEURL."/login/loginAction' method='post'>
                    <label for='email'><b>Email</b></label>
                    <input type='text' placeholder='Masukan Email' name='temail' required>

                    <label for='pass'><b>Password</b></label>
                    <input type='password' placeholder='Masukan Password' name='tpass' required>

                    <button type='submit' name='login'>Login</button>
            </form>
            <a href='".BASEURL."/register' class='register'>Belum punya akun?? Register disini</a>
    </section>
    </div>
</body>
</html> ";

echo $temp;
?>