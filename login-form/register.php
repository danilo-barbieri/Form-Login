<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/style.css">
    <title>Registro</title>    
</head>
<body>
        <div class="container">
            <div class="box form-box">

            <?php
            
            include("php/config.php");
            if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $email = $_POST['email'];
                $cpf = $_POST['CPF'];
                $password = $_POST['password'];

                $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");

                if(mysqli_num_rows($verify_query) !=0 ){
                    echo "<div class='message'>
                              <p>Este email já está sendo usado, tente outro!</p>
                          </div> <br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn'>Voltar</button>";
                } else {

                    mysqli_query($con,"INSERT INTO users(Username,Email,CPF,Password) VALUES('$username','$email','$cpf','$password')") or die("Erro ao inserir os dados no banco");

                    echo "<div class='message'>
                                <p>Cadastro realizado com sucesso!</p>
                            </div> <br>";
                    echo "<a href='index.php'><button class='btn'>Login</button>";
                }

            }else{

            ?>
                <header>Sing Up</header>
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

                    <div class="field input">
                        <label for="password">Senha</label>
                        <input type="password" name="password" id="password" placeholder="Digite sua Senha" autocomplete="off" required>
                    </div>

                    <div class="field">
                        
                        <input type="submit" class="btn" name="submit" value="Login" required>
                    </div>
                    <div class="links">
                        Já possuís conta? <a href="index.php">Faça Login</a>
                    </div>
                </form>
            </div>
            <?php }?>
        </div>
</body>
</html>