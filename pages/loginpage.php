<!DOCTYPE html>
<html>
    <head>
        <title>Login to BetaTest</title>
        <meta charset="UTF-8">
        <meta lang="en">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "icon" href="../img/Logo[White].png">
        <link rel="stylesheet" href="../styles/login.css">
        <link rel="stylesheet" href="../styles/button.css">
    </head>
    <body>
        <div id="particles-js"></div>
        <script src="../js/particles.js"></script>
        <script  cript src="../js/app.js"></script>

        <div class="headers">

            <div class="right">
                <div class="logo"></div>
            </div>

            <div class="left">
                <div class="home-link">
                    <a href="../index.php" >BetaTest</a>
                </div>
                <div class="heading">
                    Login
                </div>
            </div>

        </div>
        <div class="login-form">
            <form method="POST" action="./auth/login.php">
                <div class="form" id="loginform">
                    <div class="heading">
                        <div class="title">Welcome!</div>
                        <div class="subtitle">Login to BetaTest.</div>
                    </div>
                    <div class = 'input-container'>
                      <input id="mail" name="email" type="email" placeholder=" " required/>
                      <div class="placeholder">E-mail</div>
                    </div>
                    <div class = 'input-container'>
                      <input id="pass" name="password" type="password" placeholder=" " required/>
                      <div class="placeholder">Password</div>
                    </div>
                    <?php                   
                        if(isset($_GET['login'])){
                            echo "yes";
                        }
                    ?>
                    <button type="text" class="submit">Submit</button>
                </div>
            </form>
        </div>

        <div class="register">
            <button class="btn draw-border" onclick="window.location.href='./signuppage.html'">Not registered? Sign up here!</button>
        </div>
    </body>
</html>