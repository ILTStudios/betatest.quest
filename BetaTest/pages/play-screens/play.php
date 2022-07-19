<?php
session_start();

require_once("../auth/connect.php");

$stmt = $mysqli->prepare("SELECT * FROM `questions`"); 
$stmt->execute();
$result = $stmt->get_result();
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach($data as $x => $value){
  if($x == $_SESSION['play-level']){
    $answer = $value['answer'];
    $question = $value['question'];
  }
}
?>

<!DOCTYPE html>
<html>
    <head>
      <title>Play</title>
        <meta charset="UTF-8">
        <meta lang="en">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel = "icon" href="../../img/Logo[White].png">
        <link rel="stylesheet" href="../../styles/play.css">
    </head>
      <body>
        <div id="particles-js"></div>
        <script src="../../js/particles.js"></script>
        <script  cript src="../../js/app.js"></script>
        
            
           <!-- Navbar -->
           <div class="headers">
            <div class="left">
              <div class="home-link"><a href="../../index.html">BetaTest</a></div>
              <div class="heading">Play</div>
            </div>

            <div class="right">
              <a href="../../pages\play-screens\logout.php">Logout</a>
              <a href="../../index.html">Home</a>
              <a class = 'current' href="../play-screens/play.php?answer=">Play</a>
              <a href="../play-screens/profile.php">Profile</a>
              <a href="../play-screens/leaderboard.php">Leaderboard</a>
            </div>
          </div>
          <!-- Navbar -->

            <!-- Play form -->
            <div class="play-container">
              <div class="play-heading">PLAY</div>
              <div class="play-content">
                <div class="level">
                  <?php 
                    if($_SESSION['banned'] == 0){
                      foreach($data as $x => $value){
                        if($x == $_SESSION['play-level']){
                          echo "Level {$_SESSION['play-level']}";
                        }
                      }
                    }else{
                      echo "You are Disqualified, Please Leave the Premises.";
                    }
                  ?>
                </div>
                <div class="image">
                  <?php 
                     if($_SESSION['banned'] == 0){
                      foreach($data as $x => $value){
                        if($x == $_SESSION['play-level']){
                          echo "<img src = '../../img/{$value['image']}'></img>";
                        }
                      }
                    }else{
                      echo "";
                    }
                  ?>
                </div>
                <div class="question">
                  <?php 
                    if($_SESSION['banned'] == 0){
                      foreach($data as $x => $value){
                        if($x == $_SESSION['play-level']){
                          echo "$question";
                        }
                      }
                    }else{
                      echo "No Questions For you :D";
                    }
                  ?>
                </div>
                <div class="answer">Answer</div>
                <form method = "GET">
                  <input autofocus type="text" id="answer" name="answer" placeholder="Enter Your Answer Here ">
                  <div class="validation">
                    <?php
                    if($_SESSION['banned'] == 0){
                      $player_answer = $_GET['answer'];
                      if($answer == $player_answer){                 
                        $_SESSION['play-level'] = $_SESSION['play-level'] + 1;
                        $_SESSION['levels'] = $_SESSION['levels'] + 1;
                        $_SESSION['points'] = $_SESSION['points'] + 500;
                        
                        $stmt = $mysqli->prepare("UPDATE `users` SET `points` = '".$_SESSION['points']."', `levels` = '".$_SESSION['play-level']."' WHERE user_id = '".$_SESSION['userid']."' ");
                        $stmt->execute();
                        $stmt->close();

                        $log_user = $_SESSION['uname'];
                        $log_question = $question;

                        $stmt = $mysqli->prepare("INSERT INTO `user_assesment` (`user_id`, `question_id`, `result`) VALUES (?, ?, ?);");
                        $stmt->bind_param("sss", $log_user, $log_question, $answer);
                        $stmt->execute();
                        $stmt->close();

                        echo "<div style = 'color: green'>Corrrect Answer!</div>";
                        echo "<meta http-equiv=\"refresh\" content=\"1;URL=play.php?answer=\">";
                      }else{
                        $log_user = $_SESSION['uname'];
                        $log_question = $question;

                        $stmt = $mysqli->prepare("INSERT INTO `user_assesment` (`user_id`, `question_id`, `result`) VALUES (?, ?, ?);");
                        $stmt->bind_param("sss", $log_user, $log_question, $player_answer);
                        $stmt->execute();
                        $stmt->close();
                        echo "Try Your Best :D";
                      }
                    }else{
                      echo "<div style = 'color: red'>Error: User Is Banned.</div>";
                    }
                    ?>
                  </div>
                  <button class = 'play-submit'>Submit</button>
                </form>

              </div>
            </div>
            <!-- Play form -->
            <!-- background -->

            <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r121/three.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.net.min.js"></script>
            <script>
                VANTA.NET({
                  el: "#shreyas",
                  mouseControls: false,
                  touchControls: false,
                  gyroControls: false,
                  minHeight: 200.00,
                  minWidth: 200.00,
                  scale: 1.00,
                  scaleMobile: 1.00,
                  points: 14.00,
                  maxDistance: 21.00,
                  spacing: 18.00
              })
            </script> -->

            <!-- background -->
          <div class="dev-con">
            <div class="developers">
              Made with ♥ By Shreyas Vartia &copy; &#8482; and Rishi Mathur &copy; &#8482;
            </div>
          </div>

          <script src = '../../js/finishlevel.js'></script>
      </body>
</html>