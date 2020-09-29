<?php
        ob_start();
        session_start();
        include 'config/database.php';
        $sql=$mysqli->query("SELECT * FROM tb_identitas");
        $tampil= $sql -> fetch_assoc();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>PEMBAYARAN SPP</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo" style="text-align: center; color: white;">
            <img src="images/logo.jpg" width="120" height="120" style="width: 100px;height: 100px;border-radius: 20%; border-image: 20px; border-color: black;">
            <h4> SISTEM INFORMASI PEMBAYARAN SPP<br> <?php echo strtoupper($tampil['nama_universitas'])?></h4>

        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST">
                    <div class="msg">Masukan Username & Password</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-xs-4" style="float: right">
                            <button  class="btn btn-block bg-blue waves-effect" type="submit" id="login" name="login">LOGIN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>
</body>

</html>

<?php

  if (isset($_POST ['login'])) {
    $username = @$_POST['username'];
    $pass = md5(@$_POST['password']);

    //users
    $sql = $mysqli -> query ("SELECT * FROM tb_user WHERE username ='$username' AND password ='$pass'");

    $data = $sql -> fetch_assoc();

    $ketemu = $sql -> num_rows;



    //mahasiswa
    $sql1 = $mysqli -> query ("SELECT * FROM tb_mahasiswa WHERE nim ='$username' AND password ='$pass'");

    $data1 = $sql1 -> fetch_assoc();

    $ketemu1 = $sql1 -> num_rows;


    if ($ketemu >= 1) {
      session_start();
     
        if($data['level'] == "admin") {

            $_SESSION ['admin'] = $username;

            $_SESSION ['username']=$data['kode_user'];
            $_SESSION ['level']='admin';
        
            header("location:menu.php");

        }else if($data['level'] == "bendahara") {

            $_SESSION ['bendahara'] = $username;

            $_SESSION ['username']=$data['kode_user'];
            $_SESSION ['level']='bendahara';
        
            header("location:menu.php");
        }else if($data['level'] == "pimpinan") {

            $_SESSION ['pimpinan'] = $username;

            $_SESSION ['username']=$data['kode_user'];
            $_SESSION ['level']='pimpinan';
        
            header("location:menu.php");
        }
    } elseif ($ketemu1 >= 1) {
        session_start();
        $_SESSION ['mahasiswa'] = $username;
        $_SESSION ['username']=$data1['nim'];
        $_SESSION ['level']='mahasiswa';
        header("location:menu.php");

    }else {
      ?>
      <script type="text/javascript">
        alert ("Login Gagal, Username dan Password Anda SALAH")
      </script>

     <?php
   }

}
?>