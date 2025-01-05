<?php
session_start(); // Start the session to store user data after login


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="./assets/css/styles.css" />

    <title>Partha De</title>
</head>

<body>
    <div class="container">
        <div class="login">
            <div class="login__content">
                <img class="login__img" src="./assets/img/bg-login.png" alt="Login image" />

                <form class="login__form" id="loginForm" action="./user/Database/login.php" method="post">
                    <div>
                        <h1 class="login__title">
                            <span>Hello</span> Dear
                        </h1>

                        <p class="login__description">
                            Please Fillup Carefully.
                        </p>
                    </div>

                    <div>
                        <div class="login__inputs">

                            <div>
                                <label for="password" class="login__label">Password</label>
                                <div class="login__box">
                                    <input class="login__input" type="password" id="password" name="password"
                                        placeholder="Enter your password" required />
                                    <i class="ri-eye-off-line login__eye" id="input-icon"></i>
                                </div>
                            </div>
                            <div>
                                <label for="password" class="login__label">Confirm Password</label>
                                <div class="login__box">
                                    <input class="login__input" type="password" id="confirmpassword" name="confirmpassword"
                                        placeholder="Enter your password" required />
                                </div>
                            </div>
                        </div>

                    
                    </div>

                    <div>
                        <div class="login__buttons">
                            <button class="login__button">SUBMIT</button>
                            
                        </div>

                        <a class="login__forgot" href="../../index.html">Back to Home</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--=============== MAIN JS ===============-->
    <script src="./assets/js/main.js"></script>
    <script type="text/javascript" src="../script/disableKey.js"></script>
    <!--<script src="./login_script.js"></script> -->
</body>

</html>