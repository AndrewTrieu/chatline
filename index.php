<!DOCTYPE html>
<html lang="en">
    <head>
        <title>ChatLine - Real-time Messaging App</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    </head>
    <body>
        <div class="wrapper">
            <section class="register form">
                <header>Join us at ChatLine!</header>
                <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="error"></div>
                    <div class="names">
                        <div class="field">
                            <label>First name</label>
                            <input type="text" name="first_name" placeholder="First name" required>
                        </div>
                        <div class="field">
                            <label>Last name</label>
                            <input type="text" name="last_name" placeholder="Last name" required>
                        </div>
                    </div>
                    <div>
                        <div class="field">
                            <label>Email</label>
                            <input type="text" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="field">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Enter new password" required>
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="image">
                            <label>Profile photo</label>
                            <input type="file" name="image" accept="image/x-png,image/jpeg,image/jpg">
                        </div>
                        <div class="button">
                            <input type="submit" value="Register">
                        </div>
                    </div>
                </form>
                <div class="link">Already have an account? <a href="login.html">Login now!</a></div>
            </section>
        </div>
        <script src="js/password-visibility.js"></script>
        <script src="js/register.js"></script>
    </body>
</html>