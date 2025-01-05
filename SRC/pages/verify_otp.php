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

                <form class="login__form"id="forgot_password" method="post" action="./user/Database/verify_otp.php">
                    <div>
                        <h1 class="login__title">
                            <span>Welcome</span> Back
                        </h1>

                        <p class="login__description">
                            We Sent an OTP in your Registerd Email ID.
                        </p>
                    </div>

                    <div>
                        <div class="login__inputs">
                            <div>
                                <label for="email" class="login__label">OTP</label>
                                <input class="login__input" type="password" id="otp" name="otp"
                                    placeholder="Enter your 6 Digit OTP" required />
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="login__buttons">
                            <button class="login__button" type="submit" id="submit" >VERIFY NOW</button>
                           
                        </div>

                        <a class="login__forgot" href="./user/Database/sentOTP.php">Resent OTP</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--=============== MAIN JS ===============-->
    <script src="./assets/js/main.js"></script>
    <script type="text/javascript" src="../script/disableKey.js"></script>
</body>

</html>