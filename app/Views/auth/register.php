<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>Register</title>
</head>

<body>
    <div class="container">
        <div class="login-content">
            <div class="wrapper">
                <form action="postregister" method="POST">
                    <div class="title-container">
                        <h1>Register</h1>
                        <h2>Welcome to InvenApp!</h2>
                        <p>Register your personal data and start journey with us.</p>
                    </div>
                    <div class="login-inner-content">

                        <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success">
                            <?php echo session()->getFlashdata('success'); ?>
                        </div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger">
                            <?php foreach (session()->getFlashdata('error') as $field => $error) : ?>
                            <p><?= $error ?></p>
                            <?php endforeach ?>
                        </div>
                        <?php endif; ?>

                        <div class="input-div one">
                            <div class="i">
                                <i class='bx bxs-user'></i>
                            </div>
                            <div class="div">
                                <h5>Username</h5>
                                <input type="text" class="input" name="name">
                            </div>
                        </div>

                        <div class="input-div one">
                            <div class="i">
                                <i class='bx bxs-message-alt-detail'></i>
                            </div>
                            <div class="div">
                                <h5>E-mail</h5>
                                <input type="email" class="input" name="email">
                            </div>
                        </div>

                        <div class="input-div pass">
                            <div class="i">
                                <i class='bx bxs-show pass-icon' onclick="show()"></i>
                            </div>
                            <div class="div">
                                <h5>Password</h5>
                                <input id="pswrd" type="password" class="input" name="password">
                            </div>
                        </div>

                        <div class="input-div pass">
                            <div class="i">
                                <i class='bx bx-key'></i>
                            </div>
                            <div class="div">
                                <h5>Password Confirmation</h5>
                                <input id="pswrd" type="password" class="input" name="passwordconfirmation">
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn" value="Register">
                    <h5>You a member ? <a href="/login">Login Account</a></h5>
                </form>
            </div>
        </div>

        <div class="img">
            <img src="images/Kaos Joko.png" alt="BG">
        </div>

    </div>

    <!-- LOCAL JS -->
    <script src="js/login.js"></script>
</body>

</html>