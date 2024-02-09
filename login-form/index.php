<?php 
   session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/style.css">
    <title>Login</title>    
</head>
<body>
        <div class="container">
            <div class="box form-box">
                <?php
                
                $con = mysqli_connect('localhost', 'root', '', 'login-form') or die("Erro ao conectar ao banco de dados");

                if(isset($_POST['submit'])){
                    $email = mysqli_real_escape_string($con,$_POST['username']);
                    $password = mysqli_real_escape_string($con,$_POST['password']);
                    
                    $result = mysqli_query($con,"SELECT * FROM users WHERE Email='$email' AND Password='$password' ") or die("Select Error");
                    $row = mysqli_fetch_assoc($result);

                    if(is_array($row) && !empty($row)){
                        $_SESSION['valid'] = $row['Email'];
                        $_SESSION['username'] = $row['Username'];
                        $_SESSION['CPF'] = $row['CPF'];
                        $_SESSION['id'] = $row['Id'];
                    } else {
                        echo "<div class='message'>
                        <p>Usuário ou Senha Incorretos</p>
                        </div> <br>";
                        echo "<a href='index.php'><button class='btn'>Voltar</button>";
                    }

                    if(isset($_SESSION['valid'])){
                        header("Location: home.php");
                    } 
                } else {

                ?>
                <header>Login</header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="username">Usuário</label>
                        <input type="text" name="username" id="username" placeholder="Usuário" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="password">Senha</label>
                        <input type="password" name="password" id="password" placeholder="Digite sua Senha" autocomplete="off" required>
                    </div>

                    <div class="field">
                        
                        <input type="submit" class="btn" name="submit" value="Login" required>
                    </div>
                    <div class="links">
                        Não possuí conta? <a href="register.php">Cadastre-se</a>
                    </div>
                </form>
            </div>
            <?php } ?>
        </div>
</body>
</html>