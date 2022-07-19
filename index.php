<!DOCTYPE html>
<html lang="en">
    <head>
        <title>BetaTest</title>
        <meta charset="UTF-8">
        <meta lang="en">
        <meta name="keywords" content="BetaTest 2022">
        <meta name="author" content="ProjectBeta">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel = "icon" href="img/Logo[White].png">
        <link rel="stylesheet" href="main.css">
        <link rel="stylesheet" href="styles/button.css">
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
              theme: {
                extend: {
                  colors: {
                    headcolor: '#FFFFFF',
                  }
                }
              }
            }
          </script>
    </head>
    <body>
        <div id="particles-js"></div>
        <script src="js/particles.js"></script>
        <script  cript src="js/app.js"></script>
        
        <!--Shreyas Was Here :D-->
        <div class="heading">
            <div class="left">
                BetaTest
            </div>
            <div class="right">
                <a href = './pages/loginpage.php'>Login</a>
                <a href = './pages/signuppage.php'>Register</a>
                <a href = './pages/rulespage.html'>Rules</a>
            </div>
        </div>
        <div class="main">
            <div class = 'main-headers'>
                <div class="left">
                    <div class="logo"></div>
                </div>
                <div class="right">
                    <div class="main-subheading">
                        PROJECT <div class="black">BETA</div>
                    </div>
                    <div class="presents">Presents</div>
                    <div class="main-heading"><div class="black">Beta</div>Test</div>
                    
                </div>
            </div>
            <div id = 'countdown' class="countdown">countdown</div>
            <div class="arrow-container">
                <a href="#content">
                    <div class="arrow"></div>
                </a>
            </div>
        </div>
        <div id = 'content' class="content">
            <div class="about">
                <div class="img"></div>
                <div class="text">The BetaTest is the ultimate, unparalleled online scavenger hunt which offers an unprecedented 
                    assortment of gruelling questions, which participants engage in a cryptic hunt of epic proportions through the 
                    obscure marshes of the vast Internet to complete.</div>
            </div>
            <div class="hints">
                <div class="img"></div>
                <div class="text">Hints and stats will occasionally be posted on our <a href="https://discord.gg/QkZVZU6Q">Discord Channel</a>. Messasging Mods for the hints 
                    will results in a disqualification.</div>
            </div>
            <div class="resources">
                <div class="img"></div>
                <div class="text">To learn about Cryptic Hunts check out this 
                    <a href="https://docs.google.com/document/d/1gSYPpw62NQfWvArCr5V24uew-gNIF9ElnW36fosI4R8/edit?usp=sharing" target="_blank">
                    Document!</a></div>
            </div>
        </div>
        <div class="playbutton">
            <a href='pages/play-screens/play.php?answer=' class="btn draw-border" style="text-decoration:none;">Play</a>
        </div>

        <div class="footer">
            <div class="socials">
                <a target="_blank" href="http://www.projectbeta.club/">
                    <img src="img/Logo[White].png" alt="">
                </a>
                <a target="_blank" href="https://www.instagram.com/projectbeta.club/">
                    <img src="img/insta.png" alt="">
                </a>
                <a target="_blank" href="https://github.com/Project-Beta">
                    <img src="img/github.png" alt="">
                </a>
                <a target="_blank" href="https://discord.gg/f5jfvN4h">
                    <img src="img/discord.png" alt="">
                </a>
            </div>
            <div class="details">
                <div class="school">
                    &copy; ProjectBeta 2022 | Sanskriti School
                </div>
                <div class="developers">
                    Made with ♥ By Shreyas Vartia &copy; &#8482; and Rishi Mathur &copy; &#8482;
                </div>
            </div>
        </div>

        <script src = 'js/countdown.js'></script>
    </body> 
</html>
