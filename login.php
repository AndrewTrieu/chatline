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
                <header>Login to ChatLine</header>
                <form action="#" >
                    <div class="error"></div>
                    <div>
                        <div class="field">
                            <label>Email</label>
                            <input type="text" placeholder="Enter your email" required>
                        </div>
                        <div class="field">
                            <label>Password</label>
                            <input type="password" placeholder="Enter your password" required>
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="button">
                            <input type="submit" value="Login">
                        </div>
                    </div>
                </form>
                <div class="link">Don't have an account? <a href="register.html">Register now!</a></div>
            </section>
        </div>
        <script src="js/password-visibility.js"></script>
    </body>
</html>