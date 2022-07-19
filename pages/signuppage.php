<html>
    <head>
        <title>Register</title>
        <meta charset="UTF-8">
        <meta lang="en">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "icon" href="../img/Logo[White].png">
        <link rel="stylesheet" href="../styles/signup.css">
        <link rel="stylesheet" href="../styles/button.css">
    </head>
    <body>
        <div id="particles-js"></div>
        <script src="../js/particles.js"></script>
        <script  cript src="../js/app.js"></script>

        <div class="headers">
            <div class="left">
                <div class="home-link">
                    <a href="../index.html">BetaTest</a>
                </div>
                <div class="heading">Register</div>
            </div>
            <div class="right">
                <div class="logo"></div>
            </div>
        </div>
        <div class="sign-up-cover">
            <div class="sign-up">
                <div class="heading">
                    <div class="title">Welcome!</div>
                    <div class="subtitle">Register to BetaTest.</div>
                </div>
                <div class="form">
                    <form method="POST">            
                        <div class = 'input-container'>
                            <input id="name" name="fullname" type="text" placeholder=" " required/>
                            <div class = 'placeholder'>Full name</div>
                        </div>
                        <div class = 'input-container'>
                            <input id="uname" name="username" type="text" placeholder=" " required/>
                            <div class="placeholder">Username</div>
                        </div>
                        <div class = 'input-container'>
                            <input id="insti" name="institution" type="text" placeholder=" " required/>
                            <div class="placeholder">Insituition</div>
                        </div>
                        <div class = 'input-container'>
                            <input id="discord" name="discord" type="text" placeholder=" " required/>
                            <div class="placeholder">Discord ID</div>
                        </div>
                        <div class = 'input-container email'>
                            <input id="email" name="email" type="email" placeholder=" " required/>
                            <div class="placeholder">E-mail</div>
                            <?php
                            if(!empty($_POST)){
                                require_once("./auth/connect.php");

                                $user_id = rand();
                                $email = $_POST['email'];
                                $fullname = $_POST['fullname'];
                                $username = $_POST['username'];
                                $institution = $_POST['institution'];
                                $discord = $_POST['discord'];
                                $password = hash("SHA256",$_POST["password"]);
                                $datetime = date('Y-m-d h:m:s');

                                $stmt = $mysqli->prepare("SELECT `email` FROM `users`"); 
                                $stmt->execute();
                                $result = $stmt->get_result();
                                $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

                                $is_in_use = false;
                                foreach($data as $x => $value){
                                    if(in_array($email, $value)){$is_in_use = true;}else{}
                                    if($is_in_use == true){echo "<div class = 'placeholder-already-in-use'>Email Already In Use, Please Use Another.</div>"; break;}
                                    else if($is_in_use == false){
                                        $stmt = $mysqli->prepare("INSERT INTO `users` (`user_id`, `fullname`, `username`, `password`, `email`,`day_time`,`discord_id`,`institution`) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");            $stmt->bind_param("isssssss", $user_id, $fullname,  $username, $password, $email, $datetime, $discord ,$institution);
                                        $stmt->execute();
                                        $stmt->close();
                                        header("Location: /BetaTest/pages/loginpage.php ");
                                        break;
                                    }
                                }
                            }
                            ?>
                        </div>
                        <div class = 'input-container'>
                            <input id="pass" name="password" type="password" placeholder=" " required/>
                            <div class="placeholder">Password</div>
                        </div>
                        <button type="text" class="submit">Submit</button>
                    </form>
                </div>
            </div>    
        </div>
        <div class="login">
            <button class = 'btn draw-border'
                onclick = 'window.location.href = "/pages/loginpage.php"'>Already Have An Account?
            </button>
        </div>
        
    </body>
</html>