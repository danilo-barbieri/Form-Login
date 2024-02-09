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
    <link rel="stylesheet" href="Style/style.css">
    <title>Home</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">Logo</a></p>
        </div>

        <div class="right-liks">

        <?php
        
        $id = $_SESSION['id'];
        $query = mysqli_query($con,"SELECT*FROM users WHERE Id=$id");

        while($result = mysqli_fetch_assoc($query)){
            $res_Uname = $result['Username'];
            $res_Email = $result['Email'];
            $res_CPF = $result['CPF'];
            $res_id = $result['Id'];
        }

        echo "<a href='edit.php?Id=$res_id'>Alterar Perfil</a>";
        ?>
  
            <a href="logout.php"> <button class="btn">Deslogar</button> </a>
        </div>
    </div>    

    <main>

        <div class="main-box top">
            <div class="top">
                <div class="box">
                    <p>Olá <b><?php echo $res_Uname ?></b>, Bem-Vindo</p>
                </div>
                <div class="top">
                    <div class="box">
                        <p>Seu email é <b><?php echo $res_Email ?></b>.</p>
                    </div>
            </div>
            <div class="bottom">
                <div class="box">
                    <p>Seu CPF é <b><?php echo $res_CPF ?></b>.</p>
                </div>
            </div>
        </div>
    </main>
</body>
</html>