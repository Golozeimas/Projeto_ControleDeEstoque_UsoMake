<?php 
include "../user/connection.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Login</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="css/matrix-login.css"/>
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
<div id="loginbox">
    <form name="form1" class="form-vertical" action="" method="post">
        <div class="control-group normal_text"><h3>Admin - Estoque Uso Make</h3></div>

       
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user"></i></span>
                    <input type="text" placeholder="Usuário" name="username" required/>
                </div>
            </div>
        </div>

        
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock"></i></span>
                    <input type="password" placeholder="Senha" name="password" required/>
                </div>
            </div>
        </div>

        
        <div class="form-actions">
            <center>
                <input type="submit" name="submit1" value="Login" class="btn btn-success"/>
            </center>
        </div>
    </form>

    <?php
    if (isset($_POST["submit1"])) {
        
        $usuario = mysqli_real_escape_string($link, $_POST["username"]);
        $senha   = mysqli_real_escape_string($link, $_POST["password"]);

        $res = mysqli_query(
            $link,
            "SELECT * FROM user_registration 
             WHERE username='$usuario' 
               AND password='$senha'
               AND role='admin'
               AND status='active'"
        );

        if (!$res) {
            die("Erro na consulta: " . mysqli_error($link));
        }

        if (mysqli_num_rows($res) > 0) {
            
            session_start();
            $_SESSION['username'] = $usuario;
            echo "<script>alert('Login realizado com sucesso!');
            window.location='demo.php';</script>";
        } else {
            
            echo "<script>alert('Usuário ou senha incorretos');</script>";
        }
    }
    ?>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/matrix.login.js"></script>
</body>
</html>
