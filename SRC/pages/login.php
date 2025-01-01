<?php
session_start(); // Start the session to store user data after login

if (isset($_SESSION['user_id'])) {
    // If the session is already set, redirect the user directly to the dashboard
    header("Location: user/users/dashboard.php");
    exit();
}
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
                            <span>Welcome</span> Back
                        </h1>

                        <p class="login__description">
                            Welcome! Please login to continue.
                        </p>
                    </div>

                    <div>
                        <div class="login__inputs">
                            <div>
                                <label for="email" class="login__label">Email</label>
                                <input class="login__input" type="email" id="email" name="email"
                                    placeholder="Enter your email address" required />
                            </div>

                            <div>
                                <label for="password" class="login__label">Password</label>
                                <div class="login__box">
                                    <input class="login__input" type="password" id="password" name="password"
                                        placeholder="Enter your password" required />
                                    <i class="ri-eye-off-line login__eye" id="input-icon"></i>
                                </div>
                            </div>
                        </div>

                        <div class="login__check">
                            <label class="login__check-label" for="check">
                                <input class="login__check-input" type="checkbox" id="remember" name="remember" />
                                <i class="ri-check-line login__check-icon"></i>
                                Remember me
                            </label>
                        </div>
                    </div>

                    <div>
                        <div class="login__buttons">
                            <button class="login__button">Log In</button>
                            <a href="register.html" class="login__button login__button-ghost">Sing Up</a>
                        </div>

                        <a class="login__forgot" href="forgot.html">Forgot Password?</a>
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