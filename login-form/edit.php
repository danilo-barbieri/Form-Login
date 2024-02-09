<?php
session_start();
include("php/config.php");
if(!isset($_SESSION['valid'])){
    header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Alterar Perfil</title>
</head>
<body>

    <div class="nav">
        <div class="logo">
            <p><a href="home.php">Logo</a></p>
        </div>

        <div class="right-liks">
            <a href="#">Alterar Perfil</a>
            <a href="php/logout.php"> <button class="btn">Deslogar</button> </a>
        </div>
    </div>    

    <div class="container">
        <div class="box form-box">
            
            <?php
                if(isset($_POST['submit'])){
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $CPF = $_POST['CPF'];

                    $id = $_SESSION['id'];

                    $edit_query = mysqli_query($con,"UPDATE users SET Username='$username', Email='$email', CPF='$CPF' WHERE Id=$") or die("Ocorreu um erro");
                
                    if($edit_query){
                        echo "<div class='message'>
                        <p>Perfil Atualizado!</p>
                        </div> <br>";
                        echo "<a href='home.php'><button class='btn'>Voltar</button>";
                    }
                } else {

                    $id = $_SESSION['id'];
                    $query = mysqli_query($con,"SELECT * FROM users WHERE Id=$id") or die("Ocorreu um erro");
                    
                    while($row = mysqli_fetch_array($query)){
                    $username = $row['Username'];
                    $email = $row['Email'];
                    $CPF = $row['CPF'];
                }
            ?>

            <header>Alterar Perfil</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Usuário</label>
                    <input type="text" name="username" id="username" placeholder="Usuário" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" placeholder="Digite seu Email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="CPF">CPF</label>
                    <input type="text" name="CPF" id="CPF" placeholder="Seu CPF" autocomplete="off" required>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Salvar" required>
                </div>

            </form>
        </div>
        <?php } ?>
    </div>
    
</body>
</html>