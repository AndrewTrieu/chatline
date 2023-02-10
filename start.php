<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    header("location: home.php");
}
?>

<?php include_once "header.php"; ?>

<body>
    <div class="wrapper">
        <section class="login form">
            <header>Login to ChatLine</header>
            <form action="#">
                <div class="error"></div>
                <div>
                    <div class="field">
                        <label>Email</label>
                        <input type="text" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="field">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Enter your password" required>
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="button">
                        <input type="submit" value="Login">
                    </div>
                </div>
            </form>
            <div class="link">Don't have an account? <a href="index.php">Register now!</a></div>
        </section>
    </div>
    <script src="js/password-visibility.js"></script>
    <script src="js/login.js"></script>
</body>

</html>