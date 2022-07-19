<?php
require_once("./connect.php");

if(!isset($_POST['email'])) {
    header("Location:loginpage.php");
}

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
    if($is_in_use == true){echo "<div>Email Already In Use, Please Use Another.</div>";}
    if ($is_in_use == false){
        $stmt = $mysqli->prepare("INSERT INTO `users` (`user_id`, `fullname`, `username`, `password`, `email`,`day_time`,`discord_id`,`institution`) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");            
        $stmt->bind_param("isssssss", $user_id, $fullname,  $username, $password, $email, $datetime, $discord ,$institution);
        $stmt->execute();
        $stmt->close();
        header("Location: /BetaTest/pages/loginpage.php ");
    }
}
?>