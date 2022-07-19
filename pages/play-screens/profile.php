<?php

session_start();

require_once("../auth/connect.php");

// echo $_SESSION["userid"];die;

$stmt = $mysqli->prepare("SELECT * FROM `users` WHERE user_id = ?"); 
$stmt->bind_param("s", $_SESSION["userid"]);
$stmt->execute();

$result = $stmt->get_result();

$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<html>
    <head>
        <title>Profile</title>
        <meta charset="UTF-8">
        <meta lang="en">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "icon" href="../../img/Logo[White].png">
        <link rel="stylesheet" href="../../styles/profile.css">
        <link rel="stylesheet" href="../../styles/button.css">
    </head>
    <body>
        <div id="particles-js"></div>
        <script src="../../js/particles.js"></script>
        <script  cript src="../../js/app.js"></script>
        
        <div class="headers">
            <div class="left">
                <div class="home-link"><a href="../../index.html">BetaTest</a></div>
                <div class="heading">Profile</div>
            </div>
            <div class="right">
                <a href="../../pages\play-screens\logout.php">Logout</a>    
                <a href="../../index.html">Home</a>
                <a href="../play-screens/play.php?answer=">Play</a>
                <a class = 'current' href="../play-screens/profile.php">Profile</a>
                <a href="../play-screens/leaderboard.php">Leaderboard</a>
            </div>
        </div>
        <div class="content">
            <div class="profile">
                <div class="prof_heading">
                    <?php 
                    foreach($data as $x => $value){
                        echo "<div>{$value['fullname']}</div>";
                    }
                    ?>
                </div>
                <div class="details">
                    <div class="top">
                        <div class="picture">
                            <div class="image"></div>
                            <label for = "file" class="photo-input">
                                <div>Choose Photo</div>
                                <input type = 'file' 
                                id = 'file'
                                accept = "image/png, image/jpeg, image/jpg">
                            </label>
                        </div>
                        <div class="top-content">
                            <div class="username">
                                <div class="detail-heading">USERNAME</div>
                                <?php 
                                foreach($data as $x => $value){
                                    echo "<div>{$value['username']}</div>";
                                }
                                ?>
                            </div>
                            <div class="email">
                                <div class="detail-heading">EMAIL</div>
                                <?php 
                                foreach($data as $x => $value){
                                    echo "<div>{$value['email']}</div>";
                                }
                                ?>
                            </div>
                            <div class="institution">
                                <div class="detail-heading">INSTITUTION</div>
                                <?php
                                foreach($data as $x => $value){
                                    echo "<div>{$value['institution']}</div>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="points">
                            <div class="detail-heading">POINTS</div>
                            <?php 
                            foreach($data as $x => $value){
                                echo "<div>{$value['points']}</div>";
                            }
                            ?> 
                        </div>
                        <div class="level">
                            <div class="detail-heading">LEVEL</div>
                            <?php 
                            foreach($data as $x => $value){
                                echo "<div>{$value['levels']}</div>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class='content-sectioned'>
                <div class="notifications">
                    <div class="notif_heading">NOTIFICATIONS</div>
                    <div id = 'notif_content' class="notif_content">
                    </div>
                </div>
                <div class = 'play-btn'>
                    <a href='../play-screens/play.php?answer=' class="btn draw-border" style="text-decoration:none;">Continue Playing</a>
                </div>
            </div>
        </div>
        <script src="//cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js"></script>
        <script>
            axios.get('https://sheetdb.io/api/v1/ntqfltz5n9710').then(response => {
                var all_data = response.data;
                all_data.forEach(data => {
                    var content = data.content;
                    console.log(content);

                    const new_container = document.getElementById('notif_content');

                    const new_notif =document.createElement('div');
                    new_notif.classList.add('notif_example');

                    new_container.appendChild(new_notif);

                    //making the new new notification
                    const notif_text = document.createElement('div');
                    notif_text.classList.add('text');
                    notif_text.innerText = `${content}`;
                    new_notif.appendChild(notif_text);

                    const notif_underline = document.createElement('div');
                    notif_underline.classList.add('underline');
                    new_notif.appendChild(notif_underline);
                });
            });
        </script>
        <script src = "../../js/profile-photo.js"></script>
    </body>
</html>