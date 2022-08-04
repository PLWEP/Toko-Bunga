<?php 
$temp = "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Register</title>

    <!-- Styles -->
    <link rel='stylesheet' href='".BASEURL."/style/style.css'>

    <!-- Fonts -->
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap' rel='stylesheet'>
</head>
<body>
    <div class='container'>
    <div class='contenthead'>
        <h2>Register</h2>
        <a href='".BASEURL."/login' class='btn'>Kembali</a>
    </div>
    <form action='".BASEURL."/register/registerAction' method='post' enctype='multipart/form-data'> 
        
        <label for='email'>Email</label>
        <input type='text' id='email' name='temail'> 

        <label for='pass'>Password</label>
        <input type='text' id='pass' name='tpass'> 

        <label for='nama'>Nama</label>
        <input type='text' id='nama' name='tnama'>

        <label for='telp'>Telpon</label>
        <input type='text' id='telp' name='ttelp'> 

        <label for='alamat'>Alamat</label>
        <textarea id='alamat' name='talamat'></textarea> 
        
        <label for='gender'>Gender</label>
        <select name='tgender' id='gender'>
            <option value='2'>Perempuan</option>>
            <option value='1'>Laki-Laki</option>>
        </select>

        <button type='submit'>Register</button>	
	</form>
    </div>
</body>
</html> ";

echo $temp;
?>
