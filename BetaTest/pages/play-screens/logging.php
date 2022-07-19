<?php
session_start();

require_once("../auth/connect.php");

$stmt = $mysqli->prepare("SELECT * FROM `questions`"); 
$stmt->execute();
$result = $stmt->get_result();
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach($data as $x => $value){
  if($x == $_SESSION['play-level']){

    $question = $value['question'];
  }
}
$log_answer = $_GET['answer'];
$log_user = $_SESSION['uname'];
$log_question = $question;

$stmt = $mysqli->prepare("INSERT INTO `user_assesment` (`user_id`, `question_id`, `result`) VALUES (?, ?, ?);");
$stmt->bind_param("sss", $log_user, $log_question, $log_answer);
$stmt->execute();
$stmt->close();
?>