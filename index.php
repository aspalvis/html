<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="images/Union.svg">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pineapple.</title>
</head>
<body>
        <div class="main">
            <div class="navbar">
                <div class="brand">
                    <img id="logo" src="images/Union.svg" alt="">
                    <img id="brand_title" src="images/pineapple.svg" alt="">
                </div>
                <div class="links">
                    <a href="data.php">Subscribers</a>
                    <a href="#">How it works</a>
                    <a href="#">Contact</a>
                </div>
            </div>
            <div class="content">
                <div class="headings">
                    <h1 id="h1">Subscribe to newsletter</h1>
                    <h2 id="h2">
                    Subscribe to our newsletter 
                    and get 10% discount on pineapple glasses.
                    </h2>
                </div>
                <div class="mail-input">
                    <form name="form" id="get_mail" method="GET">
                        <input name="email" placeholder="Type your email address here…" type="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" size="30" required>
                        <button id="sendBtn"><img src="images/ic_arrow.svg" alt=""></button>
                    </form>
                    <div class="checkbox">
                        <input id="checkTerm" type="checkbox" >
                        <span class="checkmark">I agree to <a id="tos_link" href="#">terms of service</a>
                        </span>
                    </div>
                    <hr>
                </div>
                <div class="footer">
                    <a id="fb" href="#">
                            <img src="images/Facebook.svg" alt="">
                    </a>
                    <a id="ig" href="#">
                            <img src="images/Instagram.svg" alt="">
                    </a>
                    <a id="twt" href="#">
                            <img src="images/Twitter.svg" alt="">
                    </a>
                    <a id="yt" href="#">
                            <img src="images/Youtube.svg" alt="">
                    </a>
                </div>


            </div>
        </div>
            <div class="alert_tos">
                <p>
                    Please agree with terms of service, to subscribe!
                </p>
            </div>
        <script src="js/index.js"></script>
</body>
</html>