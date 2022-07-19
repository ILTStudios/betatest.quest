<?php


require_once("./connect.php");

    if(!isset($_POST['email']) && !isset($_POST['password'])) {
    //if no values are passed from login form, return to previous page (login)
    header("Location:loginpage.php");
    }

    $email = mysqli_real_escape_string($mysqli, $_POST["email"]);
    $password = mysqli_real_escape_string($mysqli,hash("SHA256",$_POST["password"]));

    $stmt = $mysqli->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();

    $result = $stmt->get_result();

    $data = $result->fetch_assoc();


   if ($result->num_rows == 1) {

        session_start();
        $_SESSION["uname"] = $data["username"];
        $_SESSION["userid"] = $data["user_id"];
        $_SESSION['levels'] = $data['levels'] + 1;
        $_SESSION['points'] = $data['points'];
        $_SESSION['play-level'] = $data['levels'];
        $_SESSION['banned'] = $data['banned'];
        header("Location: /BetaTest/pages/play-screens/play.php?answer=");
   }
   else{
     header("Location: /BetaTest/pages/loginpage.php");
     //die('Username or password incorrect.');
   }
?>